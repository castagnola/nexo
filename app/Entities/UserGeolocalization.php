<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use Nexo\Entities\User;

class UserGeolocalization extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'users_geolocalizations';

    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'last_distance'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
