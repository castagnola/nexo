<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Repositories\LangRepository;
use Nexo\Entities\Lang;
use Nexo\Validators\LangValidator;

/**
 * Class LangRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class LangRepositoryEloquent extends BaseRepository implements LangRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Lang::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return LangValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
