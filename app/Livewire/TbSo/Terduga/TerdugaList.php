<?php

namespace App\Livewire\TbSo\Terduga;

use Livewire\Component;

class TerdugaList extends Component
{
    public $data;
    public function mount($data){
        $this->data = $data;
        }
    public function render()
    {
        return view('livewire.tb-so.terduga.terduga-list');
    }
}
