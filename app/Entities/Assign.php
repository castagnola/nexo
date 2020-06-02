<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Assign extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

}
