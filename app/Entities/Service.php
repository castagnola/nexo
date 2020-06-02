<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Nexo\EntitiesPresenters\ServicePresenter;
use Nexo\Events\ServiceWasExpired;
use Nexo\Entities\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Mappable;
use Sofa\Eloquence\Mutable;
use Venturecraft\Revisionable\RevisionableTrait;

/**
 * Class Service
 * @package Nexo\Entities
 */
class Service extends NexoModel implements Transformable
{
    use TransformableTrait, SoftDeletes, RevisionableTrait, Eloquence, Mutable;

    /**
     * @var array
     */
    protected $fillable = [
        'observations',
        'code',
        'verification_code',
        'city_id',
        'customer_address_id',
        'latitude',
        'longitude',
        'team_id',
        'service_status_id',
        'service_type_id',
        'created_by',
        'customer_id',
        'start_at',
        'end_at',
        'map',
        'duration',
        'date_type',
        'user_id',
        'assignment_type',
        'rating',
        'recurrence_frequency',
        'recurrence_interval',
        'recurrence_start',
        'recurrence_end',
        'recurrence_weekdays',
        'recurrence_monthday',
        'with_services',
        'with_products',
        'address',
        'address_city',
        'address_place_id',
        'address_state',
        'address_district',
        'address_vicinity',
        'address_observations',
    ];

    /**
     * @var array
     */
    protected $dates = ['start_at', 'end_at'];

    protected $casts = [
        'with_services' => 'boolean',
        'with_products' => 'boolean',
    ];

    protected $setterMutators = [
        'recurrence_weekdays' => 'implode_by_comma'
    ];


    protected $getterMutators = [
        'recurrence_weekdays' => 'explode_by_comma'
    ];

    /**
     * @return mixed
     */
    public function getNameAttribute()
    {
        return $this->code;
    }

    /**
     * @return bool
     */
    public function getIsExpiredAttribute()
    {
        $this->checkStatus();

        return $this->status->slug == 'vencido';
    }

    public function getDateTypeNameAttribute()
    {
        $dateTypes = collect(config('nexo.assignmentsOptions.dates'));
        $dateType = $dateTypes->where('value', $this->date_type)->first();

        if (empty($dateType)) {
            return $this->date_type;
        }


        return $dateType['name'];
    }

    public function getAssignmentTypeNameAttribute()
    {
        $types = collect(config('nexo.assignmentsOptions.types'));
        $type = $types->where('value', $this->assignment_type)->first();

        if (empty($type)) {
            return $this->assignment_type;
        }

        return $type['name'];
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(ServiceStatus::class, 'service_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(\Nexo\Entities\ServiceType::class, 'service_type_id')->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(LocationCity::class, 'city_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(\Nexo\Entities\Customer::class, 'customer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customerAddress()
    {
        return $this->belongsTo(CustomerAddress::class, 'customer_address_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(ServiceItem::class, 'service_item');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function extra()
    {
        return $this->hasMany(ServiceExtra::class, 'service_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(\Nexo\Entities\Team::class, 'team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(\Nexo\Entities\User::class, 'created_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function assignments()
    {
        return $this->hasMany(ServiceAssignment::class, 'service_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'service_user')->withPivot(['created_at', 'accepted']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\Nexo\Entities\User::class, 'user_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notificable');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function routes()
    {
        return $this->hasMany(Route::class, 'service_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locations()
    {
        return $this->hasMany(ServiceLocation::class, 'service_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function timelines()
    {
        return $this->hasMany(ServiceTimeline::class, 'service_id');
    }

    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function products()
    {
        return $this->hasMany(ServiceProduct::class, 'service_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function novelties()
    {
        return $this->hasMany(ServiceNovelty::class, 'service_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function types()
    {
        return $this->belongsToMany(ServiceType::class, 'service_type', 'service_id', 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(ServiceType::class, 'service_type', 'service_id', 'type_id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recurrenceDates()
    {
        return $this->hasMany(ServiceRecurrenceDate::class, 'service_id');
    }

    /**
     * @param $idOrCode
     * @param bool|false $forceAsId
     * @return mixed
     */
    public static function findByIdOrCode($idOrCode, $forceAsId = false)
    {
        if ($forceAsId or is_numeric($idOrCode)) {
            $model = parent::find($idOrCode);
        } else {
            $model = parent::where('code', $idOrCode)->first();
        }

        if (empty($model)) {
            if ($forceAsId) {
                throw new ModelNotFoundException;
            } else {
                return self::findByIdOrCode($idOrCode, true);
            }

        }

        return $model;
    }

    /**
     *
     */
    public function checkStatus()
    {
        if (!in_array($this->status->slug, config('nexo.completed_statuses'))) {
            $startAt = $this->start_at;

            $startAt->addDay();
            $startAt->hour = 0;
            $startAt->minute = 0;

            if ($startAt->isPast()) {
                $expiredStatus = ServiceStatus::where('slug', config('nexo.expired_status'))->first();

                if (!empty($expiredStatus)) {
                    $this->service_status_id = $expiredStatus->id;

                    $this->save();

                    event(new ServiceWasExpired($this));
                }
            }
        }
    }


    public function updateMap($force = false)
    {

        $exists = !empty($this->map) && file_exists(storage_path('app/' . $this->map));


        if (!$exists || $force) {
            $map = "https://maps.googleapis.com/maps/api/staticmap?center={$this->latitude},{$this->longitude}&size=800x800&zoom=16&markers=color:red|{$this->latitude},{$this->longitude}";

            $mapFilename = sprintf('maps/%s-%s.jpg', md5($map), str_random(8));
            \Storage::makeDirectory('maps');
            $path = storage_path('app/' . $mapFilename);
            \Image::make($map)->save($path);
            $this->map = $mapFilename;

            $this->save();
        }

        return $this->map;
    }
}
