<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeCheck extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'monrning_start_time',
        'afternon_start_time',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
}
