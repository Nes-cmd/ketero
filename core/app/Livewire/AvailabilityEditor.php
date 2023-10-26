<?php

namespace App\Livewire;

use Livewire\Component;
use stdClass;

class AvailabilityEditor extends Component
{
    protected $listeners = ['loadAvEditor'];

    public $availableAt = [];
    public $day = '';

    public function loadAvEditor($data){
        $this->availableAt = $data['timeranges'];
        $this->day = $data['day'];
        // dd($this->availableAt);
        $this->dispatch('open-modal', ['name' => 'av-editor']);
    }
    public function render()
    {
        
        return view('livewire.availability-editor');
    }
}
