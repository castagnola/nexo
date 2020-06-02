<?php

namespace Nexo\Presenters;

use Nexo\Transformers\CustomerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CustomerPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class CustomerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CustomerTransformer();
    }
}
