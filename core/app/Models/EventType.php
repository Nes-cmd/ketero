<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'link',
        'location',
        'color',
        'maxinvities',
        'displayremainingspots',
        'user_id',
        'category',
        'duration',
        'availabilty_id'
    ];

  
    public function availabilty()
    {
        return $this->belongsTo(Availabilty::class);
    }
}
