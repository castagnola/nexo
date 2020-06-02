<?php

namespace Nexo\Presenters;

use Nexo\Transformers\TransportTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TransportPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class TransportPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TransportTransformer();
    }
}
