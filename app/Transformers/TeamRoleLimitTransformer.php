<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\TeamRoleLimit;

/**
 * Class TeamRoleLimitTransformer
 * @package namespace Nexo\Transformers;
 */
class TeamRoleLimitTransformer extends TransformerAbstract
{

    /**
     * Transform the \TeamRoleLimit entity
     * @param \TeamRoleLimit $model
     *
     * @return array
     */
    public function transform(TeamRoleLimit $model)
    {
        return [
            'id' => (int)$model->id,
            'role_id' => (int)$model->role_id,
            'team_id' => \Hashids::encode($model->team_id),
            'role_name' => $model->role->name,
            'role_slug' => $model->role->slug,

            /* place your other model properties here */

            'limit' => (int)$model->limit,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}