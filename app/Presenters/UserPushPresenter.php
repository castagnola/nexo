<?php

namespace Nexo\Presenters;

use Nexo\Transformers\UserPushTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserPushPresenter
 *
 * @package namespace Nexo\Presenters;
 */
class UserPushPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new UserPushTransformer();
    }
}
