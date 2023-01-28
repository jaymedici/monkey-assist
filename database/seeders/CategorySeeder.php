<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('categories')->count() > 0) 
        {
            DB::table('categories')->delete();
        }

        $categories = [
            ['name' => 'Hardware','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Software','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Network','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Security','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Account Access','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Data Recovery','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Mobile Device Support','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Website Support','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Email Support','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Cloud Services','created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
