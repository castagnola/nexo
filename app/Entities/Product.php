<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Validable;
use Sofa\Eloquence\Contracts\CleansAttributes;
use Sofa\Eloquence\Contracts\Validable as ValidableContract;

/**
 * Class Product
 * @package Nexo\Entities
 */
class Product extends Model implements Transformable, CleansAttributes
{
    use TransformableTrait, Eloquence;

    /**
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'weight',
        'weight_unit',
        'height',
        'height_unit',
        'depth',
        'depth_unit',
        'width',
        'width_unit',
        'SKU'
    ];

    protected $searchableColumns = ['name'];

    /**
     * @var array
     */
    protected static $businessRules = [
        'name' => 'required|min:5',
        'category_id' => ['required', 'exists:products_categories,id']
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tools()
    {
        return $this->belongsToMany(\Nexo\Entities\Tool::class,'tools_products', 'product_id', 'tool_id');
    }

}