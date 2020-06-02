<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\Tool;

/**
 * Class ToolTransformer
 * @package namespace Nexo\Transformers;
 */
class ToolTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['services','products'];

    /**
     * @var array
     */
    protected $availableIncludes = ['services','products'];

    /**
     * Transform the \Tool entity
     * @param \Tool $model
     *
     * @return array
     */
    public function transform(Tool $model)
    {
        return [
            'id' => \Hashids::encode($model->id),
            'SKU' => $model->SKU,
            'name' => $model->name,
            'description' => $model->description,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }


     /**
     * @param ServiceType $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeServices(Tool $model)
    {   
        return $this->collection($model->services, new ServiceTypeTransformer());
    }


     /**
     * @param ServiceType $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeProducts(Tool $model)
    {   
        return $this->collection($model->products, new ProductTransformer());
    }


    
}
