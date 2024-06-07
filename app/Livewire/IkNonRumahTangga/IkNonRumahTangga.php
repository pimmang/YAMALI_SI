<?php

namespace App\Livewire\IkNonRumahTangga;

use Livewire\Component;

class IkNonRumahTangga extends Component
{

    public $status = 'form';
    
    public function list(){
        $this->status = 'list';
    }
    public function form(){
        $this->status = 'form';
    }
    public function render()
    {
        return view('livewire.ik-non-rumah-tangga.ik-non-rumah-tangga');
    }
}
