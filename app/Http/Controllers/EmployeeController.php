<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Inertia\Inertia;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    public function index()
    {
        return Inertia::render('Employee');
        // $employees = Employee::all();
        // return Inertia::render('Employees/Index', [
        //     'employees' => $employees,
        // ]);
    }

    // Show the form to create a new employee
    public function create()
    {
        return Inertia::render('Employee');
    }


   
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:employees,email',
            'phone_number' => 'nullable|string|max:20',
            'hire_date' => 'required|date',
            'department' => 'nullable|string|max:36',
            'is_active' => 'nullable|boolean',
        ]);

        Employee::create($validated);
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    // Show a single employee
    public function show(Employee $employee)
    {
        return Inertia::render('Employees/Show', [
            'employee' => $employee,
        ]);
    }

    // Show the form to edit an existing employee
    public function edit(Employee $employee)
    {
        return Inertia::render('Employees/Edit', [
            'employee' => $employee,
        ]);
    }

    // Update an existing employee
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:employees,email,' . $employee->id,
            'phone_number' => 'nullable|string|max:20',
            'hire_date' => 'required|date',
            'department' => 'nullable|string|max:36',
            'is_active' => 'nullable|boolean',
        ]);

        $employee->update($validated);
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    // Delete an employee
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
    //this id my new  github
}
