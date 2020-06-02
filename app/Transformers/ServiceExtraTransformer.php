<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\ServiceExtra;

/**
 * Class ServiceExtraTransformer
 * @package namespace Nexo\Transformers;
 */
class ServiceExtraTransformer extends TransformerAbstract
{

    /**
     * Transform the \ServiceExtra entity
     * @param \ServiceExtra $model
     *
     * @return array
     */
    public function transform(ServiceExtra $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
