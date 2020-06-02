<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ProductTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ProductPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductTransformer();
    }
}
