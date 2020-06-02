<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ServiceAssignment extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = 'services_assignments';

    protected $fillable = [
        'service_id',
        'user_id',
        'start_at',
        'end_at',
        'accepted',
        'accepted_at',
        'declined',
        'declined_at'
    ];

    protected $dates = ['start_at', 'end_at', 'accepted_at', 'declined_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(\Nexo\Entities\Service::class, 'service_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\Nexo\Entities\User::class);
    }
}
