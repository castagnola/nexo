<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\CustomerPhone;

/**
 * Class CustomerContactDataTransformer
 * @package namespace Nexo\Transformers;
 */
class CustomerPhoneTransformer extends TransformerAbstract
{

    /**
     * Transform the \CustomerContactData entity
     * @param \CustomerPhone $model
     *
     * @return array
     */
    public function transform(CustomerPhone $model)
    {

        $types = collect(config('nexo.phonesTypes', []));
        $type = $types->where('slug', $model->type)->first();

        if(empty($type))
        {
            $type = (object)['icon' => null, 'name' => null, 'slug' => null];
        }

        return [
            'id' => (int)$model->id,
            'customer_id_hashed' => $model->customer_id,

            /* place your other model properties here */
            'phone' => $model->phone,
            'type' => $type,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}