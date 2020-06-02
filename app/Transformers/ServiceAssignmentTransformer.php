<?php

namespace Nexo\Transformers;

use Carbon\Carbon;
use League\Fractal\TransformerAbstract;
use Nexo\Entities\ServiceAssignment;

/**
 * Class ServiceAssignmentTransformer
 * @package namespace Nexo\Transformers;
 */
class ServiceAssignmentTransformer extends TransformerAbstract
{

    /**
     * @var array
     */
    protected $defaultIncludes = ['team'];
    /**
     * @var array
     */
    protected $availableIncludes = ['service', 'user'];

    /**
     * Transform the \ServiceAssignment entity
     * @param \ServiceAssignment $model
     *
     * @return array
     */
    public function transform(ServiceAssignment $model)
    {
        return [
            'id' => (int)$model->id,

            /* place your other model properties here */
            'name' => $model->service->type->name,
            'user_id' => (int)$model->user_id,
            'service_id' => (int)$model->service_id,
            'pending' => !$model->accepted && !$model->declined,
            'accepted' => (bool)$model->accepted,
            'declined' => (bool)$model->declined,

            'service_status' => $model->service->status->slug,
            'service_start_at' => $model->service->start_at->toDateTimeString(),
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,

            'start' => $model->service->start_at->toDateTimeString(),
            'end' => $model->service->end_at->toDateTimeString(),
            'status' => $model->service->status->slug

        ];
    }

    /**
     * @param ServiceAssignment $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeService(ServiceAssignment $model)
    {
        return $this->item($model->service, new ServiceTransformer());
    }

    /**
     * @param ServiceAssignment $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeUser(ServiceAssignment $model)
    {
        return $this->item($model->user, new UserTransformer());
    }

    /**
     * @param ServiceAssignment $model
     * @return \League\Fractal\Resource\Item
     */
    public function includeTeam(ServiceAssignment $model)
    {
        return $this->item($model->team, new TeamTransformer());
    }
}