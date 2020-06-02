<?php namespace Nexo\EntitiesPresenters;

use Pingpong\Presenters\Presenter;

class UserContactDataPresenter extends Presenter
{
    public function getType()
    {
        $types = collect(config('nexo.contactTypes', []));
        return $types->where('slug', $this->type)->first();
    }
}