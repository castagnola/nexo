<?php

namespace Nexo\Presenters;

use Nexo\Transformers\CustomerPhoneTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CustomerContactDataPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class CustomerPhonePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CustomerPhoneTransformer();
    }
}
