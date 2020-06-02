<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ToolTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ToolPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ToolPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ToolTransformer();
    }
}
