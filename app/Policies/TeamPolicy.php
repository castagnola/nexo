<?php

namespace Nexo\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Nexo\Entities\Team;
use Nexo\Entities\User;

class TeamPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function before($user, $ability)
    {
        if ($user->hasRole('admin')) {
            return true;
        }
    }

    public function canEdit(User $user, Team $team)
    {
        return $user->hasAccess('teams.edit');
    }
}
