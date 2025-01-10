<?php

namespace Database\Seeders;

use App\Models\Timecheck;
use Illuminate\Database\Seeder;

class TimecheckTableSeeder extends Seeder
{
    public function run()
    {
        Timecheck::create([
            'id' => 'unique-id-1',
            'monrning_start_time' => '08:00:00',
            'afternon_start_time' => '14:00:00',
        ]);
    }
}
