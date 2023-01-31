<?php

namespace App\Traits;

use App\Actions\CreateRolesAndPermissions;
use App\Actions\DeleteCurrentRolesAndPermissions;

trait CanGenerateRolesAndPermissions
{
    public function generateRolesAndPermissions()
    {
        $currentRoles = new DeleteCurrentRolesAndPermissions();
        $currentRoles->delete();

        $newRoles = new CreateRolesAndPermissions();
        $newRoles->create();
    }
}