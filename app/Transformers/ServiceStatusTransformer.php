<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\ServiceStatus;

/**
 * Class ServiceStatusTransformer
 * @package namespace Nexo\Transformers;
 */
class ServiceStatusTransformer extends TransformerAbstract
{

    /**
     * Transform the \ServiceStatus entity
     * @param \ServiceStatus $model
     *
     * @return array
     */
    public function transform(ServiceStatus $model) {
        return [
            'id'         => (int)$model->id,

            /* place your other model properties here */

            'name' => $model->name,
            'slug' => $model->slug,
            'color' => $model->color,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}