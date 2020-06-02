<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\UserGeolocalization;

/**
 * Class UserGeolocalizationTransformer
 * @package namespace Nexo\Transformers; 
 */
class UserGeolocalizationTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['user'];

    protected $availableIncludes = ['user'];

    /**
     * Transform the \UserGeolocalization entity
     * @param \UserGeolocalization $model
     *
     * @return array
     */
    public function transform(UserGeolocalization $model)
    {
        return [
            'id'         => (int)$model->id,
            'user_id'         => (int)$model->user_id,

            /* place your other model properties here */
            'latitude' => (float)$model->latitude,
            'longitude' => (float)$model->longitude,
            'last_distance' => (float)$model->last_distance,

            'created_at' => $model->created_at
        ];
    }

    /**
     * @param User $model
     * @param ParamBag $params
     * @return \League\Fractal\Resource\Collection
     */
    public function includeUser(UserGeolocalization $model)
    {
        $transform = new UserTransformer();
        $transform->setDefaultIncludes([]);
        return $this->item($model->user, $transform);
    }
}