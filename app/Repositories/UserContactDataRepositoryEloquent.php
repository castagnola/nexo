<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\UserContactData;

/**
 * Class UserContactDataRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class UserContactDataRepositoryEloquent extends BaseRepository implements UserContactDataRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserContactData::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }
}