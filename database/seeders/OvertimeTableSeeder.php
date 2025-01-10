<?php

namespace Database\Seeders;

use App\Models\Overtime;
use Illuminate\Database\Seeder;

class OvertimeTableSeeder extends Seeder
{
    public function run()
    {
        Overtime::create([
            'id' => 'unique-id-1',
            'employee_id' => 'unique-id-1',
            'date' => '2025-01-10',
            'overtime_hours' => 2.5,
            'reason' => 'Project Deadline',
        ]);
    }
}
