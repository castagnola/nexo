<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserDevice extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'users_devices';

    protected $fillable = [
        'user_id',
        'uuid',
        'platform',
        'manufacturer',
        'token',
        'version',
        'logged'
    ];

}
