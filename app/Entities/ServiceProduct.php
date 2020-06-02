<?php

namespace Nexo\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ServiceProduct extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'services_products';

    protected $fillable = [
        'product_id',
        'service_id',
        'quantity',
    ];

    protected $casts = [
        'quantity' => 'int'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
