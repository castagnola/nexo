<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\UserTransportRepository;
use Nexo\Entities\UserTransport;

/**
 * Class UserTransportRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class UserTransportRepositoryEloquent extends BaseRepository implements UserTransportRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserTransport::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
