<?php

namespace Nexo\Http\Controllers\Api\Import;


use Illuminate\Http\Request;
use Nexo\Entities\ProductCategory;
use Nexo\Entities\Team;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ProductCategoryRepository;
use Nexo\Transformers\ProductCategoryTransformer;

class ProductsCategoriesController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(ProductCategoryRepository $repository, ProductCategoryTransformer $transformer)
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
                'id' => 'nombre',
                'value' => 'name',
                'label' => 'Nombre',
                'order' => 1,
            ],
            [
                'id' => 'descripcion',
                'value' => 'description',
                'label' => 'Descripción',
                'order' => 2,
            ],
        ]);


        \Excel::load($file, function ($reader) use ($team, $items, $columns) {


            // Loop through all sheets
            $i = 1;
            $reader->each(function ($sheet) use ($team, $items, $columns, &$i) {
                $tempItem = [
                    'errors' => [],
                    'id' => md5($i)
                ];

                // Iterando por columnas
                foreach ($sheet->all() as $column => $row) {

                    $columnsRow = $columns->where('id', $column);
                    $columnRow = $columnsRow->first();

                    $tempItem[$columnRow['value']] = $row;
                }


                // Buscando  duplicados
                $isDocumentDuplicate = ProductCategory::where([
                        'name' => $tempItem['name'],
                        'team_id' => $team->id
                    ])->count() > 0;

                if ($isDocumentDuplicate) {
                    $tempItem['errors'][] = 'Categoría duplicada';
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
