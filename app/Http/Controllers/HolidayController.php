<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Inertia\Inertia;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index()
    {
        $holidays = Holiday::all();
        return Inertia::render('Holidays/Index', ['holidays' => $holidays]);
    }

    public function create()
    {
        return Inertia::render('Holidays/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'holiday_name' => 'required|string|max:100',
            'holiday_date' => 'required|date',
            'is_observed' => 'nullable|boolean',
        ]);

        Holiday::create($validated);
        return redirect()->route('holidays.index')->with('success', 'Holiday created successfully.');
    }

    public function show(Holiday $holiday)
    {
        return Inertia::render('Holidays/Show', ['holiday' => $holiday]);
    }

    public function edit(Holiday $holiday)
    {
        return Inertia::render('Holidays/Edit', ['holiday' => $holiday]);
    }

    public function update(Request $request, Holiday $holiday)
    {
        $validated = $request->validate([
            'holiday_name' => 'required|string|max:100',
            'holiday_date' => 'required|date',
            'is_observed' => 'nullable|boolean',
        ]);

        $holiday->update($validated);
        return redirect()->route('holidays.index')->with('success', 'Holiday updated successfully.');
    }

    public function destroy(Holiday $holiday)
    {
        $holiday->delete();
        return redirect()->route('holidays.index')->with('success', 'Holiday deleted successfully.');
    }
}
