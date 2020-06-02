<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Entities\PollAnswerOption;
use Nexo\Entities\Team;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\PollAnswerOptionRepository;
use Nexo\Transformers\PollAnswerOptionTransformer;

/**
 * Class PollsController
 * @package Nexo\Http\Controllers\Api
 */
class PollsAnswerOptionsController extends Controller
{
    use ApiResponse;

    /**
     * @var PollAnswerRepository
     */
    /**
     * @var PollAnswerRepository|PollAnswerTransformer
     */
    /**
     * @var PollAnswerRepository|PollAnswerTransformer
     */
    protected $repository, $transformer, $validator;

    /**
     * @param PollAnswerRepository $repository
     * @param PollAnswerTransformer $transformer
     */
    public function __construct(PollAnswerRepository $repository, PollAnswerTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * @param Team $team
     * @param Poll $poll
     * @return mixed
     */
    public function show(PollAnswer $model)
    {
        return $this->response->item($model, $this->transformer);
    }
}
