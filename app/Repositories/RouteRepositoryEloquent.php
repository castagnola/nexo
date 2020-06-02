<?php

namespace Nexo\Repositories;

use Carbon\Carbon;
use Nexo\Entities\Route;
use Nexo\Entities\Service;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class UserRouteRepositoryEloquent
 * @package namespace Nexo\Repositories;
 */
class RouteRepositoryEloquent extends BaseRepository implements RouteRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Route::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    public function create(array $attributes)
    {
        $service = Service::find($attributes['service_id']);

        $origin = "{$attributes['latitude']}, {$attributes['longitude']}";
        $destination = "{$service->latitude}, {$service->longitude}";

        $paramsToGoogleMaps = [
            'origin' => $origin,
            'destination' => $destination
        ];


        $response = \GoogleMaps::load('directions')
            ->setParam($paramsToGoogleMaps)
            ->get();

        $responseJSON = json_decode($response);


        if ($responseJSON->status !== 'OK') {
            return false;
        }

        $distance = 0;
        $eta = 0;

        $routes = $responseJSON->routes;

        foreach ($routes as $route) {
            $legs = $route->legs;

            foreach ($legs as $leg) {
                $distance += $leg->distance->value;
                $eta += $leg->duration->value;
            }
        }


        $attributes['route'] = $response;

        $nextQuery = Carbon::now()->addSeconds($eta / 2);

        $attributes['next_query'] = $nextQuery->toDateTimeString();
        $attributes['eta'] = $eta;
        $attributes['distance'] = $distance;
        $attributes['from_latitude'] = $attributes['latitude'];
        $attributes['from_longitude'] = $attributes['longitude'];
        $attributes['arrival_date'] = Carbon::now()->addSeconds($eta)->toDateTimeString();

        $model = parent::create($attributes);

        return $model;
    }
}
