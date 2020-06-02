<?php

namespace Nexo\Presenters;

use Nexo\Transformers\LocationStateTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LocationStatePresenter
 *
 * @package namespace Nexo\Presenters;
 */
class LocationStatePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LocationStateTransformer();
    }
}
