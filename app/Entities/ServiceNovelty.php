<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ServiceNovelty extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'services_novelties';

    protected $fillable = [
        'observation',
        'service_id'
    ];
}
