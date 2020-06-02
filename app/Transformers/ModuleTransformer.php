<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\Module;

/**
 * Class ModuleTransformer
 * @package namespace Nexo\Transformers;
 */
class ModuleTransformer extends TransformerAbstract
{

    /**
     * Transform the \Module entity
     * @param \Module $model
     *
     * @return array
     */
    public function transform(Module $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'slug' => $model->slug,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}