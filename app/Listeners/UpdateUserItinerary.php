<?php

namespace Nexo\Listeners;

use Illuminate\Contracts\Mail\Mailer;
use Activation;
use Nexo\Events\UserWasUpdateItinerary;


class UpdateUserItinerary
{
    public function __construct()
    {

    }

    /**
     * Handle user login events.
     */
    public function handle(UserWasUpdateItinerary $event)
    {
        $event->model->getDayItinerary(true);
    }

}