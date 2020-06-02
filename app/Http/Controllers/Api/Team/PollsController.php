<?php

namespace Nexo\Http\Controllers\Api\Team;

use Illuminate\Http\Request;

use Nexo\Entities\Poll;
use Nexo\Entities\Team;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\PollRepository;
use Nexo\Repositories\UserRepository;
use Nexo\Transformers\PollTransformer;
use Nexo\Transformers\UserTransformer;
use Nexo\User;
use Nexo\Validators\UserValidator;

/**
 * Class PollsController
 * @package Nexo\Http\Controllers\Api\Team
 */
class PollsController extends Controller
{
    use ApiResponse;

    /**
     * @var PollRepository
     */
    /**
     * @var PollRepository|PollTransformer
     */
    /**
     * @var PollRepository|PollTransformer
     */
    protected $repository, $transformer, $validator;

    /**
     * @param PollRepository $repository
     * @param PollTransformer $transformer
     */
    public function __construct(PollRepository $repository, PollTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * @param Team $team
     * @return mixed
     */
    public function index(Team $team)
    {
        $items = $this->repository->findByField('team_id', $team->id);

        return $this->response->collection($items, $this->transformer);
    }

    /**
     * @param Team $team
     * @param Poll $poll
     * @return mixed
     */
    public function show(Team $team, Poll $poll)
    {
        return $this->response->item($poll, $this->transformer);
    }

    /**
     * @param Request $request
     * @param Team $team
     * @return mixed
     */
    public function store(Request $request, Team $team)
    {
        $payload = $request->all();
        $payload['team_id'] = $team->id;
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
    public function update(Request $request, Team $team, Poll $poll)
    {
        $model = $this->repository->update($request->all(), $poll->id);

        return $this->response->item($model, $this->transformer);
    }


    /**
     * @param Team $team
     * @param Poll $poll
     * @return mixed
     */
    public function destroy(Team $team, Poll $poll)
    {
        $this->repository->delete($poll->id);
        return $this->response->noContent();
    }
}
