<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ServiceItemTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServiceItemPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ServiceItemPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServiceItemTransformer();
    }
}
