<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Validable;
use Sofa\Eloquence\Contracts\CleansAttributes;
use Sofa\Eloquence\Contracts\Validable as ValidableContract;

/**
 * Class Tool
 * @package Nexo\Entities
 */
class Tool extends Model implements Transformable, CleansAttributes
{
    use TransformableTrait, Eloquence,SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'SKU',
        'team_id',
    ];

    protected $searchableColumns = ['name'];

    /**
     * @var array
     */
    protected static $businessRules = [
        'name' => 'required|min:5'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function services()
    {
        return $this->belongsToMany(\Nexo\Entities\ServiceType::class,'tools_services_types', 'tool_id', 'service_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(\Nexo\Entities\Product::class,'tools_products', 'tool_id', 'product_id');
    }
    

}