<?php

namespace App\Livewire\Fasyankes;

use App\Livewire\Fasyankes\Fasyankes;

use Livewire\Component;

class FasyankesDetail extends Component
{
    public $details;
    public function mount($data){
        $this->details = $data;
    }
    public function close(){
        $this->dispatch('close')->to(Fasyankes::class);
    }
    public function render()
    {
        return view('livewire.fasyankes.fasyankes-detail');
    }
}
