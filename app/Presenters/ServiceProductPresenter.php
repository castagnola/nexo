<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ServiceProductTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServiceProductPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ServiceProductPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServiceProductTransformer();
    }
}
