<?php

namespace App\Livewire;

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
        return view('livewire.ik-tpt-balita');
    }
}
