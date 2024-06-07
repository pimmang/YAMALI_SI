<?php

namespace App\Livewire\IkTptBalita;

use Livewire\Component;

class IkTptBalita extends Component
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
        return view('livewire.ik-tpt-balita.ik-tpt-balita');
    }
}
