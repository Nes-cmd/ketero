<?php

namespace App\Livewire;

use App\Models\Availabilty;
use App\Models\EventType;
use App\Modules\AvailabilityManager;
use Livewire\Component;

class CreateEvent extends Component
{
    public $selectedAv;
    public $availabilities;
    public $dayOrders;

    public $event = ['maxinvities' => 1];
    public $group = false;
    public $avchoosen;

    public function mount()
    {
        $availabilities = Availabilty::with('timerange')->where('user_id', 1)->get();
        $this->availabilities = AvailabilityManager::make($availabilities)->getRange();
        $this->dayOrders = AvailabilityManager::getDaycodes();
        $this->selectedAv = $this->availabilities[0];
        $this->avchoosen = $this->selectedAv['id'];
    }
    public function updatedAvchoosen()
    {

        foreach ($this->availabilities as $av) {
            if ($av['id'] == $this->avchoosen) $this->selectedAv = $av;
        }
    }
    public function createEvent()
    {
        $this->validate([
            'event.name' => 'required',
            'event.location' => 'required',
            'event.link' => 'required',
            'event.color' => 'required',
            // 'event.maxinvities' => 'nullable',

        ]);
        $event = EventType::create([
            'name' => $this->event['name'],
            'description' => 'Description will goes here',
            'link' => $this->event['link'],
            'location' => $this->event['location'],
            'color' => $this->event['color'],
            'maxinvities' => $this->event['maxinvities'],
            'user_id' => auth()->id(),
            'category' => $this->group ? 'group' : 'single',
            'duration' => $this->event['duration'],
            'availabilty_id' => $this->selectedAv['id'],
        ]);
        dd($event);
        // dump($this->avchoosen);
        // dd($this->event);
    }

    public function render()
    {
        return view('livewire.create-event');
    }
}
