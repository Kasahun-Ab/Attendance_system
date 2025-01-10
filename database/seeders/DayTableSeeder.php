<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;

class DayTableSeeder extends Seeder
{
    public function run()
    {
        Day::create([
            'id' => 'unique-id-1',
            'name_day' => 'Mon',
            'date_of_day' => '2025-01-05',
        ]);
    }
}
