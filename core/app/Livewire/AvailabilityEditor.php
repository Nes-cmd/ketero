<?php

namespace App\Livewire;

use App\Models\Availabilty;
use App\Models\Scheduletimerange;
use Livewire\Component;

class AvailabilityEditor extends Component
{
    protected $listeners = ['loadAvEditor'];

    public $availableAt = [];
    public $day = '';

    public function loadAvEditor($data){
        $this->availableAt = $data['timeranges'];
        $this->day = $data['day'];
        $this->dispatch('open-modal', ['name' => 'av-editor']);

    }
    public function saveChanges(){
        foreach($this->availableAt as $available){
            $availablity = Scheduletimerange::find($available['id']);
            $availablity->start_time = $available['start_time'];
            $availablity->end_time = $available['end_time'];
            $availablity->save();
           
        }
        $this->dispatch('close-modal');
    }
    public function render()
    {
        
        return view('livewire.availability-editor');
    }
}
