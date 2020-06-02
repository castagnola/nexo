<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\UserItinerary;

/**
 * Class UserItineraryTransformer
 * @package namespace Nexo\Transformers;
 */
class UserItineraryTransformer extends TransformerAbstract
{

    /**
     * Transform the \UserItinerary entity
     * @param \UserItinerary $model
     *
     * @return array
     */
    public function transform(UserItinerary $model)
    {
        return [
            'id' => (int)$model->id,
            'user_id' => (int)$model->user_id,

            /* place your other model properties here */
            'itinerary' => json_decode($model->itinerary),
            'total_duration' => $model->total_duration,
            'total_distance' => $model->total_distance,
            'next_query' => $model->next_query,
            'date' => $model->date,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
