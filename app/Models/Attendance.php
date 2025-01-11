<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'employee_id',
        'shift_id',
        'day_id',
        'clock_in',
        'status',
    ];
    <?php

    namespace App\Http\Controllers;
    
    use App\Models\Attendance;
    use App\Models\Employee;
    use App\Models\Shift;
    use App\Models\Day;
    use Inertia\Inertia;
    use Illuminate\Http\Request;
    
    class AttendanceController extends Controller
    {
        // Display all attendance records
        public function index()
        {
            $attendances = Attendance::with(['employee', 'shift', 'day'])->get(); // Retrieve all attendances with related models
    
            return Inertia::render('Attendance/Index', [
                'attendances' => $attendances
            ]);
        }
    
        // Show the form for creating a new attendance record
        public function create()
        {
            $employees = Employee::all();  // Get all employees
            $shifts = Shift::all();        // Get all shifts
            $days = Day::all();            // Get all days
    
            return Inertia::render('Attendance/Create', [
                'employees' => $employees,
                'shifts' => $shifts,
                'days' => $days
            ]);
        }
    
        // Store a newly created attendance record
        public function store(Request $request)
        {
            $validated = $request->validate([
                'employee_id' => 'required|exists:employees,id',
                'shift_id' => 'required|exists:shifts,id',
                'day_id' => 'required|exists:days,id',
                'clock_in' => 'required|date_format:H:i',  // Assuming the time format is H:i (hours:minutes)
                'status' => 'required|in:present,absent',  // Assuming status can be 'present' or 'absent'
            ]);
    
            Attendance::create([
                'employee_id' => $validated['employee_id'],
                'shift_id' => $validated['shift_id'],
                'day_id' => $validated['day_id'],
                'clock_in' => $validated['clock_in'],
                'status' => $validated['status'],
            ]);
    
            return redirect()->route('attendance.index')->with('success', 'Attendance recorded successfully!');
        }
    
        // Show the form for editing an existing attendance record
        public function edit($id)
        {
            $attendance = Attendance::findOrFail($id);  // Find the attendance by ID
            $employees = Employee::all();
            $shifts = Shift::all();
            $days = Day::all();
    
            return Inertia::render('Attendance/Edit', [
                'attendance' => $attendance,
                'employees' => $employees,
                'shifts' => $shifts,
                'days' => $days
            ]);
        }
    
        // Update an existing attendance record
        public function update(Request $request, $id)
        {
           
    
    public $incrementing = false;
    protected $keyType = 'string';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
