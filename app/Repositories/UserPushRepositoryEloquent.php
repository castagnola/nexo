<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\UserPushRepository;
use Nexo\Entities\UserPush;

/**
 * Class UserPushRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class UserPushRepositoryEloquent extends BaseRepository implements UserPushRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserPush::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }
}