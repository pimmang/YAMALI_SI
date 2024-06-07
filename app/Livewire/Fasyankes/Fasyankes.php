<?php

namespace App\Livewire\Fasyankes;

use App\Models\Fasyankes as ModelsFasyankes;
use Livewire\Component;
use Livewire\Attributes\On;

class Fasyankes extends Component
{
    public $status = 'list';
    public $show = 10;
    public $nama ='';
    public $kode ='';
    public $ssr ='';
    public $kecamatan ='';
    public $jenis ='';
    public $kategoriCari = 'nama';
    public $sr = 'sulawesi selatan';
    public $statusPage = 'fasyankes';
    public $state;
    public $edits;
    public $details;


    
    
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
        $kader = ModelsFasyankes::find($this->hapusId);
        $kader->delete();
        session()->flash('fasyankes', 'Data fasyankes berhasil dihapus');
        $this->hapusId = null;
        return redirect('/fasyankes');
    }
    public function render()
    {
      

        if(is_numeric($this->show) && $this->kategoriCari == 'nama'){
            $fasyankes = ModelsFasyankes::where('nama_fasyankes', 'like', '%' . $this->nama . '%')->paginate($this->show);
        }elseif(is_string($this->show) && $this->kategoriCari == 'nama'){
            $fasyankes = ModelsFasyankes::where('nama_fasyankes', 'like', '%' . $this->nama . '%')->get();
        }elseif(is_numeric($this->show)&& $this->kategoriCari == 'kode') {
            $fasyankes = ModelsFasyankes::where('kode_fasyankes', 'like', '%' . $this->kode . '%')->paginate($this->show);
        }elseif(is_string($this->show) && $this->kategoriCari == 'kode'){
            $fasyankes = ModelsFasyankes::where('kode_fasyankes', 'like', '%' . $this->kode . '%')->get();
        }elseif(is_numeric($this->show)&& $this->kategoriCari == 'ssr') {
            $fasyankes = ModelsFasyankes::where('ssr', 'like', '%' . $this->ssr . '%')->paginate($this->show);
        }elseif(is_string($this->show) && $this->kategoriCari == 'ssr'){
            $fasyankes = ModelsFasyankes::where('ssr', 'like', '%' . $this->ssr . '%')->get();
        }elseif(is_numeric($this->show)&& $this->kategoriCari == 'kecamatan') {
            $fasyankes = ModelsFasyankes::where('kecamatan', 'like', '%' . $this->kecamatan . '%')->paginate($this->show);
        }elseif(is_string($this->show) && $this->kategoriCari == 'kecamatan'){
            $fasyankes = ModelsFasyankes::where('kecamatan', 'like', '%' . $this->kecamatan . '%')->get();
        }elseif(is_numeric($this->show)&& $this->kategoriCari == 'jenis') {
            $fasyankes = ModelsFasyankes::where('jenis', 'like', '%' . $this->jenis . '%')->paginate($this->show);
        }elseif(is_string($this->show) && $this->kategoriCari == 'jenis'){
            $fasyankes = ModelsFasyankes::where('jenis', 'like', '%' . $this->jenis . '%')->get();
        }
        return view('livewire.fasyankes.fasyankes',[
                'fasyankess' => $fasyankes,
               
        ]);
    }
}
