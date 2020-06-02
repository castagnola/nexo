<?php

namespace Nexo\Transformers;

use Carbon\Carbon;
use League\Fractal\TransformerAbstract;
use Nexo\Entities\LocationCity;
use Nexo\Entities\Service;

/**
 * Class ServiceTransformer
 * @package namespace Nexo\Transformers;
 */
class ServiceTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $defaultIncludes = ['status', 'customer','items', 'team','services','products'];

    /**
     * @var array
     */
    protected $availableIncludes = ['user', 'assignments', 'team','accepted', 'users','creator', 'services', 'recurrence_dates', 'products','novelties'];

    /**
     * Transform the \Service entity
     * @param \Service $model
     *
     * @return array
     */
    public function transform(Service $model)
    {
        $with = ($model->with_services && $model->with_products ? 'both' : ($model->with_products? 'products' : 'services'));
        $startAt = $model->start_at;


        // Es para hoy
        /*$accepted = null;
        /*if($model->users){
            $accepted = $model->users()->wherePivot('accepted', '=', 1)->get();     
        }*/

        return [
            'id' => $model->hashid,
            'name' => $model->name,
            'code' => $model->code,
            'address' => $model->address,
            'verification_code' => $model->verification_code,
            'service_status_id' => $model->service_status_id,
            'status_slug' => $model->status->slug,
            'date_type' => $model->date_type,
            'date_type_name' => $model->date_type_name,
            'assignment_type_name' => $model->assignment_type_name,
            'assignment_type' => $model->assignment_type,
            'customer_id' => $model->customer_id,
            'customer_address_id' => $model->customer_address_id,
            'with_services' => $model->with_services,
            'with_products' => $model->with_products,
            'with' => $with,
            'map' => !empty($model->map) ? route("imagecache", ['original', $model->map]) : false,
            'is_today' => $startAt->isToday(),
            'novelties'=>array('data'=>$model->novelties),
            'duration' => (int) $model->duration,
            'latitude' => $model->latitude,
            'longitude' => $model->longitude,

            'start_at' => $model->start_at,
            'end_at' => $model->end_at,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
            'observations' => $model->observations,
            'error' => @$model->error?:'',
            //'accepted'    => array('data'=>$accepted),
        ];

        if (empty($model->duration)) {
            $model->duration = $model->start_at->diffInMinutes($model->end_at);
            $model->save();
        }

        if (empty($model->verification_code)) {
            $model->verification_code = strtoupper(str_random(3));
            $model->save();
        }

        $startAt = $model->start_at;
        $endAt = clone $startAt;
        $teamWorkMinutes = $model->team->work_time_minutes;

        $duration = $model->duration;
        if ($startAt->minute > 0 and $startAt->minute != $teamWorkMinutes and $teamWorkMinutes > 0) {
            $startAt->minute = floor($startAt->minute / $teamWorkMinutes) * $teamWorkMinutes;
        }
        $startAt->second = 0;

        $endAt->addMinutes($duration);
        $endAtForPeriod = clone $endAt;

        $period = [];
        /*
        $periodInterval = new \DatePeriod($startAt, \DateInterval::createFromDateString("{$teamWorkMinutes} minutes"), $endAtForPeriod->subMinutes($teamWorkMinutes));

        foreach ($periodInterval as $periodIntervalDate) {
            $period[] = $periodIntervalDate->format('Y-m-d-H-') . intval($periodIntervalDate->format('i'));
        }
        */
        /*$accepted = null;
        // Es para hoy
        if($model->users){
            $accepted = $model->users()->wherePivot('accepted', '=', 1)->get();     
        }*/
        


        return [
            'id' => \Hashids::encode($model->id),
            'service_type_id' => (int)$model->service_type_id,

            'code' => $model->code,
            'verification_code' => $model->verification_code,
            'status_slug' => $model->status->slug,
            'name' => $model->type->name,
            'date_type' => $model->date_type,
            'assignment_type' => $model->assignment_type,

            /* place your other model properties here */
            'start_at' => $startAt,
            'start_week' => $startAt->weekOfYear,
            'start_unix' => $startAt->timestamp,

            // Start at
            'start_at_day' => $startAt->format('d'),
            'start_at_month' => $startAt->format('m'),
            'start_at_year' => $startAt->format('Y'),

            'end_at' => $model->end_at,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
            'is_today' => $startAt->isToday(),

            'created_by' => (int)$model->created_by,
            'address' => !empty($model->address) ? $model->address : $model->customerAddress->street,
            'latitude' => $model->latitude,
            'longitude' => $model->longitude,
            'map' => $model->map,
            'observations' => $model->observations,
            'assignments_count' => $model->assignments->count(),
            'customer_id' => (int)$model->customer_id,
            'customer_address_id' => (int)$model->customer_address_id,

            // Team
            'team_id' => (int)$model->team_id,

            //novelties
            'novelties'=>array('data'=>$model->novelties),

            'user_id' => $model->user_id,

            /* For grid timeline*/
            'duration' => $duration,
            'period' => $period,

            // Statuses in booleans
            'is_expired' => $model->is_expired,
            'in_progress' => $model->status->slug == 'en-ejecucion',
            'is_doned' => $model->status->slug == 'realizado',

            //
            'users_count' => $model->users->count(),
            //'accepted'    => $accepted,

            'url' => [
                'team' => ''
            ]
        ];
    }

    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Item
     */
    public function includeType(Service $service)
    {
        return $this->item($service->type, new ServiceTypeTransformer());
    }

    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Item
     */
    public function includeservices(Service $service)
    {

        $services = $service->services;

        if($services){
            foreach ($services as $k => &$ser) {
                $ser->change_name = true;
                $services[$k] = $ser;
            }
        }

        $collection =  $this->collection($services, new ServiceTypeTransformer());
        return $collection;
    }

    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Item
     */
    public function includeCreator(Service $service)
    {
        return $this->item($service->creator, new UserTransformer());
    }

    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Item
     */
    public function includeCustomer(Service $service)
    {
        if (empty($service->customer)) {
            return null;
        }

        if (!empty($service->customer->deleted_at)) {
            return null;
        }

        return $this->item($service->customer, new CustomerTransformer());
    }


    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Item
     */
    public function includeStatus(Service $service)
    {
        return $this->item($service->status, new ServiceStatusTransformer());
    }

    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Collection
     */
    public function includeItems(Service $service)
    {
        return $this->collection($service->items, new ServiceItemTransformer());
    }

    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Item|null
     */
    public function includeUser(Service $service)
    {
        if (empty($service->user_id)) {
            return null;
        }

        return $this->item($service->user, new UserTransformer());
    }

    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Collection
     */
    public function includeAssignments(Service $service)
    {
        return $this->collection($service->assignments, new ServiceAssignmentTransformer());
    }

    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Collection
     */
    public function includeAccepted(Service $service)
    {   

        if (empty($service->users)) {
            return null;
        }

        $accepts = $service->users()->wherePivot('accepted', '=', 1)->get(); 
        return $this->collection($accepts, (new UserTransformer)->setDefaultIncludes(['services','geolocalizations']));
    }

    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Collection
     */
    public function includeUsers(Service $service)
    {
        //return $this->collection($service->users, (new UserTransformer)->setDefaultIncludes(['services','geolocalizations']));
        return $this->collection($service->users, new UserTransformer());
    }



    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Item
     */
    /*public function includeCity(Service $service)
    {
        return $this->item($service->city, new LocationCityTransformer());
    }*/

    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Item
     */
    public function includeNovelties(Service $service)
    {
        return $this->item($service->novelties, new ServiceNoveltyTransformer());
    }

    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Item
     */
    public function includeTeam(Service $service)
    {
        return $this->item($service->team, new TeamTransformer());
    }

    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Collection
     */
    public function includeProducts(Service $service)
    {
        return $this->collection($service->products, new ServiceProductTransformer());
    }

    /**
     * @param Service $service
     * @return \League\Fractal\Resource\Collection
     */
    public function includeRecurrenceDates(Service $service)
    {
        return $this->collection($service->recurrenceDates, new ServiceRecurrenceDateTransformer());
    }
}