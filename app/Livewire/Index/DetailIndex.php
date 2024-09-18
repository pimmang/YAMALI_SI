<?php

namespace App\Livewire\Index;

use Livewire\Component;

class DetailIndex extends Component
{
    public $details;

    public function mount($data)
    {
        $this->details = $data;
    }
    public function close(){
        $this->dispatch('close')->to(ListIndex::class);
    }

    public function render()
    {
        return view('livewire.index.detail-index');
    }
}
