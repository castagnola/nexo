<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Sofa\Eloquence\Eloquence;

class Module extends Model implements Transformable
{
    use TransformableTrait, Eloquence;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];


    public function teams()
    {
        return $this->belongsToMany(\Nexo\Entities\Team::class, 'module_team');
    }

}
