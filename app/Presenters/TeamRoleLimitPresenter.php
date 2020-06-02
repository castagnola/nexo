<?php

namespace Nexo\Presenters;

use Nexo\Transformers\TeamRoleLimitTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class TeamRoleLimitPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class TeamRoleLimitPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TeamRoleLimitTransformer();
    }
}
