<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Poll extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'team_id',
        'is_active'
    ];



    public function questions()
    {
        return $this->hasMany(\Nexo\Entities\PollQuestion::class, 'poll_id');
    }

    public function answers()
    {
        return $this->hasMany(\Nexo\Entities\PollAnswer::class, 'poll_id');
    }
}
