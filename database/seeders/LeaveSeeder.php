<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeaveSeeder extends Seeder
{
    public function run()
    {
        DB::table('leaves')->insert([
            [
                'id' => 'leave-id-1',
                'employee_id' => 'unique-id-1',
                'leave_type' => 'Sick',
                'start_date' => '2023-03-01',
                'end_date' => '2023-03-05',
                'status' => 'Approved',
            ],
            [
                'id' => 'leave-id-2',
                'employee_id' => 'unique-id-2',
                'leave_type' => 'Vacation',
                'start_date' => '2023-06-10',
                'end_date' => '2023-06-15',
                'status' => 'Pending',
            ],
        ]);
    }
}
