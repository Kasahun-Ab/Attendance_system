<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Seeder;

class AttendanceTableSeeder extends Seeder
{
    public function run()
    {
        Attendance::create([
            'id' => 'unique-id-1',
            'employee_id' => 'unique-id-1', // Reference to Employee ID
            'shift_id' => 'unique-id-1', // Reference to Shift ID
            'day_id' => 'unique-id-1', // Reference to Day ID
            'clock_in' => '08:00:00',
            'status' => 'Present',
        ]);
    }
}
