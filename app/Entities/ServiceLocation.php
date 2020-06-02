<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ServiceLocation extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'services_locations';

    protected $fillable = [
        'service_id',
        'user_id',
        'latitude',
        'longitude',
    ];


    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

}
