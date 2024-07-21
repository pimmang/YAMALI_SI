<?php

namespace App\Livewire\Fasyankes;

use App\Models\Fasyankes as ModelsFasyankes;
use App\Models\IKRumahTangga;
use App\Models\Ssr;
use Livewire\Component;
use Livewire\Attributes\On;

class Fasyankes extends Component
{
    public $status = 'list';
    public $show = 10;
    public $nama ='';
    public $kode ='';
    public $ssrCari;
    public $kecamatan ='';
    public $jenis ='';
    public $kategoriCari = 'nama';
    public $sr = 'sulawesi selatan';
    public $statusPage = 'fasyankes';
    public $state;
    public $edits;
    public $details;
    
    public $ssrs;

    public function mount(){
        $this->ssrs = Ssr::get();
    }


    
    
    public function list(){
        $this->status = 'list';
    }
    public function form(){
        $this->status = 'form';
    }

    public function edit($id){
        $this->edits = ModelsFasyankes::find($id);
        $this->state = 'edit';
    }
    public $detailId;
    public function detail($id){
        $this->details = ModelsFasyankes::find($id);  
        $this->state = 'details';
    }

    #[On('close')]
    public function close(){
        $this->state = null;
    }

    public $hapusId;
    public function hapus($id){
    // dd($id);
       $this->hapusId = $id;
    }

    #[On('hapus')] 
    public function HapusData()
    {

       
        $fasyankes = ModelsFasyankes::find($this->hapusId);
        if($fasyankes->iKRumahTangga()->exists() || $fasyankes->iKNRumahTangga()->exists() || $fasyankes->kontak()->exists()  ){
            $this->dispatch('gagal', message:'Data digunakan di data lain');
        }else{
            $fasyankes->delete();
            $this->dispatch('sukses', message:'Data fasyankes berhasil dihapus')->self();
            $this->hapusId = null;
        }
       
    }
    public function render()
    {
      
        $query = ModelsFasyankes::query();

        if ($this->kategoriCari == 'nama') {
            $query->where('nama_fasyankes', 'like', '%' . $this->nama . '%');
        } elseif ($this->kategoriCari == 'kode') {
            $query->where('kode_fasyankes', 'like', '%' . $this->kode . '%');
        } elseif ($this->kategoriCari == 'ssr') {
            $query->whereHas('ssr', function($query){
                $query->where('nama', 'like', '%' . $this->ssrCari . '%');
            });
        } elseif ($this->kategoriCari == 'kecamatan') {
            $query->whereHas('district', function($query){
                $query->where('name', 'like', '%' . $this->kecamatan . '%');
            });
        } elseif ($this->kategoriCari == 'jenis') {
            $query->where('jenis', 'like', '%' . $this->jenis . '%');
        }
        
        if (is_numeric($this->show)) {
            $fasyankes = $query->paginate($this->show);
        } else {
            $fasyankes = $query->get();
        }
        
        return view('livewire.fasyankes.fasyankes',[
                'fasyankess' => $fasyankes,
               
        ]);
    }
}
