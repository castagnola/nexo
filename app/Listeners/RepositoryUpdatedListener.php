<?php

namespace Nexo\Listeners;

use Prettus\Repository\Events\RepositoryEntityUpdated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RepositoryUpdatedListener
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
     *
     */
    public function handle(RepositoryEntityUpdated $event)
    {
        $model = $event->getModel();
        $modelName = get_class($model);
    }
}
