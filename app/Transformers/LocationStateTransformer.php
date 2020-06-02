<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\LocationState;

/**
 * Class LocationStateTransformer
 * @package namespace Nexo\Transformers;
 */
class LocationStateTransformer extends TransformerAbstract
{

    /**
     * Transform the \LocationState entity
     * @param \LocationState $model
     *
     * @return array
     */
    public function transform(LocationState $model)
    {
        return [
            'id' => (int)$model->id,

            /* place your other model properties here */
            'name' => $model->name,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}