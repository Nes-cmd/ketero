<?php

namespace App\Http\Controllers;

use App\Models\EventType;
use App\Modules\AvailabilityManager;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
        dd($request->all());
        return redirect('confirm-booking');
    }
    public function confirmBooking(): View {
        return view('confirm-booking');
    }
}
