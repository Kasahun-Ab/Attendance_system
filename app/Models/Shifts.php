<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'shift_name',
        'shift_start',
        'shift_type',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
}
