<?php

namespace Nexo\Presenters;

use Nexo\Transformers\UserTransportTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserTransportPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class UserTransportPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserTransportTransformer();
    }
}
