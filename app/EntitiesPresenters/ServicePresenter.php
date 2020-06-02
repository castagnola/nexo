<?php namespace Nexo\EntitiesPresenters;

use Pingpong\Presenters\Presenter;

class ServicePresenter extends Presenter
{
    public function mapUrl($filter = 'original')
    {
        if($this->map){
            return route("imagecache", [$filter, $this->map]);
        }

        return  "https://maps.googleapis.com/maps/api/staticmap?center={$this->latitude},{$this->longitude}&size=600x600&zoom=16&markers=color:red|{$this->latitude},{$this->latitude}";
    }
}