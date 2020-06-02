<?php

namespace Nexo\Entities;

use Hashids;
use Illuminate\Database\Eloquent\Model;

class NexoModel extends Model
{
    public function getHashIdAttribute()
    {
        return Hashids::encode($this->id);
    }
}