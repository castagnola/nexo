<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


/**
 * Class ServiceType
 * @package Nexo\Entities
 */
class ServiceType extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'services_types';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'avg_response_time',
        'team_id'
    ];

    public function getResponseTimeAttribute()
    {
        $responseTime = $this->avg_response_time;
        $minutes = 0;

        if (empty($responseTime) or $responseTime == '00:00') {
            return false;
        }

        $str_time = $this->avg_response_time;

        sscanf($str_time, "%d:%d", $hours, $minutes);

        $inSeconds = $hours * 3600 + $minutes * 60;
        $inMinutes = $inSeconds / 60;

        return [
            'seconds' => $inSeconds,
            'minutes' => $inMinutes
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tools()
    {
        return $this->belongsToMany(\Nexo\Entities\Tool::class,'tools_services_types', 'service_type_id', 'tool_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function services()
    {
        return $this->hasMany(\Nexo\Entities\Service::class, 'service_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(\Nexo\Entities\ServiceItem::class, 'service_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields()
    {
        return $this->hasMany(ServiceTypeField::class, 'service_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(\Nexo\Entities\Team::class, 'team_id');
    }

}
