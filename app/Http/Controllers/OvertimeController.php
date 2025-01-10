<?php

namespace App\Http\Controllers;

use App\Models\Overtime;
use Inertia\Inertia;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    public function index()
    {
        $overtimes = Overtime::with('employee')->get();
        return Inertia::render('Overtimes/Index', ['overtimes' => $overtimes]);
    }

    public function create()
    {
        return Inertia::render('Overtimes/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'overtime_hours' => 'required|numeric|min:1',
            'overtime_rate' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Overtime::create($validated);
        return redirect()->route('overtimes.index')->with('success', 'Overtime record created successfully.');
    }

    public function show(Overtime $overtime)
    {
        return Inertia::render('Overtimes/Show', ['overtime' => $overtime]);
    }

    public function edit(Overtime $overtime)
    {
        return Inertia::render('Overtimes/Edit', ['overtime' => $overtime]);
    }

    public function update(Request $request, Overtime $overtime)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'overtime_hours' => 'required|numeric|min:1',
            'overtime_rate' => 'required|numeric',
            'date' => 'required|date',
        ]);

        $overtime->update($validated);
        return redirect()->route('overtimes.index')->with('success', 'Overtime record updated successfully.');
    }

    public function destroy(Overtime $overtime)
    {
        $overtime->delete();
        return redirect()->route('overtimes.index')->with('success', 'Overtime record deleted successfully.');
    }
}
