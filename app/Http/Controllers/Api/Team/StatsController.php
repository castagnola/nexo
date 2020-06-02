<?php

namespace Nexo\Http\Controllers\Api\Team;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Nexo\Entities\Team;
use Nexo\Http\Controllers\Api\ApiResponse;
use Nexo\Http\Requests;
use Nexo\Http\Controllers\Controller;
use Nexo\Repositories\ServiceRepository;
use Nexo\Repositories\ServiceStatusRepository;
use Nexo\Repositories\ServiceTypeRepository;

class StatsController extends Controller
{
    use ApiResponse;

    public function __construct(ServiceRepository $serviceRepository, ServiceStatusRepository $serviceStatusRepository)
    {
        $this->serviceRepository = $serviceRepository;
        $this->serviceStatusRepository = $serviceStatusRepository;

        setlocale(LC_ALL, 'es_ES');
    }


    /**
     * @param Request $request
     * @param Team $team
     * @return mixed
     */
    public function services(Request $request, Team $team)
    {
        $start = new Carbon($request->get('start'));
        $end = new Carbon($request->get('end'));

        $statuses = $this->serviceStatusRepository->all();

        $series = $statuses->lists('id')->toArray();
        $labels = [];
        $labelsToShow = [];
        $data = [];

        // Setteando los meses como labels
        $period = new \DatePeriod($start, new \DateInterval('P1M'), $end);
        foreach($period as $periodDate){
            $labels[] = $periodDate->format('Y-n');
            $labelsToShow[] = ucfirst(strftime('%b, %Y', $periodDate->timestamp));
        }

        foreach($series as $serie){
            $data[$serie] = [];
            foreach($labels as $label){
                $data[$serie][$label] = 0;
            }
        }


        $services = $team->services()
            ->select('service_status_id')
            ->selectRaw('YEAR(services.created_at) as created_at_year')
            ->selectRaw('MONTH(services.created_at) as created_at_month')
            ->selectRaw('COUNT(services.id) as count')
            ->whereBetween('created_at', [$start->toDateString(), $end->toDateString()])
            ->groupBy('service_status_id', 'created_at_year', 'created_at_month')
            ->get();

        foreach($services as $service){
            $label = "{$service->created_at_year}-{$service->created_at_month}";
            $data[(int) $service->service_status_id][$label] = $service->count;
        }

        $seriesToShow = $statuses->lists('name')->toArray();

        return $this->response->array([
            'series' => $seriesToShow,
            'labels' => $labelsToShow,
            'data' => array_values(array_map('array_values', $data))
        ]);
    }

    /**
     * @param Request $request
     * @param Team $team
     * @return mixed
     */
    public function users(Request $request, Team $team)
    {
        $start = new Carbon($request->get('start'));
        $end = new Carbon($request->get('end'));

        $users = $team->users()->whereHas('roles', function($query){
            return $query->where('slug', 'rutero');
        })->get();


        $series = $users->lists('id')->toArray();
        $labels = [];
        $labelsToShow = [];
        $data = [];

        // Setteando los meses como labels
        $period = new \DatePeriod($start, new \DateInterval('P1M'), $end);
        foreach($period as $periodDate){
            $labels[] = $periodDate->format('Y-n');
            $labelsToShow[] = ucfirst(strftime('%b, %Y', $periodDate->timestamp));
        }

        foreach($series as $serie){
            $data[$serie] = [];
            foreach($labels as $label){
                $data[$serie][$label] = 0;
            }
        }


        $services = $team->services()
            ->select('users.id as user_id')
            ->selectRaw('YEAR(services.created_at) as created_at_year')
            ->selectRaw('MONTH(services.created_at) as created_at_month')
            ->selectRaw('COUNT(services.id) as count')
            ->join('services_assignments', function($join){
                return $join->on('services.id', '=', 'services_assignments.service_id')->where('accepted', '=', 0);
            })
            ->join('users', 'services_assignments.user_id', '=', 'users.id')
            ->whereBetween('services.created_at', [$start->toDateString(), $end->toDateString()])
            ->groupBy('users.id', 'created_at_year', 'created_at_month')
            ->get();

        ;

        foreach($services as $service){
            $label = "{$service->created_at_year}-{$service->created_at_month}";
            $data[(int) $service->user_id][$label] = $service->count;
        }

        $seriesToShow = $users->lists('first_name')->toArray();

        return $this->response->array([
            'series' => $seriesToShow,
            'labels' => $labelsToShow,
            'data' => array_values(array_map('array_values', $data))
        ]);
    }
}
