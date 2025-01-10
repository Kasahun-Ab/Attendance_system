<?php

namespace Database\Seeders;

use App\Models\Leave;
use Illuminate\Database\Seeder;

class LeavesTableSeeder extends Seeder
{
    public function run()
    {
        Leave::create([
            'id' => 'unique-id-1',
            'employee_id' => 'unique-id-1',
            'leave_type' => 'Sick',
            'start_date' => '2025-01-15',
            'end_date' => '2025-01-17',
            'status' => 'Approved',
        ]);
    }
}
