<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\ServiceRecurrenceDateRepository;
use Nexo\Entities\ServiceRecurrenceDate;
use Nexo\Validators\ServiceRecurrenceDateValidator;

/**
 * Class ServiceRecurrenceDateRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class ServiceRecurrenceDateRepositoryEloquent extends BaseRepository implements ServiceRecurrenceDateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ServiceRecurrenceDate::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ServiceRecurrenceDateValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
