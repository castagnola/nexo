<?php

namespace Nexo\Entities;

use Carbon\Carbon;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nexo\Entities\Route;
use Nexo\Entities\Service;
use Nexo\Entities\UserDevice;
use Nexo\Entities\UserItinerary;
use Nexo\Entities\UserPush;
use Nexo\Entities\UserRoute;
use Nexo\Entities\UserTransport;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Venturecraft\Revisionable\RevisionableTrait;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Foundation\Auth\Access\Authorizable;
use YoHang88\LetterAvatar\LetterAvatar;

/**
 * Class User
 * @package Nexo
 */
class User extends EloquentUser implements AuthenticatableContract, CanResetPasswordContract, AuthorizableContract
{
    use Authenticatable, CanResetPassword, RevisionableTrait, Authorizable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'avatar', 'services'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
     * @var array
     */
    protected $dontKeepRevisionOf = array(
        'password',
        'remember_token',
        'updated_at',
        'last_login',
        'app_status',
        'lang'
    );

    /**
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * {@inheritDoc}
     */
    public function getUserId()
    {
        return $this->getKey();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function teams()
    {
        return $this->belongsToMany(\Nexo\Entities\Team::class, 'team_user');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customers()
    {
        return $this->hasMany(\Nexo\Entities\Customer::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function assignments()
    {
        return $this->hasMany(\Nexo\Entities\ServiceAssignment::class, 'user_id')->where('accepted', 0)->where('declined', 0);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(\Nexo\Entities\Service::class, 'service_user')->orderby('id','DESC')->limit(7);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function geolocalizations()
    {
        return $this->hasMany(\Nexo\Entities\UserGeolocalization::class, 'user_id')->orderby('id','DESC')->limit(5);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contact()
    {
        return $this->hasMany(\Nexo\Entities\UserContactData::class, 'user_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phones()
    {
        return $this->hasMany(\Nexo\Entities\UserContactData::class, 'user_id')->whereIn('type', ['telefono-movil', 'telefono-fijo']);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function devices()
    {
        return $this->hasMany(UserDevice::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pushNotifications()
    {
        return $this->hasMany(UserPush::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transports()
    {
        return $this->hasMany(UserTransport::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function itineraries()
    {
        return $this->hasMany(UserItinerary::class, 'user_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function routes()
    {
        return $this->hasMany(Route::class, 'user_id');
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return \Activation::completed($this);
    }

    /**
     * @return mixed
     */
    public function lastGeolocalization()
    {
        return $this->geolocalizations->last();
    }

    /**
     * @param string $filter
     * @return string
     */
    public function avatarUrl($filter = 'original')
    {
        $exists = !empty($this->avatar) && file_exists(storage_path('app/' . $this->avatar));

        if ($exists) {
            return route("imagecache", [$filter, $this->avatar]);
        }

        $fileName = "avatars/temp-" . md5($this->name . $this->id) . '.jpg';

        $avatar = new LetterAvatar($this->name, 'square', 300);


        \Storage::makeDirectory('avatars', 0777, false, true);


        $avatar->generate()->save(storage_path('app/' . $fileName));

        $this->avatar = $fileName;
        $this->save();

        return $this->avatarUrl($filter);
    }

    /**
     * @return array
     */
    public function avatarSizes()
    {
        return [
            'small' => $this->avatarUrl('small'),
            'medium' => $this->avatarUrl('medium'),
            'large' => $this->avatarUrl('large'),
            '150' => $this->avatarUrl('150'),
            'xs' => $this->avatarUrl('xs'),
        ];
    }

    /**
     * @return bool
     */
    public function isSuperAdmin()
    {
        return parent::inRole('admin');
    }

    /**
     * @param $permissions
     * @return bool
     */
    public function hasAccess($permissions)
    {
        if ($this->isSuperAdmin()) {
            return true;
        }
        return parent::hasAccess($permissions);
    }


    /**
     * @param $query
     * @return mixed
     */
    public function scopeOnlyRuteros($query)
    {
        return $query->whereHas('roles', function ($query) {
            return $query->where('slug', 'rutero');
        });
    }

    public function getCode()
    {
        if (empty($this->code)) {
            $team = $this->teams->first();

            $this->code = $this->id;

            if (!empty($team)) {
                $lastCode = (int)$team->users->max('code');

                $this->code = $lastCode + 1;

                if (empty($lastCode)) {
                    $teamUsersCount = str_pad(1, 3, '0', STR_PAD_LEFT);
                    $this->code = "{$team->id}{$teamUsersCount}";
                }
            }

            $this->save();
        }

        return $this->code;
    }


    /**
     * @param bool|false $force
     * @return mixed
     */
    public function calculateRoutes($force = false)
    {
        // Guardando resultados
        $userRoute = UserRoute::firstOrCreate([
            'user_id' => $this->id
        ]);

        $check = empty($userRoute->next_query);

        if (!$check) {
            $check = $userRoute->next_query->isPast();
        }

        $check = true;

        if ($check) {
            $services = $this->services->filter(function ($service) {
                return $service->status->active;
            });


            $userLastGeolocalization = $this->geolocalizations->last();

            if (empty($userLastGeolocalization)) {
                return false;
            }

            $origins = "{$userLastGeolocalization->latitude},{$userLastGeolocalization->longitude}";
            $destinations = [];

            foreach ($services as $service) {
                array_push($destinations, "{$service->latitude}, {$service->longitude}");
            }

            $destinations = implode('|', $destinations);

            $response = \GoogleMaps::load('distancematrix')
                ->setParamByKey('origins', $origins)
                ->setParamByKey('destinations', $destinations)
                ->setParamByKey('arrival_time', $services->first()->start_at->timestamp)
                ->get();


            $responseJSON = json_decode($response);


            if ($responseJSON->status !== 'OK') {
                return false;
            }


            $points = collect([]);
            $totalDuration = 0;
            $totalDistance = 0;

            foreach ($responseJSON->rows as $row) {
                foreach ($row->elements as $index => $element) {
                    if ($element->status == 'OK') {

                        $service = $services[$index];

                        $distance = $element->distance;
                        $duration = $element->duration;
                        $totalServiceDuration = $duration->value + $service->type->response_time_in_seconds;

                        $date = Carbon::now()->addSeconds($duration->value);
                        $points->push([
                            'service_id' => $service->id,
                            'distance' => $distance->value,
                            'duration' => $duration->value,
                            'total_duration' => $totalServiceDuration,
                            'distance_text' => $distance->text,
                            'duration_text' => $duration->text,
                            'date' => $date->toDateTimeString(),
                            'service_date_start' => $service->start_at,
                            'service_date_end' => $service->end_at,
                        ]);

                        $totalDuration += $totalServiceDuration;
                        $totalDistance += $distance->value;
                    }
                }
            }

            $nextQueryDate = Carbon::now()->addSeconds($totalDuration / 2);


            $userRoute->update([
                'distance' => json_encode($points),
                'total_duration' => $totalDuration,
                'total_distance' => $totalDistance,
                'next_query' => $nextQueryDate->toDateTimeString()
            ]);
        }


        return $userRoute;
    }


    /**
     * @param bool|false $force
     * @return static
     */
    public function getDayItinerary($force = false)
    {
        $today = Carbon::now();
        $endOfToday = Carbon::now()->endOfDay();
        $team = $this->teams->first();
        $workTimeStart = $team->work_time_start;

        $itinerary = UserItinerary::firstOrCreate([
            'user_id' => $this->id,
            'date' => $today->toDateString()
        ]);


        if (!empty($workTimeStart)) {
            $workTimeStartDT = Carbon::createFromFormat('H:i:s', $team->work_time_start);
            $hourStart = $workTimeStartDT->hour;
        } else {
            $hourStart = 8;
        }

        $today->hour = $hourStart;
        $today->minute = 0;
        $today->second = 0;


        $check = true;


        if (!empty($itinerary->next_query)) {
            $check = $itinerary->next_query->isPast();
        }

        if ($check or $force) {

            $userId = $this->id;

            $services = Service::where('start_at', '>=', $today->toDateTimeString())
                ->where('end_at', '<=', $endOfToday->toDateTimeString())
                ->whereHas('status', function ($query) {
                    return $query->whereIn('slug', config('nexo.pending_statuses'));
                })
                ->whereHas('users', function ($query) use ($userId) {
                    return $query->where('id', $userId);
                })
                ->get();


            if (!$services->isEmpty()) {
                $userLastGeolocalization = $this->geolocalizations->last();


                if (empty($userLastGeolocalization)) {
                    return false;
                }

                $origins = "{$userLastGeolocalization->latitude}, {$userLastGeolocalization->longitude}";
                $destinations = [];

                foreach ($services as $service) {
                    array_push($destinations, "{$service->latitude}, {$service->longitude}");
                }

                $destinations = implode('|', $destinations);

                $paramsToGoogle = [
                    'origins' => $origins,
                    'destinations' => $destinations,
                    'arrival_time' => $services->first()->start_at->timestamp
                ];


                $response = \GoogleMaps::load('distancematrix')
                    ->setParam($paramsToGoogle)
                    ->get();

                $responseJSON = json_decode($response);


                if ($responseJSON->status !== 'OK') {
                    return false;
                }

                $rows = $responseJSON->rows;
                $itineraryObject = collect([]);
                $totalDuration = 0;
                $totalDistance = 0;

                foreach ($rows as $row) {
                    foreach ($row->elements as $index => $element) {
                        if ($element->status == 'OK') {

                            $service = $services[$index];

                            $distance = $element->distance;
                            $duration = $element->duration;
                            $totalServiceDuration = $duration->value + $service->type->response_time_in_seconds;


                            $totalDuration += $totalServiceDuration;
                            $totalDistance += $distance->value;


                            $date = Carbon::now()->addSeconds($duration->value);
                            $cumulativeTrafficDuration = ($totalDuration - $service->type->response_time_in_seconds);
                            $dateCumulativeTrafficDuration = Carbon::now()->addSeconds($cumulativeTrafficDuration);

                            $itineraryObject->push([
                                'service_id' => $service->id,
                                'distance' => $distance->value,
                                'cumulative_distance' => $totalDistance,
                                'traffic_duration' => $duration->value,
                                'total_duration' => $totalServiceDuration,
                                'service_duration' => $service->type->response_time_in_seconds,
                                'cumulative_duration' => $totalDuration,
                                'cumulative_traffic_duration' => $cumulativeTrafficDuration,
                                'date' => $date->toDateTimeString(),
                                'date_cumulative' => $dateCumulativeTrafficDuration,
                                'service_date_start' => $service->start_at,
                                'service_date_end' => $service->end_at,
                            ]);
                        }
                    }
                }

                $firstItineraryObject = $itineraryObject->first();


                $nextQueryDate = Carbon::now()->addSeconds($firstItineraryObject['cumulative_traffic_duration'] / 2);


                $itinerary->update([
                    'itinerary' => json_encode($itineraryObject),
                    'total_duration' => $totalDuration,
                    'total_distance' => $totalDistance,
                    'next_query' => $nextQueryDate->toDateTimeString()
                ]);
            }
        }


        return $itinerary;
    }

    /**
     * @return $this
     */
    public function updateAppStatus()
    {
        $appStatus = 'STAND_BY';

        $servicesInRoute = $this->services->filter(function ($service) {
            return $service->status->slug == 'en-ruta';
        });

        if (!$servicesInRoute->isEmpty()) {
            $appStatus = 'IN_ROUTE';
        } else {
            $servicesExecuting = $this->services->filter(function ($service) {
                return $service->status->slug == 'en-ejecucion';
            });

            if (!$servicesExecuting->isEmpty()) {
                $appStatus = 'EXECUTING';
            }
        }

        $this->app_status = $appStatus;
        $this->save();

        return $this;
    }
}
