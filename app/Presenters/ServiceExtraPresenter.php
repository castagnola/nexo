<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ServiceExtraTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServiceExtraPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ServiceExtraPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServiceExtraTransformer();
    }
}
