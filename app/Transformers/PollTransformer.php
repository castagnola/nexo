<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\Poll;

/**
 * Class PollTransformer
 * @package namespace Nexo\Transformers;
 */
class PollTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['questions','answers'];

    protected $availableIncludes = ['questions','answers'];

    /**
     * Transform the \Poll entity
     * @param \Poll $model
     *
     * @return array
     */
    public function transform(Poll $model)
    {
        return [
            'id' => (int)$model->id,
            'questions_counter' => $model->questions->count(),
            'name' => $model->name,
            'description' => $model->description,
            'is_active' => (bool)$model->is_active,
            'is_active_text' => (bool)$model->is_active ? 'Activo' : 'Inactivo',
            'is_active_slug' => (bool)$model->is_active ? 'activo' : 'inactivo',
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }


    public function includeQuestions(Poll $model)
    {
        return $this->collection($model->questions, new PollQuestionTransformer());
    }

    public function includeAnswers(Poll $model)
    {
        return $this->collection($model->answers, new PollAnswerTransformer());
    }


}