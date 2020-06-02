<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\Customer;
use Nexo\Entities\PollAnswer;
use Nexo\Entities\PollAnswerOption;

/**
 * Class PollAnwserTransformer
 * @package namespace Nexo\Transformers;
 */
class PollAnswerTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['options'];

    /**
     * @var array
     */
    protected $availableIncludes = ['customer', 'poll'];

    /**
     * Transform the \PollAnwser entity
     * @param \PollAnwser $model
     *
     * @return array
     */
    public function transform(PollAnswer $model)
    {
        return [
            'id' => (int)$model->id,
            'rating' => rand(1, 5), // TODO: Cambiar por el dato real
            'customer_id' => $model->customer_id,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    /**
     * @param PollAnswer $model
     * @return \League\Fractal\Resource\Collection
     */
    public function includeOptions(PollAnswer $model)
    {
        return $this->collection($model->options, new PollAnswerOptionTransformer());
    }

    /**
     * @param PollAnswer $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeCustomer(PollAnswer $model)
    {
        return $this->item($model->customer, new CustomerTransformer());
    }

    public function includePoll(PollAnswer $model)
    {
        return $this->item($model->poll, new PollTransformer());
    }
}