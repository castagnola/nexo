<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Nexo\Entities\User;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserItinerary extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'users_itineraries';

    protected $fillable = [
        'user_id',
        'itinerary',
        'next_query',
        'total_duration',
        'total_distance',
        'date',
    ];

    protected $dates = ['date','next_query'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
