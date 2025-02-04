<?php

namespace App\Traits;

use App\Enums\RoleEnum;

trait HasRole
{
   /**
     * Vérifie si l'utilisateur a un rôle spécifique.
     *
     * @param  string  $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        if ($this->role === null) {
            return false; // L'utilisateur n'a pas de rôle
        }
        return $this->role->value === $role;
    }

    /**
     * Retourne le rôle de l'utilisateur sous forme de chaîne.
     *
     * @return string
     */
    public function getRoleAsString(): string
    {
        return (string) $this->role->value;
    }

    /**
     * Determine if the user is an administrator.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole(RoleEnum::ADMIN->value);
    }

    /**
     * Determine if the user is an owner.
     *
     * @return bool
     */
    public function isOwner(): bool
    {
        return $this->hasRole(RoleEnum::OWNER->value);
    }


    /**
     * Determine if the user is a client.
     *
     * @return bool
     */
    public function isClient(): bool
    {
        return $this->hasRole(RoleEnum::CLIENT->value);
    }
}
