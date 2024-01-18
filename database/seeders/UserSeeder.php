<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'department_id' => 2,
            'style_id' => 1,
            'place_id' => 3,
            'name' => '野木住隆',
            'email' => '0gg325311.15f5z@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '080-1111-1111',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
