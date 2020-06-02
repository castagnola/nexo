<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\Lang;

/**
 * Class LangTransformer
 * @package namespace Nexo\Transformers;
 */
class LangTransformer extends TransformerAbstract
{

    /**
     * Transform the \Lang entity
     * @param \Lang $model
     *
     * @return array
     */
    public function transform(Lang $model)
    {
        return [
            'id'         => (int) $model->id,
            'code' => $model->code,
            'name' => $model->name,
            'content' => $model->content,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
