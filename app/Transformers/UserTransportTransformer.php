<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\UserTransport;

/**
 * Class UserTransportTransformer
 * @package namespace Nexo\Transformers;
 */
class UserTransportTransformer extends TransformerAbstract
{

    /**
     * @var array
     */
    protected $defaultIncludes = ['transport'];

    /**
     * Transform the \UserTransport entity
     * @param \UserTransport $model
     *
     * @return array
     */
    public function transform(UserTransport $model)
    {
        return [
            'id' => (int)$model->id,
            'user_id' => (int)$model->user_id,
            'transport_id' => (int)$model->transport_id,

            'name' => $model->name,
            'observations' => $model->observations,
            'max_capacity' => $model->max_capacity,
            'max_speed' => $model->max_speed,
            'is_own' => $model->is_own,
            'max_passengers' => $model->max_passengers,
            'license_plate' => $model->license_plate,
            'city' => $model->city,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @param UserTransport $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeTransport(UserTransport $model)
    {
        return $this->item($model->transport, new TransportTransformer);
    }
}
