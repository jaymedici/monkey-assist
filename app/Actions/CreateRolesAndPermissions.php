<?php

namespace App\Actions;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRolesAndPermissions
{
    protected $roles;
    protected $permissions;

    public function __construct()
    {
        $this->roles = config('userroles.roles');
        $this->permissions = config('userroles.permissions');
    }
    
    public function create()
    {
        $this->createNewRoles();
        $this->createNewPermissions();
        $this->assignNewRolesToPermissions();
    }

    protected function createNewRoles(): void
    {
        foreach ($this->roles as $roleName)
        {
            Role::create(['name' => $roleName]); 
        }
    }

    protected function createNewPermissions(): void
    {
        foreach ($this->permissions as $permissionName)
        {
            Permission::create(['name' => $permissionName]);
        }
    }

    protected function assignNewRolesToPermissions(): void
    {
        foreach ($this->roles as $roleName)
        {
            $role = Role::findByName($roleName);
            $role->syncPermissions(config('userroles.' . $roleName));
        }
    }

}