<?php

namespace Database\Seeders;

use App\Traits\CanGenerateRolesAndPermissions;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    use CanGenerateRolesAndPermissions;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->generateRolesAndPermissions();
    }
}
