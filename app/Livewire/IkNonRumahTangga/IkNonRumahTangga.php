<?php

namespace App\Livewire\IkNonRumahTangga;

use App\Models\IKNRumahTangga;
use Livewire\Attributes\On; 
use Livewire\Component;

class IkNonRumahTangga extends Component
{
    public $statusPage = 'ik-non-rumah-tangga';
    public $status = 'list';
    
    public $show;
    public function list(){
        $this->status = 'list';
    }
    public function form(){
        $this->status = 'form';
    }

    #[On('iknrtDeleted')]
    public function iknrtDeleted(){
        $this->dispatch('$refresh');
        $this->dispatch('sukses', message:'Data IKNRT berhasil dihapus');
    }

    public function render()
    { 
        $data = IKNRumahTangga::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.ik-non-rumah-tangga.ik-non-rumah-tangga',[
            'datas' => $data,
        ]);
    }
}
