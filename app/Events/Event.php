<?php

namespace Nexo\Events;

use Nexo\Entities\User;

abstract class Event
{
    public function defaultBroadcastOn($user = null)
    {
        $channels = [];

        // Administradores nexo
        User::select('id')->whereHas('roles', function ($query) {
            return $query->where('slug', 'admin');
        })->get()->each(function ($user) use (&$channels) {
            $channels[] = "user.{$user->id}";
        });


        if (!empty($user)) {
            // A los miembros del equipo
            $user->teams->each(function ($team) use (&$channels) {
                $team->users->each(function ($user) use (&$channels) {
                    if ($user->inRole('team-admin') || $user->inRole('despachador')) {
                        $channels[] = "user.{$user->id}";
                    }
                });
            });
        }

        return $channels;
    }
}
