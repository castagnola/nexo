<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\Product;

/**
 * Class ProductTransformer
 * @package namespace Nexo\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['category'];

    /**
     * Transform the \Product entity
     * @param \Product $model
     *
     * @return array
     */
    public function transform(Product $model)
    {

        $name = $model->name;
        $tools = $model->tools;

        if($model->change_name){
            
            $nameTools = array();
            $string_tools = '';
            if($tools){
                foreach ($tools as $key => $tool) {
                    $nameTools[] = $tool->name;
                }
            }


            if($nameTools){
                $string_tools = ' / Herramientas ('.implode(',', $nameTools).')'; 
            }
            
            $name = $model->name .' '.$string_tools;
        }

        return [
            'id' => \Hashids::encode($model->id),
            'product_id' => $model->id, 
            'SKU' => $model->SKU,
            'name' => $name,
            'name_only' => $model->name,
            'description' => $model->description,
            'weight' => $model->weight,
            'weight_unit' => $model->weight_unit,
            'height' => $model->height,
            'height_unit' => $model->height_unit,
            'width' => $model->width,
            'width_unit' => $model->width_unit,
            'depth' => $model->depth,
            'depth_unit' => $model->depth_unit,
            'category_id' => $model->category_id,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
            'tools'      => $model->tools
        ];
    }


    public function includeCategory($model)
    {
        return $this->item($model->category, new ProductCategoryTransformer());
    }
}
