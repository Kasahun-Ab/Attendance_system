<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name_day',
        'date_of_day',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }

    public function holiday()
    {
        return $this->hasOne(Holiday::class);
    }
}
