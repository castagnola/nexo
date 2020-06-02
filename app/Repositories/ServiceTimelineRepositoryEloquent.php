<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\ServiceTimelineRepository;
use Nexo\Entities\ServiceTimeline;

/**
 * Class ServiceTimelineRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ServiceTimelineRepositoryEloquent extends BaseRepository implements ServiceTimelineRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServiceTimeline::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
