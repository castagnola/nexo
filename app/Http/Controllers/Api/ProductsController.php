<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Entities\Customer;
use Nexo\Entities\CustomerAddress;
use Nexo\Entities\LocationCity;
use Nexo\Entities\Product;
use Nexo\Entities\Team;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\CustomerRepository;
use Nexo\Repositories\ProductRepository;
use Nexo\Transformers\CustomerTransformer;
use Nexo\Transformers\ProductTransformer;
use Nexo\Validators\CustomerValidator;
use Nexo\Validators\ProductValidator;

/**
 * Class CustomersController
 * @package Nexo\Http\Controllers\Api\Team
 */
class ProductsController extends Controller
{
    use ApiResponse;

    /**
     * @var CustomerRepository
     */
    /**
     * @var CustomerRepository|CustomerTransformer
     */
    /**
     * @var CustomerRepository|CustomerTransformer|CustomerValidator
     */
    protected $repository, $transformer, $validator;

    /**
     * CustomersController constructor.
     * @param CustomerRepository $repository
     * @param CustomerTransformer $transformer
     * @param CustomerValidator $validator
     */
    public function __construct(ProductRepository $repository, ProductTransformer $transformer, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teamId = $this->getTeamId($request);

        $categoryId = $request->get('category_id');

        if (!empty($categoryId)) {
            $categoryId = $this->decodeHashid($categoryId);
        }

        $repository = $this->repository->scopeQuery(function ($query) use ($teamId, $categoryId) {
            $return = $query->whereHas('category', function ($query) use ($teamId) {
                return $query->where('team_id', $teamId);
            });

            if (!empty($categoryId)) {
                $return = $return->where('category_id', $categoryId);
            }

            return $return;
        });

        return $this->collection($request, $repository);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Product $model)
    {
        return $this->response->item($model, $this->transformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $team = $this->getTeam($request);

        $input = $request->all();
        $input['team_id'] = $team->id;
        //$input['category_id'] = \Hashids::decode($input['category_id'])[0];

        $item = $this->repository->create($input);

        return $this->response->item($item, new $this->transformer);
    }


    /**
     * @param Request $request
     * @param Team $team
     * @param Customer $model
     * @return mixed
     */
    public function update(Request $request, Product $model)
    {
        $input = $request->except(['created_at', 'updated_at', 'deleted_at', 'team_id', 'user_id']);

        $this->makeApiValidator($input, 'update');
        $model = $this->repository->update($input, $model->id);
        return $this->response->item($model, new $this->transformer);
    }

    /**
     * @param Request $request
     * @param Team $team
     * @return mixed
     */
    public function initImport(Request $request, Team $team)
    {
        $file = $request->file('file');

        $items = collect([]);


        $columns = [
            'nombres' => 'first_name',
            'apellidos' => 'last_name',
            'documento' => 'document',
            'tipo_de_documento' => 'document_type',
            'email' => 'email',
        ];


        \Excel::load($file, function ($reader) use ($team, $items, $columns) {
            // Loop through all sheets
            $reader->each(function ($sheet) use ($team, $items, $columns) {
                $tempItem = [
                    'city_error' => true,
                    'addresses' => [],
                    'phones' => []
                ];

                // Iterando por columnas
                foreach ($sheet->all() as $column => $row) {
                    /*
                     * Buscamos si la información pertenece a una en común
                     */
                    if (array_key_exists($column, $columns)) {
                        $key = $columns[$column];

                        $tempItem[$key] = $row;
                    } else {
                        if (!empty($row)) {
                            // Ciudad
                            switch ($column) {
                                case 'ciudad':
                                    $city = LocationCity::where('name', 'like', "%{$row}%")->orWhere('code', $row)->first();
                                    $tempItem['city_name'] = $row;

                                    if (!empty($city)) {
                                        $tempItem['city_error'] = false;
                                        $tempItem['addresses'][0]['city_id'] = $city->id;
                                        $tempItem['addresses'][0]['city_name'] = $city->name;
                                        $tempItem['addresses'][0]['city_state'] = $city->state->name;

                                        $tempItem['city_name'] = $city->name;
                                    }

                                    break;

                                case 'direccion':
                                    $tempItem['addresses'][0]['street'] = $row;
                                    $tempItem['address'] = $row;
                                    break;

                                case 'telefono_fijo':

                                    $tempItem['phones'][] = [
                                        'type' => 'telefono-fijo',
                                        'phone' => $row
                                    ];

                                    $tempItem['phone'] = $row;
                                    break;

                                case 'telefono_movil':
                                    $tempItem['phones'][] = [
                                        'type' => 'telefono-movil',
                                        'phone' => $row
                                    ];
                                    $tempItem['mobile'] = $row;
                                    break;
                            }
                        }
                    }
                }

                // Buscando documento duplicado
                $isDocumentDuplicate = Customer::where([
                        'document' => $tempItem['document'],
                        'document_type' => $tempItem['document_type'],
                        'team_id' => $team->id
                    ])->count() > 0;

                $tempItem['is_document_duplicated'] = $isDocumentDuplicate;

                // Buscando correo duplicado

                $isEmailDuplicated = Customer::where([
                        'email' => $tempItem['email'],
                        'team_id' => $team->id
                    ])->count() > 0;

                $tempItem['is_email_duplicated'] = $isEmailDuplicated;

                $tempItem['ready'] = ($tempItem['city_error'] === false) && ($tempItem['is_document_duplicated'] === false) && ($tempItem['is_email_duplicated'] === false);


                $items->push($tempItem);
            });
        });


        return $this->response->array([
            'total' => $items->count(),
            'total_ready' => $items->where('ready', true)->count(),
            'total_unready' => $items->where('ready', false)->count(),
            'items' => $items->toArray(),
            'ready' => $items->count() > 0
        ]);
    }


    /**
     * @param Request $request
     * @param Team $team
     * @return mixed
     */
    public function finishImport(Request $request, Team $team)
    {
        $items = $request->get('items');

        if (empty($items)) {
            return $this->response->errorBadRequest();
        }

        $saved = 0;

        foreach ($items as $item) {
            $item['team_id'] = $team->id;
            $newItem = $this->repository->create($item);

            if (!empty($newItem)) {
                $saved++;
            }
        }

        return $this->response->array([
            'saved' => $saved,
            'pending' => count($items) - $saved
        ]);
    }
}
