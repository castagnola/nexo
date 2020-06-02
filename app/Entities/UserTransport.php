<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class UserTransport
 * @package Nexo\Entities
 */
class UserTransport extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * @var string
     */
    protected $table = 'users_transports';

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'transport_id',
        'name',
        'observations',
        'max_capacity',
        'max_speed',
        'is_own',
        'max_passengers',
        'license_plate',
        'city',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }
}
