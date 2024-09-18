<?php

namespace App\Livewire\Component;

use App\Livewire\IkNonRumahTangga\IkNonRumahTangga;
use App\Livewire\IkNonRumahTangga\IkNonRumahTanggaList;
use App\Livewire\IkRumahTangga\IkRumahTangga as IkRumahTanggaIkRumahTangga;
use App\Livewire\IkRumahTangga\IkRumahTanggaList;
use App\Livewire\Index\ListIndex;
use App\Livewire\Kontak\Kontak as KontakKontak;
use App\Livewire\Kontak\ListKontak;
use App\Livewire\TbSo\Ternotifikasi\RiwayatPemantauan;
use App\Models\IKNRumahTangga;
use App\Models\IKRumahTangga;
use App\Models\Index;
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
        // dd($id,$status);
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
        }
        if($this->status == 'index'){
            $index = Index::find($this->idHapus);
            $punyaKontak = false;
            foreach ($index->iKNRumahTangga as $iKNRumahTangga) {
                if ($iKNRumahTangga->kontak->count() > 0) {  // Sesuaikan 'kontaks' dengan nama relasi yang sebenarnya
                    $punyaKontak = true;
                    break;
                }
            }
            if (!$punyaKontak && $index->iKRumahTangga && $index->iKRumahTangga->kontak->count() > 0) {
                $punyaKontak = true;
            }
        
            if ($punyaKontak) {
                $this->dispatch('gagal', message:'Tidak bisa hapus, index memiliki kontak terkait')->to(ListIndex::class);
            } else {
                $index->delete();
                $this->dispatch('indexDeleted')->to(ListIndex::class);
            }
        }
        if($this->status == 'iknrt'){
            $ikrt = IKNRumahTangga::find($this->idHapus);
            if($ikrt->kontak->count() > 0){
                $this->dispatch('gagal', message:'Tidak bisa hapus, index memiliki kontak terkait')->to(IkNonRumahTanggaList::class);
            }else{
                $ikrt->delete();
                $this->dispatch('iknrtDeleted')->to(IkNonRumahTangga::class);
            }
        }
        if($this->status == 'kontak'){
            $kontak = Kontak::find($this->idHapus);
            $kontak->delete();
            $this->dispatch('hapusKontak')->to(KontakKontak::class);
        }
        
        if($this->status == 'pemantauan'){
            $this->dispatch('hapus')->to(RiwayatPemantauan::class);
        }

        if(!$this->status){
            $this->dispatch('hapus');
        }

        $this->status = null;
        $this->idHapus = null ;
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
