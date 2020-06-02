<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\Team;

/**
 * Class TeamTransformer
 * @package namespace Nexo\Transformers;
 */
class
TeamTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['users', 'modules'];

    /**
     * Transform the \Team entity
     * @param \Team $model
     *
     * @return array
     */
    public function transform(Team $model)
    {
        $workTimeStart = $model->work_time_start;
        $workTimeEnd = $model->work_time_end;

        if (empty($workTimeStart)) {
            $workTimeStart = '08:00:00';
            $model->work_time_start = $workTimeStart;
            $model->save();
        }

        if (empty($workTimeEnd)) {
            $workTimeEnd = '18:00:00';
            $model->work_time_end = $workTimeEnd;
            $model->save();
        }


        return [
            'id' => \Hashids::encode($model->id),
            'slug' => $model->slug,
            'logo' => $model->logoUrl('medium'),
            'name' => $model->name,
            'status' => $model->status,
            'name_short' => 'TEAM',
            'url' => url($model->slug),

            /* place your other model properties here */
            'users_count' => $model->users->count(),
            'services_count' => $model->services->count(),

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
            'limits_used' => [
                'team-admin' => $model->usersByRoleSlug('team-admin')->count(),
                'despachador' => $model->usersByRoleSlug('despachador')->count(),
                'rutero' => $model->usersByRoleSlug('rutero')->count(),
            ],
            'limits' => $model->limits->map(function ($limit) {
                return [
                    'id' => $limit->id,
                    'role_id' => $limit->role_id,
                    'limit' => (int)$limit->limit,
                ];
            }),

            'work_time_start' => $workTimeStart,
            'work_time_end' => $workTimeEnd
        ];
    }


    /**
     * @param Team $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeUsers(Team $model)
    {
        return $this->collection($model->users, new UserTransformer());
    }

    /**
     * @param Team $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeModules(Team $model)
    {
        return $this->collection($model->modules, new ModuleTransformer());
    }

}
