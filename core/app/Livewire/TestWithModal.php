<?php

namespace App\Livewire;

use Livewire\Component;

class TestWithModal extends Component
{
    public $name;
    public function test(){
        $this->validate([
            'name' => 'required',
        ]);

        $this->dispatch('close-modal');
    }
    public function render()
    {
        return view('livewire.test-with-modal');
    }
}
