<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\PollAnswerOption;

/**
 * Class PollOptionCustomTransformer
 * @package namespace Nexo\Transformers;
 */
class PollOptionCustomTransformer extends TransformerAbstract
{
    protected $availableIncludes = [];
    /**
     * Transform the \PollAnswerOption entity
     * @param \PollAnswerOption $model
     *
     * @return array
     */
    public function transform(PollAnswerOption $model)
    {
        return [
        'id' => (int)$model->id,
        'poll_question_id' => (int)$model->poll_question_id,
        'question' => $model->question
        ];
    }
}