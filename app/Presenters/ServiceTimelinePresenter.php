<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ServiceTimelineTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServiceTimelinePresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ServiceTimelinePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServiceTimelineTransformer();
    }
}
