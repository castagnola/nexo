<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Sofa\Eloquence\Eloquence;

class LocationCity extends Model implements Transformable
{
    use TransformableTrait, Eloquence;

    protected $table = 'locations_cities';

    protected $searchableColumns = ['name'];


    protected $fillable = [
        'code',
        'name',
        'location_state_id',
        'longitude',
        'latitude',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->name}, {$this->state->name}";
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(LocationState::class, 'location_state_id');
    }

}
