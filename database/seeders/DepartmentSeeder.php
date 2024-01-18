<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
                'name' => '総務部',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('departments')->insert([
                'name' => '開発部',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
