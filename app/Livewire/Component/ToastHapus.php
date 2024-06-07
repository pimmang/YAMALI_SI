<?php

namespace App\Livewire\Component;

use App\Models\Kader;
use Livewire\Component;

class ToastHapus extends Component
{

    public function hapus(){
        $this->dispatch('hapus');
    }

    public function render()
    {
        return view('livewire.component.toast-hapus');
    }
}
