<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Entities\PollAnswer;
use Nexo\Entities\Team;
use Nexo\Entities\Poll;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\PollAnswerRepository;
use Nexo\Transformers\PollAnswerTransformer;

/**
 * Class PollsController
 * @package Nexo\Http\Controllers\Api
 */
class PollsAnswersController extends Controller
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

    /**
     * @param Request $request
     * @param Team $team
     * @return mixed
     */
    public function store(Request $request)
    {
        $payload = $request->all();

        $model = $this->repository->create($payload);

        return $this->response->item($model, $this->transformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, PollAnswer $pollAnswer)
    {

        $model = $this->repository->update($request->all(), $pollAnswer->id);

        return $this->response->item($model, $this->transformer);
    }


    /**
     * @param Team $team
     * @param Poll $poll
     * @return mixed
     */
    public function destroy(PollAnswer $pollAnswer)
    {
        $this->repository->delete($pollAnswer->id);
        return $this->response->noContent();
    }
}
