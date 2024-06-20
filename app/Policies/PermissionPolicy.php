<?php

namespace App\Policies;

use App\Models\User;

class PermissionPolicy
{
    public function viewAdmin(User $user)
    {
        return $user->hasPermission('administrator');
    }

    public function viewVoluntary(User $user)
    {
        return $user->hasPermission('voluntary');
    }

    public function viewBeneficiary(User $user)
    {
        return $user->hasPermission('beneficiary');
    }
}
