<?php

namespace Nexo\Listeners;

use Illuminate\Contracts\Mail\Mailer;
use Activation;


class UserEventListener
{
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle user login events.
     */
    public function onCustomerRegister($user)
    {
        $activation = Activation::exists($user);

        if (empty($activation)) {
            $activation = Activation::create($user);
        }

        $data = [
            'email' => $user->email,
            'name' => $user->name,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'url' => url("auth/activate/{$user->id}/{$activation->code}")
        ];

        $this->mailer->send('emails.new-customer', $data, function ($m) use ($data) {
            $m->from('no-reply@nexologistica.com', 'Nexo Logística');
            $m->to($data['email'], $data['name'])->subject('¡Bienvenido a Nexo!');
        });
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event)
    {
    }

    /**
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'customers.registered',
            'Nexo\Listeners\UserEventListener@onCustomerRegister'
        );
    }

}