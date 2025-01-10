<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShiftSeeder extends Seeder
{
    public function run()
    {
        DB::table('shifts')->insert([
            [
                'id' => 'shift-id-1',
                'shift_name' => 'Morning Shift',
                'shift_start' => '08:00:00',
                'shift_type' => 'Morning',
            ],
            [
                'id' => 'shift-id-2',
                'shift_name' => 'Afternoon Shift',
                'shift_start' => '14:00:00',
                'shift_type' => 'Afternoon',
            ],
        ]);
        
    }
}
