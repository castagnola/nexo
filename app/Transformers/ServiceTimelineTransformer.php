<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\ServiceTimeline;

/**
 * Class ServiceTimelineTransformer
 * @package namespace Nexo\Transformers;
 */
class ServiceTimelineTransformer extends TransformerAbstract
{

    /**
     * Transform the \ServiceTimeline entity
     * @param \ServiceTimeline $model
     *
     * @return array
     */
    public function transform(ServiceTimeline $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
