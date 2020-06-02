<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ServiceTypeField
 * @package Nexo\Entities
 */
class ServiceTypeField extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'services_types_fields';

    /**
     * @var array
     */
    protected $fillable = [
        'service_type_id',
        'type',
        'name',
        'description',
        'is_required',
        'order',
    ];

    protected $casts = [
        'is_required' => 'boolean'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class, 'service_type_id');
    }

}
