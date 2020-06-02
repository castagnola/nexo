<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ModuleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ModulePresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ModulePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ModuleTransformer();
    }
}
