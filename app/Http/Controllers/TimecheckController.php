<?php

namespace App\Http\Controllers;

use App\Models\Timecheck;
use Inertia\Inertia;
use Illuminate\Http\Request;

class TimecheckController extends Controller
{
    public function index()
    {
        $timechecks = Timecheck::with(['employee', 'shift'])->get();
        return Inertia::render('Timechecks/Index', ['timechecks' => $timechecks]);
    }

    public function create()
    {
        return Inertia::render('Timechecks/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'shift_id' => 'required|exists:shifts,id',
            'clock_in' => 'nullable|date_format:H:i',
            'clock_out' => 'nullable|date_format:H:i',
        ]);

        Timecheck::create($validated);
        return redirect()->route('timechecks.index')->with('success', 'Timecheck record created successfully.');
    }

    public function show(Timecheck $timecheck)
    {
        return Inertia::render('Timechecks/Show', ['timecheck' => $timecheck]);
    }

    public function edit(Timecheck $timecheck)
    {
        return Inertia::render('Timechecks/Edit', ['timecheck' => $timecheck]);
    }

    public function update(Request $request, Timecheck $timecheck)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'shift_id' => 'required|exists:shifts,id',
            'clock_in' => 'nullable|date_format:H:i',
            'clock_out' => 'nullable|date_format:H:i',
        ]);

        $timecheck->update($validated);
        return redirect()->route('timechecks.index')->with('success', 'Timecheck record updated successfully.');
    }

    public function destroy(Timecheck $timecheck)
    {
        $timecheck->delete();
        return redirect()->route('timechecks.index')->with('success', 'Timecheck record deleted successfully.');
    }
}
