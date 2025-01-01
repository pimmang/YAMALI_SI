<?php

namespace App\Livewire\IkNonRumahTangga;

use App\Models\Fasyankes;
use Livewire\Component;

class IkNonRumahTanggaDetails extends Component
{
    public $details;
    public $fasyankes;


    public function mount($data){
        $this->details = $data ;
        
    }

    public function close(){
        $this->dispatch('close')->to(IkNonRumahTanggaList::class);
    }
    public function render()
    {
        return view('livewire.ik-non-rumah-tangga.ik-non-rumah-tangga-details');
    }
}
