<?php namespace Nexo\Http\Controllers\Api\Team;

use Illuminate\Http\Request;

use Nexo\Entities\Criteria\Service\StatusCriteria;
use Nexo\Entities\Service;
use Nexo\Entities\Team;
use Nexo\Events\ServiceWasStatusUpdated;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\ServiceRepository;
use Nexo\Transformers\ServiceTransformer;
use Nexo\Validators\ServiceValidator;

class ServicesController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer, $validator;

    public function __construct(ServiceRepository $repository, ServiceTransformer $transformer, ServiceValidator $validator)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Team $team)
    {
        $items = $this->repository->scopeQuery(function ($query) use ($team) {
            return $query->where('team_id', $team->id);
        });

        return $this->collection($items);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, Team $team)
    {
        $input = $request->all();
        $input['team_id'] = $team->id;
        $input['created_by'] = $this->userApi()->id;

        $service = $this->repository->create($input);
        return $this->response->item($service, $this->transformer);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Team $team, Service $service)
    {
        return $this->response->item($service, $this->transformer);
    }

    /**
     * @param Request $request
     * @param Team $team
     * @param Service $service
     * @return mixed
     */
    public function update(Request $request, Team $team, Service $service)
    {
        $model = $this->repository->update($request->all(), $service->id);

        if ($service->service_status_id != $model->service_status_id) {
            event(new ServiceWasStatusUpdated($model));
        }


        return $this->response->item($model, $this->transformer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Team $team, Service $service)
    {
        $this->repository->delete($service->id);
        return $this->response->noContent();
    }

}
