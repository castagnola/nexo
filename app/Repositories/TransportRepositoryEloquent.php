<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\TransportRepository;
use Nexo\Entities\Transport;

/**
 * Class TransportRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class TransportRepositoryEloquent extends BaseRepository implements TransportRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Transport::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
