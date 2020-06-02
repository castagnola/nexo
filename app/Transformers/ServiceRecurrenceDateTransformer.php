<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\ServiceRecurrenceDate;

/**
 * Class ServiceRecurrenceDateTransformer
 * @package namespace Nexo\Transformers;
 */
class ServiceRecurrenceDateTransformer extends TransformerAbstract
{

    /**
     * Transform the \ServiceRecurrenceDate entity
     * @param \ServiceRecurrenceDate $model
     *
     * @return array
     */
    public function transform(ServiceRecurrenceDate $model)
    {
        return [
            'id'         => (int) $model->id,
            'start' => $model->start->toDateTimeString(),
            'end' => $model->end->toDateTimeString()
        ];
    }
}
