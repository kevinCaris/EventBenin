<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Events;
use App\Models\User;

class EventsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isOwner() || $user->isClient();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Events $events): bool
    {
        return $user->isAdmin() || $user->isOwner()|| $user->isClient() && $user->id === $events->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isClient();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Events $events): bool
    {
        return $user->isClient() && $user->id === $events->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Events $events): bool
    {
        return $user->isClient() && $user->id === $events->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Events $events): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Events $events): bool
    {
        //
    }
}
