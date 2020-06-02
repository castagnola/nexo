<?php

namespace Nexo\Entities;

use Cartalyst\Sentinel\Roles\EloquentRole;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Role extends EloquentRole implements Transformable
{
    use TransformableTrait;

    protected $casts = [
        'for_team' => 'boolean',
        'need_transport' => 'boolean'
    ];
}
