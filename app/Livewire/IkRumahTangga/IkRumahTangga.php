<?php

namespace App\Livewire\IkRumahTangga;
use App\Models\IKRumahTangga as IkrumahTanggaModels;
use Livewire\Component;
use Livewire\Attributes\On; 

use Livewire\WithPagination;

class IkRumahTangga extends Component
{
    use WithPagination;
    public $status = 'list';
    public $statusPage = 'ik-rumah-tangga';
    public $show = 10;
    public $state ;
    public $details;
    public $edits;
    public $kabupaten;
    public $kecamatan;
    public $provinsi;
    public $kader;
    public $deleted = false;
    public $data;
   

    public function list(){
        $this->status = 'list';
    }
    public function form(){
        $this->status = 'form';
    }
   
    #[On('irtDeleted')]
    public function irtDeleted(){
        $this->dispatch('$refresh');
        $this->dispatch('sukses', message:'Data IKRT berhasil dihapus');
    }
    public function render()
    {
        $data = IkrumahTanggaModels::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.ik-rumah-tangga.ik-rumah-tangga',[
            'datas' => $data,
        ]);
    }
}
