<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ServiceRecurrenceDateTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServiceRecurrenceDatePresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ServiceRecurrenceDatePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServiceRecurrenceDateTransformer();
    }
}
