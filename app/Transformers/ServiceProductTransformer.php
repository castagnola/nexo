<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\ServiceProduct;

/**
 * Class ServiceProductTransformer
 * @package namespace Nexo\Transformers;
 */
class ServiceProductTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['product'];

    /**
     * Transform the \ServiceProduct entity
     * @param \ServiceProduct $model
     *
     * @return array
     */
    public function transform(ServiceProduct $model)
    {



        return [
            'id' => \Hashids::encode($model->product_id),
            'quantity' => $model->quantity,
            'product_id' => $model->product_id,
            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeProduct(ServiceProduct $model)
    {

        $product = $model->product;
        $product->change_name = true;


        return $this->item($model->product, new ProductTransformer());
    }
}
