<?php

namespace Nexo\Presenters;

use Nexo\Transformers\NotificationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class NotificationPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class NotificationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NotificationTransformer();
    }
}
