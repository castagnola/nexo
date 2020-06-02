<?php

namespace Nexo\Presenters;

use Nexo\Transformers\LangTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LangPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class LangPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LangTransformer();
    }
}
