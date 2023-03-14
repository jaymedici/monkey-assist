<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'info@test.com',
            'password' => Hash::make('password'),
        ]);

        $user = DB::table('users')->where('email', 'info@test.com')->first();
        $adminRole = DB::table('roles')->where('name', 'Admin')->first();

        DB::table('model_has_roles')->insert([
            'role_id' => $adminRole->id,
            'model_type' => 'App\Models\User',
            'model_id' => $user->id,
        ]);
    }
}
