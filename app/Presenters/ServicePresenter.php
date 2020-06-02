<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ServiceTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServicePresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ServicePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServiceTransformer();
    }
}
