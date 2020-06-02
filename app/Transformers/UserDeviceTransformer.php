<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\UserDevice;

/**
 * Class UserDeviceTransformer
 * @package namespace Nexo\Transformers;
 */
class UserDeviceTransformer extends TransformerAbstract
{

    /**
     * Transform the \UserDevice entity
     * @param \UserDevice $model
     *
     * @return array
     */
    public function transform(UserDevice $model)
    {
        return [
            'id' => (int)$model->id,
            'user_id' => (int)$model->user_id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}