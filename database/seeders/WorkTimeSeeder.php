<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_times')->insert([
                'user_id' => 1,
                'working_status' => '出勤',
                'created_at' => now()->subDays(7)->subHours(8),
        ]);
        DB::table('work_times')->insert([
                'user_id' => 1,
                'working_status' => '休憩',
                'created_at' => now()->subDays(7)->subHours(5),
        ]);
        DB::table('work_times')->insert([
                'user_id' => 1,
                'working_status' => '再開',
                'created_at' => now()->subDays(7)->subHours(4),
        ]);
        DB::table('work_times')->insert([
                'user_id' => 1,
                'working_status' => '退勤',
                'created_at' => now()->subDays(7),
        ]);
    }
}
