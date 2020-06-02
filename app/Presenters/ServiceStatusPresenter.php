<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ServiceStatusTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServiceStatusPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ServiceStatusPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServiceStatusTransformer();
    }
}
