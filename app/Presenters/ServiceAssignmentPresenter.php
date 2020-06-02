<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ServiceAssignmentTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServiceAssignmentPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ServiceAssignmentPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServiceAssignmentTransformer();
    }
}
