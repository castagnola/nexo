<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\ServiceTypeFieldRepository;
use Nexo\Entities\ServiceTypeField;

/**
 * Class ServiceTypeFieldRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ServiceTypeFieldRepositoryEloquent extends BaseRepository implements ServiceTypeFieldRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServiceTypeField::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
