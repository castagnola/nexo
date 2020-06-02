<?php

namespace Nexo\Listeners;

use Prettus\Repository\Events\RepositoryEntityUpdated;

class ServiceAccepted
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RepositoryEntityUpdated $event
     * @return void
     */
    public function handle(RepositoryEntityUpdated $event)
    {
        //-
    }
}
