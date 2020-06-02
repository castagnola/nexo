<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\PollOption;

/**
 * Class PollOptionTransformer
 * @package namespace Nexo\Transformers;
 */
class PollOptionTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['question'];
    /**
     * Transform the \PollOption entity
     * @param \PollOption $model
     *
     * @return array
     */
    public function transform(PollOption $model)
    {
        
        return [
        'id' => (int)$model->id,
        'poll_question_id' => (int)$model->poll_question_id,

        /* place your other model properties here */
        'option' => $model->option,
        'order' => $model->order,
        'created_at' => $model->created_at,
        'updated_at' => $model->updated_at
        ]; 

        return [];
        
    }

    public function includeQuestion(PollOption $model)
    {
        //dd($model->question);
        return $this->item($model->question, new PollQuestionTransformer());
    }
}