<?php

namespace Nexo\Presenters;

use Nexo\Transformers\TeamTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TeamPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class TeamPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TeamTransformer();
    }
}
