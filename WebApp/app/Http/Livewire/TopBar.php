<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class TopBar extends Component
{
    public function render(): View
    {
        return view('livewire.top-bar');
    }
}
