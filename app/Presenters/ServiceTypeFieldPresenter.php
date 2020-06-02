<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ServiceTypeFieldTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServiceTypeFieldPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ServiceTypeFieldPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServiceTypeFieldTransformer();
    }
}
