<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\ServiceItem;

/**
 * Class ServiceItemTransformer
 * @package namespace Nexo\Transformers;
 */
class ServiceItemTransformer extends TransformerAbstract
{

    /**
     * Transform the \ServiceItem entity
     * @param \ServiceItem $model
     *
     * @return array
     */
    public function transform(ServiceItem $model) {
        return [
            'id'         => (int)$model->id,
            'service_type_id'         => (int)$model->service_type_id,

            /* place your other model properties here */

            'name' => $model->name,
            'description' => $model->description,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}