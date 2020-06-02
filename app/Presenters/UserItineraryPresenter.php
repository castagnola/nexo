<?php

namespace Nexo\Presenters;

use Nexo\Transformers\UserItineraryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserItineraryPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class UserItineraryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserItineraryTransformer();
    }
}
