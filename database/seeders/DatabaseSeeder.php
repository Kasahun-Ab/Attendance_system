<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run the factories or direct seeding
        $this->call([
            // UsersTableSeeder::class,
            EmployeesTableSeeder::class,
            ShiftsTableSeeder::class,
            AttendanceTableSeeder::class,
            LeavesTableSeeder::class,
            HolidaysTableSeeder::class,
            OvertimeTableSeeder::class,
            TimecheckTableSeeder::class,
            DayTableSeeder::class,
        ]);
    }
}
