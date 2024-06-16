<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AccessPolicy
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

    public function access(User $user)
    {
        return $user->roles_id == 1
            ? Response::allow()
            : Response::deny('You must assigned as Super Admin');
    }

    public function userAccess(User $user)
    {
        return $user->roles_id == 2
            ? Response::allow()
            : Response::deny('You must assigned as Tenant');
    }
}
