<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Entities\Team;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\PollRepository;
use Nexo\Transformers\PollTransformer;

class TeamsPollsController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(PollRepository $repository, PollTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    public function index(Team $team)
    {
        $items = $this->repository->findWhere([
            'team_id' => $team->id,
            'is_active' => 1
        ]);
        return $this->response->collection($items, $this->transformer);
    }

    public function getCurrent(Team $team)
    {
        $items = $this->repository->findWhere([
            'team_id' => $team->id,
            'is_active' => 1
        ]);

        $item = null;

        if (!$items->isEmpty()) {
            $item = $items->first();
        }

        return $this->response->item($item, $this->transformer);
    }
}
