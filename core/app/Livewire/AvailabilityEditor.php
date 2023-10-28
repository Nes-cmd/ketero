<?php

namespace App\Livewire;

use App\Models\Scheduletimerange;
use Illuminate\Support\Carbon;
use Livewire\Component;

class AvailabilityEditor extends Component
{
    protected $listeners = ['loadAvEditor'];

    public $availableAt = [];
    public $day = '';
    public $availablityId;

    public $removedIds = [];

    public function loadAvEditor($data)
    {
        $this->availableAt = $data['timeranges'];
        $this->day = $data['day'];
        $this->availablityId = $data['avId'];
        $this->dispatch('open-modal', name: 'av-editor');
    }
    public function addNew()
    {
        $lastIndex = count($this->availableAt) - 1;
        $startTime = $lastIndex >= 0 ? $this->availableAt[$lastIndex]['end_time'] : '08:00';
        $next = [
            'start_time' =>  $startTime,
            'end_time' => Carbon::make($startTime)->addMinutes(30)->format('H:i'),
            'availabilties_id' => $this->availablityId,
            'date' => $this->day,
        ];
        array_push($this->availableAt, $next);
    }
    public function removeIndex($index)
    {
        $removed = array_splice($this->availableAt, $index, 1);
        if (count($removed)) {
            $removed = $removed[0];
            if (array_key_exists('id', $removed)) $this->removedIds[$removed['id']] =  $removed['id'];
        }
    }
    public function saveChanges()
    {
        
        foreach ($this->availableAt as $available) {
            if (array_key_exists('id', $available)) {
                $availablity = Scheduletimerange::find($available['id']);
                $availablity->start_time = $available['start_time'];
                $availablity->end_time = $available['end_time'];
                $availablity->save();
            } else {
                Scheduletimerange::create($available);
            }
        }
        foreach ($this->removedIds as $id) Scheduletimerange::find($id)->delete();
        $this->dispatch('close-modal');
        $this->dispatch('updateAvailability.'.$this->availablityId);
    }
    public function render()
    {

        return view('livewire.availability-editor');
    }
}
