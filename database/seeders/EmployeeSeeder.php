<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'johndoe@example.com',
                'phone_number' => '1234567890',
                'hire_date' => '2023-01-01',
                'department' => 'IT',
                'is_active' => true,
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'janesmith@example.com',
                'phone_number' => '0987654321',
                'hire_date' => '2023-02-01',
                'department' => 'HR',
                'is_active' => false,
            ],
        ]);
    }
}
