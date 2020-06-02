<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\ServiceExtraRepository;
use Nexo\Entities\ServiceExtra;

/**
 * Class ServiceExtraRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ServiceExtraRepositoryEloquent extends BaseRepository implements ServiceExtraRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServiceExtra::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
