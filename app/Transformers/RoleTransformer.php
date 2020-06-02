<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\Role;

/**
 * Class RoleTransformer
 * @package namespace Nexo\Transformers;
 */
class RoleTransformer extends TransformerAbstract
{

    /**
     * Transform the \Role entity
     * @param \Role $model
     *
     * @return array
     */
    public function transform(Role $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'name' => $model->name,
            'slug' => $model->slug,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
            'for_team' => $model->for_team,
            'active' => $model->active,
            'need_transport' => $model->need_transport,
        ];
    }
}
