<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;

/**
 * Class UserPushTransformer
 * @package namespace Nexo\Transformers;
 */
class EventTransformer extends TransformerAbstract
{

    /**
     * @param $model
     * @return array
     */
    public function transform($model)
    {
        return [
            'id'         => (int)$model->id,
        ];
    }
}