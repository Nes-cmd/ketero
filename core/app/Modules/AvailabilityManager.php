<?php

namespace App\Modules;

use App\Models\Availabilty;
use App\Models\Scheduletimerange;
use Exception;
use Illuminate\Support\Carbon;

class AvailabilityManager
{
    public static $availabilities;
    protected static $daycodes = ['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'];

    public static function getDaycodes(): array
    {
        return self::$daycodes;
    }
    public static function make($availabilities)
    {
        if (count($availabilities) == 0) return self::createDefaultAvailability();
        self::$availabilities = $availabilities;
        return new AvailabilityManager;
    }
    public function getRange()
    {
        $sortedRange = [];
        // dd(self::$availabilities);
        foreach (self::$availabilities as $availability) {
            $newRange['name'] = $availability->name;
            $newRange['id'] = $availability->id;

            $timeranges = $availability->timerange->groupBy('date');
           
            $newSlot = [];
            foreach (self::$daycodes as $code) {
                if (!$timeranges->has($code)) $newSlot[$code] = [];
                else {
                    $newSlot[$code] = makeArray($timeranges[$code]);
                }
            }
            $newRange['timeranges'] = $newSlot;
            array_push($sortedRange, $newRange);
        }
        
        return $sortedRange;
    }
    
    public static function createDefaultAvailability()
    {
        $defaultData = [
            'name' => 'default',
            'user_id' => auth()->id(),
        ];
        foreach (self::$daycodes as $day) {
            if ($day == 'sat' || $day == 'sun')  $defaultData[$day] = 0;
            else  $defaultData[$day] = 1;
        }
        $availability = Availabilty::create($defaultData);

        self::fillDefaultTimerange($availability->id);

        $newAvailability = Availabilty::with('timerange')->where('user_id', auth()->id())->get();
        self::$availabilities = $newAvailability;
        return new AvailabilityManager;
    }
    public static function cloneDefault($name)
    {
        $availability = Availabilty::where('name', 'default')->first();
        if (!$availability) $availability = self::createDefaultAvailability();

        $newAvailability = new Availabilty;
        $newAvailability->user_id = auth()->id();
        $newAvailability->name = $name;
        foreach (self::$daycodes as $day) $newAvailability->$day = $availability->$day;
        $newAvailability->save();
        self::fillDefaultTimerange($newAvailability->id);

        $newAvailability = Availabilty::with('timerange')->where('user_id', auth()->id())->get();
        self::$availabilities = $newAvailability;
        return new AvailabilityManager;
        // return Availabilty::with('timerange')->where('id', $newAvailability->id)->first();
    }

    public static function fillDefaultTimerange($availabilityId)
    {
        $defautlScheduletimerange = [];
        foreach (self::$daycodes as $day) {
            if ($day == 'sat' || $day == 'sun') continue;
            // morning
            $morning = [
                'start_time' => '08:00:00',
                'end_time'   => '12:00:00',
                'date'       => $day,
                'availabilties_id' => $availabilityId,
            ];
            array_push($defautlScheduletimerange, $morning);
            // afternoon
            $afternoon = [
                'start_time' => '14:00:00',
                'end_time'   => '17:00:00',
                'date'       => $day,
                'availabilties_id' => $availabilityId,
            ];
            array_push($defautlScheduletimerange, $afternoon);
        }
        Scheduletimerange::insert($defautlScheduletimerange);
    }

    public static function prepareOnedaySlot($eventType){

        // dump($eventType);
        $eventDuration = $eventType->duration;
        $availability = $eventType->availabilty;
        $timeRange = $availability->timerange->groupBy('date');

        $sliced = [];
        foreach (self::$daycodes as $day){
            if( $timeRange->has($day) && count($timeRange)){
                $sliced[$day] = makeSlice($timeRange[$day]);
            }
            else{
                $sliced[$day] = [];
            }
        }
        
        return [
            'event' => [
                'id' => $eventType->id,
                'name' => $eventType->name,
                'description' => $eventType->description,
                'location' => $eventType->location,
                'color' => $eventType->color,
                // 'category' => $eventType->category
            ],
            'sliced_availability' => $sliced,
            'starting_date' => Carbon::now()->addDays(2)->toIso8601String(),
            'first_day_start' => 3,
        ];
    }
}
function makeSlice($timeRange, $eventDuration = '30 min'){
    $slice = [];
    $eventDuration = explode(' ', $eventDuration);
    $magnitude = $eventDuration[0];
    $unit = $eventDuration[1];
    
    foreach($timeRange as $range){
        $start = $range->start_time;
        $end = $range->end_time;
        if($unit == 'min'){
            while($start->lte($end)){
                $slice[] = $start->format('H:i a');
                $start->addMinutes($magnitude);
            }
        }
        elseif($unit == 'hour'){
            while($start->lte($end)){
                $slice[] = $start->format('H:i a');
                $start->addHours($magnitude);
            }
        }
        else{
            throw new Exception('Unit except min and hour is used');
        }
    }
    return $slice;
}

function makeArray($timerangeObject){
    $main = [];
    $newarray = [];
   
    foreach($timerangeObject as $obj){
        $newarray['id'] = $obj->id;
        $newarray['start_time'] = $obj->start_time->format('H:i');
        $newarray['end_time'] = $obj->end_time->format('H:i');
        $newarray['date'] = $obj->date;
        $newarray['availabilties_id'] = $obj->availabilties_id;
        $main[] = $newarray;
    }
   
    return $main;
}