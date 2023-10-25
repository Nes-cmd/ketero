<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availabilty extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'mon',
        'tue',
        'wed',
        'thu',
        'fri',
        'sat',
        'sun',
    ];

   
    public function eventtype()
    {
        return $this->hasMany(EventType::class);
    }

   
    public function timerange()
    {
        return $this->hasMany(Scheduletimerange::class,'availabilties_id');
    }
}
