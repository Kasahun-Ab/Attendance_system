<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceSeeder extends Seeder
{
    public function run()
    {
        DB::table('attendance')->insert([
            [
                'id' => 'attendance-id-1',
                'employee_id' => 'unique-id-1',
                'shift_id' => 'shift-id-1',
                'day_id' => 'day-id-1',
                'clock_in' => '08:05:00',
                'status' => 'Present',
            ],
            [
                'id' => 'attendance-id-2',
                'employee_id' => 'unique-id-2',
                'shift_id' => 'shift-id-2',
                'day_id' => 'day-id-2',
                'clock_in' => '14:15:00',
                'status' => 'Late',
            ],
        ]);
    }
}
