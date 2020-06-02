<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Nexo\Entities\User;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class UserRoute
 * @package Nexo\Entities
 */
class Route extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * @var string
     */
    protected $table = 'routes';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'route',
        'service_id',
        'eta',
        'distance',
        'next_query',
        'from_latitude',
        'from_longitude',
        'arrival_date'
    ];


    protected $dates = ['next_query'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }


}
