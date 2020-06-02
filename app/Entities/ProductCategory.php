<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Validable;

/**
 * Class ProductCategory
 * @package Nexo\Entities
 */
class ProductCategory extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes, Eloquence;

    /**
     * @var string
     */
    protected $table = 'products_categories';

    protected $searchableColumns = [
        'name'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'name',
        'description',
        'team_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_id');
    }
}
