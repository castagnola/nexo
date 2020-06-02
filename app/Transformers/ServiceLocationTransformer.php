<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\ServiceLocation;

/**
 * Class ServiceLocationTransformer
 * @package namespace Nexo\Transformers;
 */
class ServiceLocationTransformer extends TransformerAbstract
{

    /**
     * Transform the \ServiceLocation entity
     * @param \ServiceLocation $model
     *
     * @return array
     */
    public function transform(ServiceLocation $model)
    {
        return [
            'id'         => (int) $model->id,
            'service_id' => (int) $model->service_id,
            'user_id' => (int) $model->user_id,

            /* place your other model properties here */
            'latitude' => $model->latitude,
            'longitude' => $model->longitude,
            'bearing' => $model->bearing,
            'speed' => $model->speed,
            'created_at' => $model->created_at
        ];
    }
}
