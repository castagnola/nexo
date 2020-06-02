<?php

namespace Nexo\Repositories;

use Nexo\Validators\PollQuestionValidator;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Nexo\Entities\PollQuestion;

/**
 * Class PollQuestionRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class PollQuestionRepositoryEloquent extends BaseRepository implements PollQuestionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PollQuestion::class;
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
        return PollQuestionValidator::class;
    }

}