<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ServiceRecurrenceDate
 * @package Nexo\Entities
 */
class ServiceRecurrenceDate extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * @var array
     */
    protected $fillable = [
        'service_id',
        'status_id',
        'start',
        'end',
    ];

    /**
     * @var string
     */
    protected $table = 'services_recurrence_dates';

    /**
     * @var array
     */
    protected $dates = [
        'start',
        'end'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(ServiceStatus::class, 'status_id');
    }
}
