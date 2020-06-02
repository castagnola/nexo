<?php

namespace Nexo\Http\Controllers\Api\Import;


use Illuminate\Http\Request;
use Nexo\Entities\Customer;
use Nexo\Entities\LocationCity;
use Nexo\Entities\Team;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\CustomerRepository;
use Nexo\Transformers\CustomerTransformer;

class CustomersController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(CustomerRepository $repository, CustomerTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }


    /**
     * @param Request $request
     * @param Team $team
     * @return mixed
     */
    public function init(Request $request)
    {
        $teamId = $this->getTeamId($request);
        $team = Team::findOrFail($teamId);

        $file = $request->file('file');

        $items = collect([]);


        $columns = collect([
            [
                'id' => 'nombres',
                'value' => 'first_name',
                'label' => 'Nombres',
                'order' => 1,
            ],
            [
                'id' => 'apellidos',
                'value' => 'last_name',
                'label' => 'Apellidos',
                'order' => 2,
            ],
            [
                'id' => 'documento',
                'value' => 'document',
                'label' => 'Documento',
                'order' => 3,
            ],
            [
                'id' => 'tipo_de_documento',
                'value' => 'document_type',
                'label' => 'Documento',
                'order' => 4,
            ],
            [
                'value' => 'city_name',
                'label' => 'Ciudad',
                'order' => 5,
            ],
            [
                'value' => 'address',
                'label' => 'Dirección',
                'order' => 6,
                'min_width' => '100px'
            ],
            [
                'value' => 'phone',
                'label' => 'Teléfono',
                'order' => 7,
            ],
            [
                'value' => 'mobile',
                'label' => 'Teléfono móvil',
                'order' => 8,
            ],
            [
                'id' => 'email',
                'value' => 'email',
                'label' => 'E-mail',
                'order' => 9,
            ],
        ]);


        \Excel::load($file, function ($reader) use ($team, $items, $columns) {


            // Loop through all sheets
            $i = 1;
            $reader->each(function ($sheet) use ($team, $items, $columns, &$i) {
                $tempItem = [
                    'errors' => [],
                    'addresses' => [],
                    'phones' => [],
                    'id' => md5($i)
                ];

                // Iterando por columnas
                foreach ($sheet->all() as $column => $row) {

                    $columnsRow = $columns->where('id', $column);
                    $columnRow = $columnsRow->first();

                    /*
                     * Buscamos si la información pertenece a una en común
                     */
                    if (!empty($columnRow)) {
                        $tempItem[$columnRow['value']] = $row;
                    } else {


                        if (!empty($row)) {
                            // Ciudad
                            switch ($column) {
                                case 'ciudad':
                                    $city = LocationCity::where('name', 'like', "%{$row}%")->orWhere('code', $row)->first();
                                    $tempItem['city_name'] = $row;

                                    if (!empty($city)) {
                                        $tempItem['addresses'][0]['city_id'] = $city->id;
                                        $tempItem['addresses'][0]['city_name'] = $city->name;
                                        $tempItem['addresses'][0]['city_state'] = $city->state->name;
                                        $tempItem['city_name'] = $city->name;

                                    } else {
                                        $tempItem['errors'][] = 'La ciudad no se encuentra';
                                    }

                                    break;

                                case 'direccion':
                                    if($row){
                                        $tempItem['addresses'][0]['street'] = $row;
                                        $tempItem['addresses'][0]['address'] = $row;
                                        $tempItem['address'] = $row;

                                        $arr = geocodeAddress($row);
                                        if($arr){
                                            $tempItem['addresses'][0]['latitude'] = $arr['latitude'];
                                            $tempItem['addresses'][0]['longitude'] = $arr['longitude'];
                                        }else{
                                            $tempItem['errors'][] = 'La direccion no se encuentra'; 
                                        }
                                    }
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

                if ($isDocumentDuplicate) {
                    $tempItem['errors'][] = 'Documento duplicado';
                }

                // Buscando correo duplicado

                $isEmailDuplicated = Customer::where([
                        'email' => $tempItem['email'],
                        'team_id' => $team->id
                    ])->count() > 0;

                if ($isEmailDuplicated) {
                    $tempItem['errors'][] = 'E-mail duplicado';
                }

                $tempItem['ready'] = empty($tempItem['errors']);


                $i++;

                $items->push($tempItem);
            });
        });


        return $this->response->array([
            'total' => $items->count(),
            'total_ready' => $items->where('ready', true)->count(),
            'total_unready' => $items->where('ready', false)->count(),
            'items' => $items->toArray(),
            'items_ready' => $items->where('ready', true)->toArray(),
            'ready' => $items->count() > 0,
            'columns' => $columns->toArray()
        ]);
    }


    /**
     * @param Request $request
     * @param Team $team
     * @return mixed
     */
    public function finish(Request $request)
    {
        $teamId = $this->getTeamId($request);
        $team = Team::findOrFail($teamId);

        $items = $request->get('items');

        if (empty($items)) {
            $this->response->errorBadRequest();
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
