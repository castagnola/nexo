<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\ServiceNovelty;

/**
 * Class ServiceNoveltyTransformer
 * @package namespace Nexo\Transformers;
 */
class ServiceNoveltyTransformer extends TransformerAbstract
{

    /**
     * Transform the \ServiceNovelty entity
     * @param \ServiceNovelty $model
     *
     * @return array
     */
    public function transform(ServiceNovelty $model)
    {
        return [
            'id' => (int)$model->id,
            'service_id' => (int)$model->service_id,

            /* place your other model properties here */
            //'observation' => $model->observation_id,
            'observation' => $model->observation,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}