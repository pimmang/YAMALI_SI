<?php

namespace App\Livewire\TbSo\Terduga;

use App\Livewire\Component\ToastHapus;
use App\Models\IKRumahTangga;
use App\Models\Kontak;
use App\Models\Terduga as ModelsTerduga;
use Livewire\Component;
use Livewire\Attributes\On;

class Terduga extends Component
{

    // use WithPagination;
    public $status = 'list';
    public $statusPage = 'terduga';
    public $show = 10;
    public $state;
    public $details;
    public $edits;
    public $kabupaten;
    public $kecamatan;
    public $provinsi;
    public $kader;
    public $deleted = false;
    public $data;
    public $hapusId;
    public $editId;
   

    public function list(){
        $this->status = 'list';
    }
    public function form(){
        $this->status = 'form';
    }

    public function edit($id){
        $this->state = 'edit';
        $this->editId = $id;
    }
    
    #[On('close')]
    public function close(){
        $this->state = null;
    }
    
    #[On('hapus')]
    public function hapusTerduga(){
        $terduga = ModelsTerduga::find($this->hapusId);
        $kontak = Kontak::find($terduga->kontak_id);
        $kontak->terduga = 0;
        $kontak->update();
        $terduga->delete();
        $this->dispatch('sukses', message:'Data terduga berhasil dihapus');
    }
    
    public function hapus($id){
        $this->hapusId = $id;
        $this->dispatch('hapusTerduga');
        $this->dispatch('hapusData', id:$id, status:'terduga')->to(ToastHapus::class);
    }

    
    public function render()
    {
        $data = ModelsTerduga::orderBy('created_at', 'desc')
            ->where('tipe_pemeriksaan', 'BTA -')
            ->orwhere('tipe_pemeriksaan', 'CXR -')
            ->orwhere('tipe_pemeriksaan', 'Extra Paru -')
            ->orwhere('tipe_pemeriksaan', 'Rontgen -')
            ->orwhere('tipe_pemeriksaan', 'TCM -')
            ->paginate(10);
        return view('livewire.tb-so.terduga.terduga',[
            'datas' => $data,
        ]);
    }
}
