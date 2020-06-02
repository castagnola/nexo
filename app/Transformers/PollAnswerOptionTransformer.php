<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\PollAnswer;
use Nexo\Entities\PollAnswerOption;

/**
 * Class PollAnwserTransformer
 * @package namespace Nexo\Transformers;
 */
class PollAnswerOptionTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['option'];
    /**
     * Transform the \PollAnwser entity
     * @param \PollAnwser $model
     *
     * @return array
     */
    public function transform(PollAnswerOption $model)
    {
        return [
            'id' => (int)$model->id,

            /* place your other model properties here */
            'answer' => $model->answer,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeOption(PollAnswerOption $model)
    {
        if($model->option){
            return $this->item($model->option, new PollOptionTransformer());    
        }else{
            return $this->item($model, new PollOptionCustomTransformer());    
        }
    }

}