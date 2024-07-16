<?php

namespace App\Livewire\TbSo\Ternotifikasi;

use App\Livewire\Component\ToastHapus;
use App\Models\Kontak;
use App\Models\Terduga;
use App\Models\Ternotifikasi as ModelsTernotifikasi;
use Livewire\Component;
use Livewire\Attributes\On;

class Ternotifikasi extends Component
{
    public $statusPage = 'ternotifikasi';
    // use WithPagination;
    public $status = 'list';
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
    public $pengobatanId;
    public $pemantauanId;
   

    public function list(){
        $this->status = 'list';
    }
    public function form(){
        $this->status = 'form';
    }

    public function edit($id){
        $this->editId = $id;
        $this->state = 'edit';
    }
    public function pengobatan($id){
        $this->pengobatanId = $id;
        $this->state = 'pengobatan';
    }
    
    #[On('close')]
    public function close(){
        $this->state = null;
    }
    
    #[On('hapus')]
    public function hapusTerduga(){
        $terduga = Terduga::find($this->hapusId);
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

    public function pemantauan($id){
        $this->state = 'pemantauan';
        $this->pemantauanId = $id;
    }
    
    public function render()
    {
        $data = ModelsTernotifikasi::orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.tb-so.ternotifikasi.ternotifikasi',[
            'datas' => $data,
        ]);
    }
}
