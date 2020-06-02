<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\Notification;

/**
 * Class NotificationTransformer
 * @package namespace Nexo\Transformers;
 */
class NotificationTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['creator'];

    /**
     * Transform the \Notification entity
     * @param \Notification $model
     *
     * @return array
     */
    public function transform(Notification $model)
    {

        $message = null;
        $url = null;

        if (!empty($model->notificable)) {

            switch ($model->type) {
                case 'service-accepted':
                    $message = sprintf('Servicio #%s aceptado.', $model->notificable->code);
                    $url = url('services/' . $model->notificable->id);
                    break;

                case 'service-declined':
                    $message = sprintf('Servicio #%s declinado.', $model->notificable->code);
                    $url = url('services/' . $model->notificable->id);
                    break;
            }

        }


        return [
            'id' => (int)$model->id,

            /* place your other model properties here */
            'message' => $message,
            'url' => $url,
            'readed' => (bool)$model->readed,
            'created_at' => $model->created_at
        ];
    }

    public function includeCreator(Notification $model)
    {
        return $this->item($model->creator, new UserTransformer());
    }
}