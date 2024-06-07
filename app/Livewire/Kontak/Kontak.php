<?php

namespace App\Livewire\Kontak;

use App\Models\Kontak as ModelsKontak;
use Livewire\Component;

class Kontak extends Component
{
    public $idIndex;
    public $state;
    public $kontaks;
   
    public function mount($id){
        $this->idIndex = $id;
        $this->kontaks = ModelsKontak::where('i_k_rumah_tangga_id', $id)->get();
    }

    public function tambah(){
        $this->state = "tambah";
    }
    public function close(){
        $this->state = null;
    }

    
    public function render()
    {
        return view('livewire.kontak.kontak');
    }
}
