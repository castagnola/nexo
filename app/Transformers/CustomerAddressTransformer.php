<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\CustomerAddress;
use Nexo\Services\Maps;

/**
 * Class CustomerStreetTransformer
 * @package namespace Nexo\Transformers;
 */
class CustomerAddressTransformer extends TransformerAbstract
{
    /**
     * Transform the \CustomerStreet entity
     * @param \CustomerStreet $model
     *
     * @return array
     */
    public function transform(CustomerAddress $model)
    {

        if(empty($model->address)){
            $model->address = $model->street;
        }

        if(empty($model->city) and !empty($model->cityRelation)){
            $model->city = $model->cityRelation->name;
        }

        if(empty($model->state) and !empty($model->cityRelation)){
            $model->state = $model->cityRelation->state->name;
        }

        //dd($model->map);

        return [
            'id' => (int)$model->id,
            'customer_id' => $model->customer_id,
            //'city_id' => (int)$model->city_id,
            'map' => !empty($model->map) ? route("imagecache", ['original', $model->map]) : false,

            'address' => $model->address,
            'street' => $model->street,
            'street_number' => $model->street_number,
            'latitude' => $model->latitude,
            'longitude' => $model->longitude,
            'is_primary' => (bool)$model->is_primary,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
            'city' => $model->city,
            'district' => $model->district,
            'state' => $model->state,
            'country' => $model->country,
            'country_code' => $model->country_code,
            'place_id' => $model->place_id,
            'vicinity' => $model->vicinity,
            'observations' => $model->observations,
            'is_autocompleted' => $model->is_autocompleted,
        ];
    }
}