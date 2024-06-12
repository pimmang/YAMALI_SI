<?php

namespace App\Livewire\Component;

use App\Livewire\IkRumahTangga\IkRumahTangga as IkRumahTanggaIkRumahTangga;
use App\Livewire\IkRumahTangga\IkRumahTanggaList;
use App\Livewire\Kontak\Kontak as KontakKontak;
use App\Livewire\Kontak\ListKontak;
use App\Models\IKRumahTangga;
use App\Models\Kontak;
use Livewire\Component;
use Livewire\Attributes\On; 

class ToastHapus extends Component
{

    public $delete;
    public $idHapus;
    public $status;
    
    #[On('hapusData')] 
    public function HapusData($id,$status)
    {
        $this->status = $status;
        $this->idHapus = $id ;
    }

    public function hapus(){
        if($this->status == 'ikrt'){
            $irt = IKRumahTangga::find($this->idHapus);
            if($irt->kontak->count() > 0){
                $this->dispatch('gagal', message:'Tidak bisa hapus, index memiliki kontak terkait')->to(IkRumahTanggaList::class);
            }else{
                $irt->delete();
                $this->dispatch('irtDeleted')->to(IkRumahTanggaIkRumahTangga::class);
            }
        }if($this->status == 'kontak'){
            $kontak = Kontak::find($this->idHapus);
            $kontak->delete();
            $this->dispatch('hapusKontak')->to(KontakKontak::class);
        }
        else{
            $this->dispatch('hapus');
          
        }
    }
    public function batal(){
        $this->delete = false ;
    }

    

    public function redirectPage($message){
        session()->flash('ik-rumah-tangga',$message);
        return redirect('/rumah-tangga');
    }
    public function render()
    {
        return view('livewire.component.toast-hapus');
    }
}
