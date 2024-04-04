<?php

namespace App\Livewire;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Livewire\Component;

class IkRumahTangga extends Component
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
        return view('livewire.ik-rumah-tangga');
    }
}
