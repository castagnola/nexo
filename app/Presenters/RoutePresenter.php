<?php

namespace Nexo\Presenters;

use Nexo\Transformers\RouteTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserRoutePresenter
 *
 * @package namespace Nexo\Presenters;
 */
class RoutePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RouteTransformer();
    }
}
