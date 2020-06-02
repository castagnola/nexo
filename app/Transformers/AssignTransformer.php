<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\Assign;

/**
 * Class AssignTransformer
 * @package namespace Nexo\Transformers;
 */
class AssignTransformer extends TransformerAbstract
{

    /**
     * Transform the \Assign entity
     * @param \Assign $model
     *
     * @return array
     */
    public function transform(Assign $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
