<?php

namespace Nexo\Http\Controllers\Api;

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
use Nexo\Entities\User;
use Nexo\Validators\UserValidator;

/**
 * Class PollsController
 * @package Nexo\Http\Controllers\Api
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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $teamId = $this->getTeamId($request);

        $repository = $this->repository->scopeQuery(function ($query) use ($teamId) {
            $return = $query->where('team_id', $teamId);

            return $return;
        });

        return $this->collection($request, $repository);
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
    public function store(Request $request)
    {
        $payload = $request->all();
        $payload['team_id'] = $this->getTeamId($request);
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
        $payload = $request->all();
        $payload['team_id'] = $this->getTeamId($request);
        $model = $this->repository->update($payload, $poll->id);
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
