<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class WorkingStyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('working_styles')->insert([
                'name' => 'リモート',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('working_styles')->insert([
                'name' => '出社',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('working_styles')->insert([
                'name' => '出張',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
