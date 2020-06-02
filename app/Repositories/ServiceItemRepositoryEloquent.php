<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\ServiceItem;

/**
 * Class ServiceItemRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ServiceItemRepositoryEloquent extends BaseRepository implements ServiceItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServiceItem::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }
}