<?php

namespace App\Livewire\Component;

use Livewire\Component;
use Livewire\Attributes\On;

class LoadingStatus extends Component
{
    // #[On('loading')]
    // public function loading()
    // {
    //     dd('2');
    // }
    public function render()
    {
        return view('livewire.component.loading-status');
    }
}
