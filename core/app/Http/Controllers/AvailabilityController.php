<?php

namespace App\Http\Controllers;

use App\Models\Availabilty;
use App\Modules\AvailabilityManager;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    
    public function availability() {
        $availabilities = Availabilty::with('timerange')->where('user_id', 1)->get();

        $availabilities = AvailabilityManager::make($availabilities)->getRange();
        $dayOrders = AvailabilityManager::getDaycodes();
        // dd($availabilities);
        return view('availability', compact('availabilities', 'dayOrders'));
    }
    public function createAvailability(Request $request){
        $request->validate([
            'name' => 'required|unique:availabilties,name',
        ]);

        AvailabilityManager::cloneDefault($request->name)->getRange();
        return redirect()->back();
    }
    public function deleteAvailability($availabilityId){
        Availabilty::find($availabilityId)->delete();
        return redirect()->back();
    }
}
