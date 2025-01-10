<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'day_id',
        'holiday_name',
        'holiday_date',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
