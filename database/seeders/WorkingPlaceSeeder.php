<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class WorkingPlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('working_places')->insert([
                'name' => '東京本社',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('working_places')->insert([
                'name' => '千葉オフィス',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('working_places')->insert([
                'name' => '自宅',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('working_places')->insert([
                'name' => '出張先',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
