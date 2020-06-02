<?php

namespace Nexo\Presenters;

use Nexo\Transformers\PollOptionTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PollOptionPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class PollOptionPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PollOptionTransformer();
    }
}
