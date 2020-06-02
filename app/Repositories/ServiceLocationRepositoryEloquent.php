<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\ServiceLocationRepository;
use Nexo\Entities\ServiceLocation;

/**
 * Class ServiceLocationRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ServiceLocationRepositoryEloquent extends BaseRepository implements ServiceLocationRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServiceLocation::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
