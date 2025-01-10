<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Inertia\Inertia;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::all();
        return Inertia::render('Leaves/Index', ['leaves' => $leaves]);
    }

    public function create()
    {
        return Inertia::render('Leaves/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type' => 'required|in:Sick,Vacation,Emergency,Other',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'nullable|in:Approved,Pending,Rejected',
        ]);

        Leave::create($validated);
        return redirect()->route('leaves.index')->with('success', 'Leave request created successfully.');
    }

    public function show(Leave $leave)
    {
        return Inertia::render('Leaves/Show', ['leave' => $leave]);
    }

    public function edit(Leave $leave)
    {
        return Inertia::render('Leaves/Edit', ['leave' => $leave]);
    }

    public function update(Request $request, Leave $leave)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'leave_type' => 'required|in:Sick,Vacation,Emergency,Other',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'nullable|in:Approved,Pending,Rejected',
        ]);

        $leave->update($validated);
        return redirect()->route('leaves.index')->with('success', 'Leave request updated successfully.');
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect()->route('leaves.index')->with('success', 'Leave request deleted successfully.');
    }
}
