<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class LocationState extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'locations_states';

    protected $fillable = [
        'code',
        'name',
        'latitude',
        'longitude',
    ];
}
