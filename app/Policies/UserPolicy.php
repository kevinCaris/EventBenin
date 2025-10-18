<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct() {}

    public function viewAny(User $user): bool
    {

        return $user->isAdmin();
    }
    public function view(User $authUser, User $user): bool
    {
        return $authUser->isAdmin() || $user->isOwner() && $user->id == $authUser->id || $authUser->isClient() && $user->id == $authUser->id;
    }
    public function create(User $authUser): bool
    {
        return $authUser->isAdmin();
    }
    public function update(User $authUser, User $user): bool
    {
        return ($authUser->isAdmin() && $authUser->id != $user->id) || $authUser->id == $user->id || $user->isOwner() && $user->id == $authUser->id || $authUser->isClient() && $user->id == $authUser->id;
    }

    public function delete(User $authUser, User $user): bool
    {
        return ($authUser->isAdmin() && $authUser->id != $user->id) || $user->isOwner() && $user->id == $authUser->id;
    }

    public function restore(User $authUser, User $user): bool
    {
        return $authUser->isAdmin();
    }

    public function forceDelete(User $authUser, User $user): bool
    {
        return $authUser->isAdmin();
    }
}
