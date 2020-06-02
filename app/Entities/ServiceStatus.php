<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Nexo\Entities\Service;

class ServiceStatus extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'services_statuses';

    protected $fillable = [
    	'name',
        'slug',
        'color',
    ];

    public function services()
    {
    	return $this->hasMany(Service::class, 'service_status_id');
    }
}
