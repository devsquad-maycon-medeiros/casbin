<?php

namespace App\Models\Concerns;

use Lauthz\Facades\Enforcer;

trait HasRolesAndPermissions
{
    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super-admin');
    }

    public function hasPermission($subject, $permission): bool
    {
        return Enforcer::enforce((string) $this->getAuthIdentifier(), $subject, $permission)
            || $this->isSuperAdmin();
    }

    public function hasRole(string $role): bool
    {
        return in_array($role, Enforcer::getRolesForUser($this->id));
    }
}
