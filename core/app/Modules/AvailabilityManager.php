<?php

namespace App\Modules;

use App\Models\Availabilty;
use App\Models\Scheduletimerange;

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
        if(count($availabilities) == 0) return self::createDefaultAvailability();
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
                else $newSlot[$code] = $timeranges[$code];
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

    public static function fillDefaultTimerange($availabilityId){
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
            // afternoot
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
}
