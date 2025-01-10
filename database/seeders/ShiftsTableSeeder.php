<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    public function run()
    {
        Employee::create([
            'id' => 'unique-id-1',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone_number' => '1234567890',
            'hire_date' => '2025-01-01',
            'department' => 'Engineering',
        ]);
        
        Employee::create([
            'id' => 'unique-id-2',
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane.smith@example.com',
            'phone_number' => '0987654321',
            'hire_date' => '2024-06-01',
            'department' => 'Marketing',
        ]);
    }
}
