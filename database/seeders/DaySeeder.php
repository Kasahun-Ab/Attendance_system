<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaySeeder extends Seeder
{
    public function run()
    {
        DB::table('days')->insert([
            [
                'id' => 'day-id-1',
                'name_day' => 'Mon',
                'date_of_day' => '2023-01-02',
            ],
            [
                'id' => 'day-id-2',
                'name_day' => 'Tue',
                'date_of_day' => '2023-01-03',
            ],
        ]);
    }
}
