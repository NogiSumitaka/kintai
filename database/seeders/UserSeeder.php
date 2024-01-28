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
            'administrator' => true,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('users')->insert([
            'department_id' => 2,
            'style_id' => 1,
            'place_id' => 3,
            'name' => 'guest1太郎',
            'email' => 'guest1@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '080-1111-1111',
            'administrator' => false,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('users')->insert([
            'department_id' => 2,
            'style_id' => 1,
            'place_id' => 3,
            'name' => 'guest2太郎',
            'email' => 'guest2@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '080-1111-1111',
            'administrator' => false,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        
        DB::table('users')->insert([
            'department_id' => 2,
            'style_id' => 1,
            'place_id' => 3,
            'name' => 'guest3太郎',
            'email' => 'guest3@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '080-1111-1111',
            'administrator' => false,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
