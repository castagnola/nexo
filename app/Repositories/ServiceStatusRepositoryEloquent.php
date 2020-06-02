<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\ServiceStatus;

/**
 * Class ServiceStatusRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ServiceStatusRepositoryEloquent extends BaseRepository implements ServiceStatusRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServiceStatus::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }


}