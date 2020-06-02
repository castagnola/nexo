<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TeamRoleLimit extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'teams_roles_limits';

    protected $fillable = [
        'team_id',
        'role_id',
        'limit',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
