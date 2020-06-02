<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\ServiceNoveltyRepository;
use Nexo\Entities\ServiceNovelty;

/**
 * Class ServiceNoveltyRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ServiceNoveltyRepositoryEloquent extends BaseRepository implements ServiceNoveltyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServiceNovelty::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }
}