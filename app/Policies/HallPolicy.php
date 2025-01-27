<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Hall;
use App\Models\User;

class HallPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin() || $user->isOwner();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Hall $hall): bool
    {
        return $user->is_admin || $user->isOwner() && $user->company_id === $hall->company_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_admin || $user->isOwner();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Hall $hall): bool
    {
        return $user->is_admin || $user->isOwner() && $user->company_id === $hall->company_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Hall $hall): bool
    {
        return $user->is_admin || $user->isOwner() && $user->company_id === $hall->company_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Hall $hall): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Hall $hall): bool
    {
        return false;
    }
}
