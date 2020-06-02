<?php

namespace Nexo\Http\Controllers\Api\Import;


use Illuminate\Http\Request;
use Nexo\Entities\Product;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\ProductRepository;
use Nexo\Transformers\ProductTransformer;

class ProductsController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(ProductRepository $repository, ProductTransformer $transformer)
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
        $file = $request->file('file');

        $items = collect([]);


        $columns = collect([
            [
                'id' => 'categoria_id',
                'value' => 'category_id',
                'label' => 'Categoria ID',
                'order' => 1,
            ],
            [
                'id' => 'nombre',
                'value' => 'name',
                'label' => 'Nombre',
                'order' => 2,
            ],
            [
                'id' => 'descripcion',
                'value' => 'description',
                'label' => 'Descripción',
                'order' => 3,
            ],
            [
                'id' => 'peso',
                'value' => 'weight',
                'label' => 'Peso',
                'order' => 4,
            ],
            [
                'id' => 'unidad_de_peso',
                'value' => 'weight_unit',
                'label' => 'Unidad de peso',
                'order' => 5,
            ],
            [
                'id' => 'altura',
                'value' => 'height',
                'label' => 'Altura',
                'order' => 6,
            ],
            [
                'id' => 'unidad_de_altura',
                'value' => 'height_unit',
                'label' => 'Unidad de altura',
                'order' => 7,
            ],
            [
                'id' => 'profundidad',
                'value' => 'depth',
                'label' => 'Profundidad',
                'order' => 8,
            ],
            [
                'id' => 'unidad_de_profundidad',
                'value' => 'depth_unit',
                'label' => 'Unidad de profundidad',
                'order' => 9,
            ],
            [
                'id' => 'ancho',
                'value' => 'width',
                'label' => 'Ancho',
                'order' => 10,
            ],
            [
                'id' => 'unidad_de_ancho',
                'value' => 'width_unit',
                'label' => 'Unidad de ancho',
                'order' => 11,
            ],
            [
                'id' => 'codigo',
                'value' => 'SKU',
                'label' => 'Código',
                'order' => 12,
            ],
        ]);


        \Excel::load($file, function ($reader) use ($items, $columns) {


            // Loop through all sheets
            $i = 1;
            $reader->each(function ($sheet) use ($items, $columns, &$i) {
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
                $isDocumentDuplicate = Product::where([
                        'name' => $tempItem['name']
                    ])->count() > 0;

                if ($isDocumentDuplicate) {
                    $tempItem['errors'][] = 'Producto duplicado';
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
        $items = $request->get('items');

        if (empty($items)) {
            $this->response->errorBadRequest();
        }

        $saved = 0;

        foreach ($items as $item) {
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
