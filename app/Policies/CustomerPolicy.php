<?php

namespace Nexo\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Nexo\Entities\Customer;
use Nexo\Entities\User;

class CustomerPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function destroy(User $user, Customer $customer)
    {
        return $user->hasAccess('customers.delete');
    }
}
