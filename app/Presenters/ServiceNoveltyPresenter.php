<?php

namespace Nexo\Presenters;

use Nexo\Transformers\ServiceNoveltyTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ServiceNoveltyPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class ServiceNoveltyPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ServiceNoveltyTransformer();
    }
}
