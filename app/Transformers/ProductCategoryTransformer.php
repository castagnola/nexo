<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\ProductCategory;
use Hashids;

/**
 * Class ProductCategoryTransformer
 * @package namespace Nexo\Transformers;
 */
class ProductCategoryTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProductCategory entity
     * @param \ProductCategory $model
     *
     * @return array
     */
    public function transform(ProductCategory $model)
    {
        return [
            'id' => $model->id,

            /* place your other model properties here */
            'name' => $model->name,
            'description' => $model->description,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
