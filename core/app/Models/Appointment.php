<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
    
        'name',
        'email',
        'description',
        'date',
        'timezone',
        'start_time',
        'end_time',
        'eventtype_id',
        'user_id',

    ];
}
