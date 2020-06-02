<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\ServiceType;

/**
 * Class ServiceTypeTransformer
 * @package namespace Nexo\Transformers;
 */
class ServiceTypeTransformer extends TransformerAbstract
{

    /**
     * @var array
     */
    protected $availableIncludes = ['items', 'fields'];


    /**
     * @param ServiceType $model
     * @return array
     */
    public function transform(ServiceType $model)
    {

        $name = $model->name;
        $name_time = "{$model->name} ({$model->avg_response_time})";
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
            $name_time = "{$model->name} ({$model->avg_response_time}) ".$string_tools;
        }


        return [
            'id' => (int)$model->id,

            /* place your other model properties here */

            'name' => $name,
            'name_only' => $model->name,
            'name_time' => $name_time,
            'slug' => $model->slug,
            'description' => $model->description,
            'items_count' => $model->items->count(),
            'fields_count' => $model->fields->count(),
            'response_time' => $model->avg_response_time,
            'avg_response_time' => $model->avg_response_time,
            'duration' => $model->response_time,
            'services_count' => $model->services->count(),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
            'tools'      => $model->tools
        ];
    }

    /**
     * @param ServiceType $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeItems(ServiceType $model)
    {
        return $this->collection($model->items, new ServiceItemTransformer());
    }

    /**
     * @param ServiceType $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeFields(ServiceType $model)
    {
        return $this->collection($model->fields, new ServiceTypeFieldTransformer());
    }

    /**
     * @param ServiceType $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeTools(ServiceType $model)
    {
        return $this->collection($model->tools, new ToolTransformer());
    }
}