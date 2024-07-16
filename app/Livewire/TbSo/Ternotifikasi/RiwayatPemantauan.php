<?php

namespace App\Livewire\TbSo\Ternotifikasi;

use App\Livewire\Component\ToastHapus;
use App\Models\Pemantauan;
use App\Models\Ternotifikasi;
use Livewire\Component;
use Livewire\Attributes\On;

class RiwayatPemantauan extends Component
{

    public $data;
    public $pemantauanId;
    public $dataPemantauans;
    public $hapusId;

    public function mount($id){
        $this->pemantauanId = $id;
        $this->data = Ternotifikasi::find($id);
        $this->dataPemantauans = Pemantauan::where('ternotifikasi_id', $id)->get();
    }

    public function hapus($id){
        $this->hapusId = $id;
        $this->dispatch('hapusPemantauan');
        $this->dispatch('hapusData', id:$id, status:'pemantauan')->to(ToastHapus::class);
    }
    public function close(){
        $this->dispatch('close');
    }

    public $tglKegiatan ='';
    public $tahapKegiatan ='';
    public $waktuKegiatan ='';
    public $jenisKegiatan ='';
    public $kegiatan ='';
    public function save(){
        $pemantauan = new Pemantauan();
        $pemantauan->ternotifikasi_id = $this->pemantauanId;
        $pemantauan->tanggal_kegiatan = $this->tglKegiatan;
        $pemantauan->tahap_kegiatan = $this->tahapKegiatan;
        $pemantauan->waktu_kegiatan = $this->waktuKegiatan;
        $pemantauan->jenis_kegiatan = $this->jenisKegiatan;
        $pemantauan->kegiatan = $this->kegiatan;
        $pemantauan->save();
        $this->dispatch('sukses' , message:'Data pemantauan berhasil ditambahkan')->self();
        $this->dataPemantauans = Pemantauan::where('ternotifikasi_id', $this->pemantauanId)->get();
    }

    #[On('hapus')]
    public function hapusPemantauan(){
       $pemantauan = Pemantauan::find($this->hapusId);
       $pemantauan->delete();
       $this->dispatch('sukses' , message:'Data pemantauan berhasil dihapus')->self();
       $this->dataPemantauans = Pemantauan::where('ternotifikasi_id', $this->pemantauanId)->get();
    }
    public function render()
    {
        return view('livewire.tb-so.ternotifikasi.riwayat-pemantauan');
    }
}
