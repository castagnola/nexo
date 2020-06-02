<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\LocationCity;

/**
 * Class LocationCityTransformer
 * @package namespace Nexo\Transformers;
 */
class LocationCityTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['state'];

    /**
     * Transform the \LocationCity entity
     * @param \LocationCity $model
     *
     * @return array
     */
    public function transform(LocationCity $model)
    {

        return [
            'id' => (int)$model->id,

            /* place your other model properties here */
            'name' => $model->name,
            'full_name' => $model->full_name,
            'latitude' => $model->latitude,
            'longitude' => $model->longitude,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at


        ];
    }

    /**
     * @param LocationCity $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeState(LocationCity $model)
    {
        return $this->item($model->state, new LocationStateTransformer());
    }
}