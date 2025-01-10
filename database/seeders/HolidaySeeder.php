<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HolidaySeeder extends Seeder
{
    public function run()
    {
        DB::table('holidays')->insert([
            [
                'id' => 'holiday-id-1',
                'day_id' => 'day-id-1',
                'holiday_name' => 'New Year\'s Day',
                'holiday_date' => '2023-01-01',
            ],
            [
                'id' => 'holiday-id-2',
                'day_id' => 'day-id-2',
                'holiday_name' => 'Independence Day',
                'holiday_date' => '2023-07-04',
            ],
        ]);
    }
}
