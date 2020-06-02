<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ServiceTypeTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServiceTypePresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ServiceTypePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServiceTypeTransformer();
    }
}
