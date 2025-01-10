<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'hire_date',
        'department',
        'is_active',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function overtime()
    {
        return $this->hasMany(Overtime::class);
    }
}
