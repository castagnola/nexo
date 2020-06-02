<?php namespace Nexo\EntitiesPresenters;

use Pingpong\Presenters\Presenter;

class UserPresenter extends Presenter
{
    public function name($filter = 'original')
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function avatarUrl($filter = 'original')
    {
        $avatar = $this->avatar ? $this->avatar : 'nexo-logo.png';
        return route("imagecache", [$filter, $avatar]);
    }
}