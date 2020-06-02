<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Nexo\Entities\User;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Notification extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'notifications';

    protected $fillable = [
        'user_id',
        'created_by',
        'type',
        'notificable_id',
        'notificable_type',
        'readed'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    /**
     * Get all of the posts that are assigned this tag.
     */
    public function notificable()
    {
        return $this->morphTo('notificable');
    }
}
