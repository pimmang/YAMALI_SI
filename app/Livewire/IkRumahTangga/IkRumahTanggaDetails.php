<?php

namespace App\Livewire\IkRumahTangga;

use Livewire\Component;

class IkRumahTanggaDetails extends Component
{
    public $details;


    public function mount($data){
        $this->details = $data ;
    }

    public function close(){
        $this->dispatch('close')->to(IkRumahTanggaList::class);
    }

    
    public function render()
    {
        return view('livewire.ik-rumah-tangga.ik-rumah-tangga-details');
    }
}
