<?php

namespace Nexo\Presenters;

use Nexo\Transformers\AssignTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AssignPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class AssignPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AssignTransformer();
    }
}
