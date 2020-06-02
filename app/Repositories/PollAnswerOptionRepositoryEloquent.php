<?php

namespace Nexo\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\PollAnswerOption;

/**
 * Class PollAnswerOptionRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class PollAnswerOptionRepositoryEloquent extends BaseRepository implements PollAnswerOptionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PollAnswerOption::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }
}