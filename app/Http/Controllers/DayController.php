<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Inertia\Inertia;
use Illuminate\Http\Request;

class DayController extends Controller
{
    public function index()
    {
        $days = Day::all();
        return Inertia::render('Days/Index', ['days' => $days]);
    }

    public function create()
    {
        return Inertia::render('Days/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'day_name' => 'required|string|max:50',
            'is_weekend' => 'nullable|boolean',
        ]);

        Day::create($validated);
        return redirect()->route('days.index')->with('success', 'Day created successfully.');
    }

    public function show(Day $day)
    {
        return Inertia::render('Days/Show', ['day' => $day]);
    }

    public function edit(Day $day)
    {
        return Inertia::render('Days/Edit', ['day' => $day]);
    }

    public function update(Request $request, Day $day)
    {
        $validated = $request->validate([
            'day_name' => 'required|string|max:50',
            'is_weekend' => 'nullable|boolean',
        ]);

        $day->update($validated);
        return redirect()->route('days.index')->with('success', 'Day updated successfully.');
    }

    public function destroy(Day $day)
    {
        $day->delete();
        return redirect()->route('days.index')->with('success', 'Day deleted successfully.');
    }
}
