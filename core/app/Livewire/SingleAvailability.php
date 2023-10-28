<?php

namespace App\Livewire;

use App\Models\Availabilty;
use App\Modules\AvailabilityManager;
use Livewire\Attributes\On;
use Livewire\Component;

class SingleAvailability extends Component
{
    public $dayOrders;
    public $availability;
    public function mount($availability){
        $this->availability = $availability;
        $this->dayOrders = AvailabilityManager::getDaycodes();
    }
    public function loadEditor($day){

        $this->dispatch('loadAvEditor', ['timeranges' => $this->availability['timeranges'][$day], 'day' => $day, 'avId' => $this->availability['id']]);
    }

    #[On('updateAvailability.{availability.id}')]
    public function updateAvailability(){
        $id = $this->availability['id'];
        $availability = Availabilty::with('timerange')->where('id', $id)->get();
        $availability = AvailabilityManager::make($availability)->getRange();
        $this->availability = $availability[0];
    }
    public function render()
    {
        return view('livewire.single-availability');
    }
}
