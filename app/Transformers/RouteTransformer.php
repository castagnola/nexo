<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\Route;

/**
 * Class RouteTransformer
 * @package Nexo\Transformers
 */
class RouteTransformer extends TransformerAbstract
{

    /**
     * Transform the \UserRoute entity
     * @param \UserRoute $model
     *
     * @return array
     */
    public function transform(Route $model)
    {
        return [
            'id' => (int)$model->id,
            'user_id' => (int)$model->id,
            'service_id' => (int)$model->service_id,
            'route' => json_decode($model->route),
            'eta' => $model->eta,
            'distance' => $model->distance,
            'next_query' => $model->next_query,
            'updated_at' => $model->updated_at,
            'from_latitude' => (float)$model->from_latitude,
            'from_longitude' => (float)$model->from_longitude,
        ];
    }
}
