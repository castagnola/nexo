<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\ServiceTypeField;

/**
 * Class ServiceTypeFieldTransformer
 * @package namespace Nexo\Transformers;
 */
class ServiceTypeFieldTransformer extends TransformerAbstract
{

    /**
     * Transform the \ServiceTypeField entity
     * @param \ServiceTypeField $model
     *
     * @return array
     */
    public function transform(ServiceTypeField $model)
    {
        return [
            'id' => (int)$model->id,
            'service_type_id' => (int)$model->service_type_id,


            'name' => $model->name,
            'description' => $model->description,
            'type' => $model->type,
            'is_required' => $model->is_required,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
