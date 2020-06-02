<?php namespace Nexo\EntitiesPresenters;

use Pingpong\Presenters\Presenter;

/**
 * Class TeamPresenter
 * @package Nexo\EntitiesPresenters
 */
class TeamPresenter extends Presenter
{
    /**
     * @param string $filter
     * @return string
     */
    public function logoUrl($filter = 'original')
    {
        $logo = $this->logo ? $this->logo : 'nexo-logo.png';
        return url("images/{$filter}/{$logo}");
    }

    /**
     * @return string
     */
    public function url()
    {
        return route("team", $this->slug);
    }
}