<?php

namespace Nexo\Presenters;

use Nexo\Transformers\UserDeviceTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserDevicePresenter
 *
 * @package namespace Nexo\Presenters;
 */
class UserDevicePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserDeviceTransformer();
    }
}
