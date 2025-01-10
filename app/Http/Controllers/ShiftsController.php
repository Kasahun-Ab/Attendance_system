<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    public function index()
    {
        $shifts = Shift::all();
        return Inertia::render('Shifts/Index', ['shifts' => $shifts]);
    }

    public function create()
    {
        return Inertia::render('Shifts/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'shift_name' => 'required|string|max:50',
            'shift_start' => 'required|date_format:H:i',
            'shift_type' => 'required|in:Morning,Afternoon',
        ]);

        Shift::create($validated);
        return redirect()->route('shifts.index')->with('success', 'Shift created successfully.');
    }

    public function show(Shift $shift)
    {
        return Inertia::render('Shifts/Show', ['shift' => $shift]);
    }

    public function edit(Shift $shift)
    {
        return Inertia::render('Shifts/Edit', ['shift' => $shift]);
    }

    public function update(Request $request, Shift $shift)
    {
        $validated = $request->validate([
            'shift_name' => 'required|string|max:50',
            'shift_start' => 'required|date_format:H:i',
            'shift_type' => 'required|in:Morning,Afternoon',
        ]);

        $shift->update($validated);
        return redirect()->route('shifts.index')->with('success', 'Shift updated successfully.');
    }

    public function destroy(Shift $shift)
    {
        $shift->delete();
        return redirect()->route('shifts.index')->with('success', 'Shift deleted successfully.');
    }
}
