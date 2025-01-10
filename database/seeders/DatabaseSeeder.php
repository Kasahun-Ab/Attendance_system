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
            // EmployeeSeeder::class,
            ShiftSeeder::class,
            LeaveSeeder::class,
            HolidaySeeder::class,
            OvertimeSeeder::class,
            TimeCheckSeeder::class,
            DaySeeder::class,
            AttendanceSeeder::class,
        ]);
    }
}
