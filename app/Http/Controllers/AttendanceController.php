<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Inertia\Inertia;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with(['employee', 'shift', 'day'])->get();
        return Inertia::render('Attendances/Index', ['attendances' => $attendances]);
    }

    public function create()
    {
        return Inertia::render('Attendances/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'shift_id' => 'required|exists:shifts,id',
            'day_id' => 'required|exists:day,id',
            'clock_in' => 'nullable|date_format:H:i',
            'status' => 'nullable|in:Present,Absent,On Leave,Late,Holiday',
        ]);

        Attendance::create($validated);
        return redirect()->route('attendances.index')->with('success', 'Attendance record created successfully.');
    }

    public function show(Attendance $attendance)
    {
        return Inertia::render('Attendances/Show', ['attendance' => $attendance]);
    }

    public function edit(Attendance $attendance)
    {
        return Inertia::render('Attendances/Edit', ['attendance' => $attendance]);
    }

    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'shift_id' => 'required|exists:shifts,id',
            'day_id' => 'required|exists:day,id',
            'clock_in' => 'nullable|date_format:H:i',
            'status' => 'nullable|in:Present,Absent,On Leave,Late,Holiday',
        ]);

        $attendance->update($validated);
        return redirect()->route('attendances.index')->with('success', 'Attendance record updated successfully.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Attendance record deleted successfully.');
    }
}
