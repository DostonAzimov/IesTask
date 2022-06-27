<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DomenComponent extends Component
{
    public function render()
    {
        return view('livewire.domen-component')->layout('layouts.base');
    }
}
