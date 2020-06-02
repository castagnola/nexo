<?php

namespace Nexo\Presenters;

use Nexo\Transformers\PollTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PollPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class PollPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PollTransformer();
    }
}
