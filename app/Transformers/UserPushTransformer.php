<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\UserPush;

/**
 * Class UserPushTransformer
 * @package namespace Nexo\Transformers;
 */
class UserPushTransformer extends TransformerAbstract
{

    /**
     * Transform the \UserPush entity
     * @param \UserPush $model
     *
     * @return array
     */
    public function transform(UserPush $model)
    {
        return [
            'id'         => (int)$model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}