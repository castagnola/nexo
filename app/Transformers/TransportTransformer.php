<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\Transport;

/**
 * Class TransportTransformer
 * @package namespace Nexo\Transformers;
 */
class TransportTransformer extends TransformerAbstract
{

    /**
     * Transform the \Transport entity
     * @param \Transport $model
     *
     * @return array
     */
    public function transform(Transport $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'name' => $model->name,
            'icon' => $model->icon,
            'description' => $model->description,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
