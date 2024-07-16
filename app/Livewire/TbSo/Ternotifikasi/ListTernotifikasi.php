<?php

namespace App\Livewire\TbSo\Ternotifikasi;

use App\Livewire\Kontak\Kontak;
use App\Models\IKNRumahTangga;
use Livewire\Component;
use Livewire\Attributes\On; 
class ListTernotifikasi extends Component
{

    public $data;
    public $klik = false;
    public $state;
    public $edits;
    public $details;

    public function mount($data){
    $this->data = $data;

    }
    // public function kontak(){
    //     $this->dispatch('klik')->to(Kontak::class);
    //     $this->klik = !$this->klik;
    // }

    
    public function edit($id){
        $this->state = 'edit';
        $this->edits = IKNRumahTangga::find($id);
    }
    

    
    public function detail($id){
        $this->state = 'details';
        $this->details = IKNRumahTangga::find($id);
    }

    public function hapus($id){
        // $this->hapusId = $id;
        $this->dispatch('hapusTerduga');
       $this->dispatch('hapusData', id:$id, status:'terduga')->to(ToastHapus::class);
    }
    // public function hapus($id){
    //    $this->dispatch('hapusData', id:$id, status:'iknrt')->to(ToastHapus::class);
    //    $this->dispatch('hapusInrt');
    // }

  
    

    // #[On('close')]
    // public function close(){
    //     $this->state = null;
    // }
    public function render()
    {
        return view('livewire.tb-so.ternotifikasi.list-ternotifikasi');
    }
}
