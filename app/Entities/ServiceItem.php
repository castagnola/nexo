<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ServiceItem extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected $table = 'services_items';

    protected $fillable = [
        'service_type_id',
        'name',
        'description'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(\Nexo\Entities\ServiceType::class, 'service_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(\Nexo\Entities\Service::class, 'service_item');
    }
}
