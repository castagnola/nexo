<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ServiceLocationTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServiceLocationPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ServiceLocationPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServiceLocationTransformer();
    }
}
