<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'employee_id',
        'date',
        'overtime_hours',
        'reason',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
