<?php

namespace Nexo\Presenters;

use Nexo\Transformers\LocationCityTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LocationCityPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class LocationCityPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LocationCityTransformer();
    }
}
