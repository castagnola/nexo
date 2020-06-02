<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\UserContactData;

/**
 * Class UserContactDataTransformer
 * @package namespace Nexo\Transformers;
 */
class UserContactDataTransformer extends TransformerAbstract
{

    /**
     * Transform the \UserContactData entity
     * @param \UserContactData $model
     *
     * @return array
     */
    public function transform(UserContactData $model)
    {
        $types = collect(config('nexo.contactTypes'));
        $type = $types->where('slug', $model->type)->first();

        return [
            'id' => (int)$model->id,
            'user_id' => (int)$model->user_id,
            /* place your other model properties here */
            'value' => $model->value,
            'type' => $model->type,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}