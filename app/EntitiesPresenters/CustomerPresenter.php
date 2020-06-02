<?php namespace Nexo\EntitiesPresenters;

use Pingpong\Presenters\Presenter;

class CustomerPresenter extends Presenter
{
    public function name()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}