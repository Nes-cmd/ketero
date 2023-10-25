<?php

namespace App\Http\Controllers;

use App\Models\Availabilty;
use App\Models\EventType;
use App\Modules\AvailabilityManager;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {
        $events = EventType::all();
        return view('events', compact('events'));
    }
    public function createEvent(){
        return view('create-event');
    }
}

