<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OvertimeSeeder extends Seeder
{
    public function run()
    {
        DB::table('overtimes')->insert([
            [
                'id' => 'overtime-id-1',
                'employee_id' => 'unique-id-1',
                'date' => '2023-02-15',
                'overtime_hours' => 2.5,
                'reason' => 'Project Deadline',
            ],
            [
                'id' => 'overtime-id-2',
                'employee_id' => 'unique-id-2',
                'date' => '2023-02-20',
                'overtime_hours' => 3.0,
                'reason' => 'System Upgrade',
            ],
        ]);
    }
}
