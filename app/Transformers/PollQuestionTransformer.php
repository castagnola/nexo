<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\PollQuestion;

/**
 * Class PollQuestionTransformer
 * @package namespace Nexo\Transformers;
 */
class PollQuestionTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['options'];

    /**
     * Transform the \PollQuestion entity
     * @param \PollQuestion $model
     *
     * @return array
     */
    public function transform(PollQuestion $model)
    {
        return [
            'id' => (int)$model->id,
            'poll_id' => (int)$model->poll_id,

            /* place your other model properties here */
            'question' => $model->question,
            'type' => $model->type,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeOptions(PollQuestion $model)
    {
        return $this->collection($model->options, new PollOptionTransformer());
    }
}