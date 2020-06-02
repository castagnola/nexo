<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ProductCategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductCategoryPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ProductCategoryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductCategoryTransformer();
    }
}
