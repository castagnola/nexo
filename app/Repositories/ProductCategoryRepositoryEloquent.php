<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\ProductCategoryRepository;
use Nexo\Entities\ProductCategory;
use Nexo\Validators\ProductCategoryValidator;;

/**
 * Class ProductCategoryRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ProductCategoryRepositoryEloquent extends BaseRepository implements ProductCategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductCategory::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProductCategoryValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
