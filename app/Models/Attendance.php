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
