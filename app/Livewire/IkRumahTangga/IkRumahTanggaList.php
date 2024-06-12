<?php

namespace App\Livewire\IkRumahTangga;

use App\Livewire\Component\ToastHapus;
use App\Livewire\Kontak\Kontak;
use App\Models\IKRumahTangga;
use Livewire\Component;
use Livewire\Attributes\On; 


class IkRumahTanggaList extends Component
{
    public $data;
    public $klik = false;
    public $state;
    public $edits;
    public $details;
    public function mount($data){
    $this->data = $data;
   
    }
    
    public function kontak(){
        $this->dispatch('klik')->to(Kontak::class);
        $this->klik = !$this->klik;
    }

    
    public function edit($id){
        $this->state = 'edit';
        $this->edits = IKRumahTangga::find($id);
    }
    

    
    public function detail($id){
        $this->state = 'details';
        $this->details = IkrumahTangga::find($id);
    }

    
    public function hapus($id){
       $this->dispatch('hapusData', id:$id, status:'ikrt')->to(ToastHapus::class);
       $this->dispatch('hapusIrt');
    }

  
    

    #[On('close')]
    public function close(){
        $this->state = null;
    }

    // #[On('kontakDeleted')]
    // public function refresh(){
    //     $this->dispatch('klik')->to(Kontak::class);
    //     $this->klik = !$this->klik;
    // }

    public function render()
    {
        return view('livewire.ik-rumah-tangga.ik-rumah-tangga-list');
    }
}
