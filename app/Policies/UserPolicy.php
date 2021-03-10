<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    function view(User $user)
    {
        return true;
    }
    function add(User $user)
    {
        return $user->level==1||$user->level==2;
    }
    function edit(User $user)
    {
        return $user->level==1;
    }
    function delete(User $user)
    {
        return $user->level==1;
    }

}
