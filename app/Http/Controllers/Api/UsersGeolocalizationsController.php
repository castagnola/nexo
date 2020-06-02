<?php

namespace Nexo\Http\Controllers\Api;

use Illuminate\Http\Request;

use Nexo\Entities\Service;
use Nexo\Entities\UserGeolocalization;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\UserGeolocalizationRepository;
use Nexo\Transformers\UserGeolocalizationTransformer;
use Nexo\Entities\User;

class UsersGeolocalizationsController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct(UserGeolocalizationRepository $repository, UserGeolocalizationTransformer $transformer)
    {
        $this->repository = $repository;
        $this->transformer = $transformer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request, User $user)
    {
        $limit = $request->get('limit');

        if (empty($limit)) {
            $limit = 5;
        }

        $items = $this->repository->scopeQuery(function ($query) use ($user) {
            return $query->where('user_id', $user->id);
        })->paginate($limit);

        return $this->response->paginator($items, $this->transformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, User $user)
    {
        //$input = $request->only('latitude', 'longitude', 'speed', 'bearing', 'last_distance');
        $input = $request->all();
        $input['user_id'] = $user->id;

        $item = $this->repository->create($input);


        /*
        // Borrando todas menos las ultimas 100
        // TODO: Mover a un lugar más acorde
        $lastId = UserGeolocalization::where('user_id', $user->id)->offset(100)->orderBy('created_at', 'desc')->first();
        if (!empty($lastId)) {
            UserGeolocalization::where('user_id', $user->id)->where('id', '<=', $lastId->id)->delete();
        }

        if ($request->has('service_id')) {
            $service = Service::findOrFail($request->get('service_id'));

            $service->locations()->create($input);
        }
        */

        return $this->response->item($item, $this->transformer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
