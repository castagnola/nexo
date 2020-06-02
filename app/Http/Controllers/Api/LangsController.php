<?php

namespace Nexo\Http\Controllers\Api;


use Nexo\Entities\Team;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\LangRepository;
use Nexo\Transformers\LangTransformer;

class LangsController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(LangRepository $repository, LangTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * @param Team $team
     * @return mixed
     */
    public function index()
    {
        $items = $this->repository->all();

        $items->each(function (&$item) {
            $item->checkWithBase();
        });

        return $this->response->collection($items, $this->transformer);
    }


    public function json($lang = 'es')
    {
        $items = $this->repository->findByField('code', $lang);

        if ($items->isEmpty()) {

        }

        $item = $items->first();

        $item->checkWithBase();

        return $item->content;
    }
}
