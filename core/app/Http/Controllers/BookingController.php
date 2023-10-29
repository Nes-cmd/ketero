<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\EventType;
use App\Modules\AvailabilityManager;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    public function bookingPage($eventId) : View {
        $eventType = EventType::with('availabilty.timerange')->where('id', $eventId)->first();
        
        $preparedEvent = AvailabilityManager::prepareOnedaySlot($eventType);
        // dd($preparedEvent);
        return view('booking-page', compact('preparedEvent'));
    }
    public function bookRegister(Request $request) : View {
        $event = EventType::find($request->eventId);
        $selectedDate = $request->selectedDate;
        $selectedSlot = $request->selectedSlot;
        return view('book-register', compact('event', 'selectedSlot', 'selectedDate'));
    }
    public function book(Request $request){
        $event = EventType::find($request->eventtype_id);
        $selectedDate = $request->selectedDate;
        $selectedSlot = $request->selectedSlot;
      
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'eventtype_id' => 'required',
        ]);
        $validatedData['date'] = Carbon::make($request->selectedDate.' '. $request->selectedSlot);
        $validatedData['start_time'] = Carbon::make($request->selectedDate.' '. $request->selectedSlot);
        $validatedData['end_time'] = Carbon::make($request->selectedDate.' '. $request->selectedSlot)->addMinutes(explode(' ',$event->duration)[0]);
        $validatedData['timezone'] = 'utc';
        $validatedData['description'] = $event->description;
        $validatedData['user_id'] = auth()->id();
        
        $appointment = Appointment::create($validatedData);
        

        return view('confirm-booking', compact('selectedDate', 'selectedSlot', 'event'));
    }
    public function confirmBooking(): View {
        return view('confirm-booking');
    }
}
