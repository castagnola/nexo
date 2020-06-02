<?php

namespace Nexo\Repositories;

use Nexo\Validators\PollOptionValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\PollOption;

/**
 * Class PollOptionRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class PollOptionRepositoryEloquent extends BaseRepository implements PollOptionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PollOption::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return mixed
     */
    public function validator()
    {
        return PollOptionValidator::class;
    }
}