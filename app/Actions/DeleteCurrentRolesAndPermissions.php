<?php

namespace App\Actions;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class DeleteCurrentRolesAndPermissions 
{
    protected $currentRoles;
    protected $currentPermissions;

    public function __construct()
    {
        $this->currentRoles = Role::all();
        $this->currentPermissions = Permission::all();
    }

    public function delete()
    {
        if ($this->noRolesAndPermissionsExist())
        {
            return;
        }

        $this->revokeRolePermissions();
        $this->deleteCurrentRoles();
        $this->deleteCurrentPermissions();
        $this->resetIdAutoIncrements();
    }

    protected function noRolesAndPermissionsExist(): bool
    {
        if (! count($this->currentRoles) && 
            ! count($this->currentPermissions))
        {
            return true;
        }

        return false;
    }

    protected function revokeRolePermissions(): void
    {
        foreach ($this->currentRoles as $role)
        {
            $rolePermissions = $role->permissions();

            foreach ($rolePermissions as $permission)
            {
                $role->revokePermissionTo($permission);
            }
        }
    }

    protected function deleteCurrentRoles(): void
    {
        foreach ($this->currentRoles as $role)
        {
            $role->delete();
        }
    }

    protected function deleteCurrentPermissions(): void
    {
        foreach ($this->currentPermissions as $permission)
        {
            $permission->delete();
        }
    }

    protected function resetIdAutoIncrements()
    {
        DB::statement('ALTER TABLE roles AUTO_INCREMENT= 1;');
        DB::statement('ALTER TABLE permissions AUTO_INCREMENT= 1;');
    }
}