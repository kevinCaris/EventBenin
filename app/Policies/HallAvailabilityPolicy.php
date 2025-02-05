<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\HallAvailability;
use App\Models\User;

class HallAvailabilityPolicy
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
    public function view(User $user, HallAvailability $hallAvailability): bool
    {
        return $user->isAdmin() || $user->isOwner() && $user->company_id === $hallAvailability->hall->company_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin() || $user->isOwner();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, HallAvailability $hallAvailability): bool
    {
        return $user->isAdmin() || $user->isOwner() && $user->company_id === $hallAvailability->hall->company_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, HallAvailability $hallAvailability): bool
    {
        return $user->isAdmin() || $user->isOwner() && $user->company_id === $hallAvailability->hall->company_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, HallAvailability $hallAvailability): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, HallAvailability $hallAvailability): bool
    {
        //
    }
}
