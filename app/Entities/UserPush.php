<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserPush extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'users_pushes';

    protected $fillable = [
        'user_id',
        'push_id',
        'sent',
        'type',
    ];
}
