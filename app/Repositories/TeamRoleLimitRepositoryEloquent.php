<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\TeamRoleLimitRepository;
use Nexo\Entities\TeamRoleLimit;

/**
 * Class TeamRoleLimitRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class TeamRoleLimitRepositoryEloquent extends BaseRepository implements TeamRoleLimitRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TeamRoleLimit::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}