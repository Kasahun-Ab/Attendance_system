<?php

namespace Database\Seeders;

use App\Models\Holiday;
use Illuminate\Database\Seeder;

class HolidaysTableSeeder extends Seeder
{
    public function run()
    {
        Holiday::create([
            'id' => 'unique-id-1',
            'holiday_name' => 'New Year\'s Day',
            'holiday_date' => '2025-01-01',
        ]);
    }
}
