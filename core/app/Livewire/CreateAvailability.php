<?php

namespace App\Livewire;

use App\Modules\AvailabilityManager;
use Livewire\Component;

class CreateAvailability extends Component
{
    public $name;
    public function createAvailability(){
        $this->validate([
            'name' => 'required|unique:availabilties,name',
        ]);
        $availability = AvailabilityManager::cloneDefault($this->name)->getRange();

        $this->dispatch('availabilityCreated', ['availability' => $availability]);
    }
    public function render()
    {
        return view('livewire.create-availability');
    }
}
