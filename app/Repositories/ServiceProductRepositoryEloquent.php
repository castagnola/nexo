<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\ServiceProductRepository;
use Nexo\Entities\ServiceProduct;
use Nexo\Validators\ServiceProductValidator;

/**
 * Class ServiceProductRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ServiceProductRepositoryEloquent extends BaseRepository implements ServiceProductRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServiceProduct::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ServiceProductValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
