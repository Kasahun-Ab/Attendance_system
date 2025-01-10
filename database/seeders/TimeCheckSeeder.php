<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeCheckSeeder extends Seeder
{
    public function run()
    {
        DB::table('timechecks')->insert([
            [
                'id' => 'timecheck-id-1',
                'monrning_start_time' => '08:00:00',
                'afternon_start_time' => '14:00:00',
            ],
        ]);
    }
}
