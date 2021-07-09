<?php

namespace App\Policies;

use App\User;
use App\Models\Superadmin;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Admin;

class AdminPolicy
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

    public function update(Superadmin $superadmin,Admin $admin)
    {
    	return $superadmin->ownsAdmin($admin);
    }

    public function delete(Superadmin $superadmin,Admin $admin)
    {
    	return $superadmin->ownsAdmin($admin);
    }
}
