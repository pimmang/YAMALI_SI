<?php

namespace App\Livewire\Kontak;

use App\Livewire\IkRumahTangga\IkRumahTangga;
use App\Models\Kontak as ModelsKontak;
use Livewire\Component;

use Livewire\Attributes\On;
class Kontak extends Component
{
    public $idIndex;
    public $state;
    public $idKontak;
    public $editId;
    public $rujuk = 1;
    public $kunjung = 0;
    public $kontaks;

    public function mount($id){
        $this->idIndex = $id;
        $this->kontaks = ModelsKontak::where('i_k_rumah_tangga_id',$id)->get();
    }


    public function tambah(){
        $this->state = "tambah";
    }

    #[On('close')]
    public function close(){
        $this->state = null;
    }
    #[On('edit')]
    public function edit($id){
        $this->state = 'edit';
        $this->editId = $id;
    }
    #[On('hapusKontak')]
    public function deleteKontak(){
        $this->kontaks = ModelsKontak::where('i_k_rumah_tangga_id',$this->idIndex)->get() ;
        $this->dispatch('sukses', message:'Kontak berhasil dihapus')->self();
    }
    public function render()
    {
        return view('livewire.kontak.kontak');
    }
}
