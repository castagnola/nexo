<?php

namespace Nexo\Presenters;

use Nexo\Transformers\UserGeolocalizationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserGeolocalizationPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class UserGeolocalizationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserGeolocalizationTransformer();
    }
}
