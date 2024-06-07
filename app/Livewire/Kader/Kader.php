<?php

namespace App\Livewire\Kader;

use App\Models\District;
use Livewire\Attributes\On;
use App\Models\Kader as ModelsKader;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Ssr;
use Livewire\Component;

class Kader extends Component
{
    
    
    // filter variabel
    public $status = 'list';
    public $show;
    public $nama ='';
    public $nik ='';
    public $ssrs;
    public $kecamatanFilter ='';
    public $jenis ='';
    public $kategoriCari = 'nama';
    public $sr = 'sulawesi selatan';
    public $statusPage = 'kader';


    // detail variabel
    public $detailNama;
    public $detailNik;
    public $detailTelepon;
    public $detailUmur;
    public $detailKelamin;
    public $detailProvinsi;
    public $detailKabupaten;
    public $detailKecamatan;
    public $detailSr;
    public $detailSsr;
    public $detailJenis;
    public $detailStatus;

    // state
    public $state ;

    // // edit variabel
    public $provinsi;
    public $kabupaten;
    public $kabupaten_id;
    public $kecamatan;
    public $kaderEdit;
    public function edit($id){
        $this->state = 'edit';
        $this->kaderEdit = ModelsKader::where('id', $id)->first();
        $this->kabupaten_id = $this->kaderEdit->regency_id;
    }

    public $hapusId;
    public function hapus($id){
    // dd($id);
       $this->hapusId = $id;
    }

    #[On('hapus')] 
    public function HapusData()
    {
        $kader = ModelsKader::find($this->hapusId);
        $kader->delete();
        session()->flash('kader', 'Data kader berhasil dihapus');
        $this->hapusId = null;
        return redirect('/kader');
    }

    public function mount(){
        $this->show = 10;
        $this->ssrs = Ssr::get();
    }

    public function detail($id){
        $this->state = 'details';
        $kader = ModelsKader::where('id', $id)->first();
        $this->detailNama = $kader->nama;
        $this->detailNik = $kader->nik;
        $this->detailTelepon = $kader->nomor_telepon;
        $this->detailUmur = $kader->umur;
        $this->detailKelamin = $kader->jenis_kelamin;
        $this->detailProvinsi = $kader->province->name;
        $this->detailKabupaten = $kader->regency->name;
        $this->detailKecamatan = $kader->district->name;
        $this->detailSr = $kader->sr;
        $this->detailSsr = $kader->ssr->nama;
        $this->detailJenis = $kader->jenis;
        $this->detailStatus = $kader->status;
    }

    public function updateSymbolDetail(){
        $this->dispatch('kader');
    }
    
    public function close(){
        $this->state = null;
    }

    public function list(){
        $this->status = 'list';
    }
    public function form(){
        $this->status = 'form';
    }
    
    public function render()
    {
    //    filter
        if(is_numeric($this->show) && $this->kategoriCari == 'nama'){
            $kaders = ModelsKader::where('nama', 'like', '%' . $this->nama . '%')->paginate($this->show);
        }elseif(is_string($this->show) && $this->kategoriCari == 'nama'){
            $kaders = ModelsKader::where('nama', 'like', '%' . $this->nama . '%')->get();
        }elseif(is_numeric($this->show)&& $this->kategoriCari == 'nik') {
            $kaders = ModelsKader::where('nik', 'like', '%' . $this->nik . '%')->paginate($this->show);
        }elseif(is_string($this->show) && $this->kategoriCari == 'nik'){
            $kaders= ModelsKader::where('nik', 'like', '%' . $this->nik . '%')->get();
        }elseif(is_numeric($this->show)&& $this->kategoriCari == 'ssr') {
            $kaders = ModelsKader::where('ssr', 'like', '%' . $this->ssr . '%')->paginate($this->show);
        }elseif(is_string($this->show) && $this->kategoriCari == 'ssr'){
            $kaders = ModelsKader::where('ssr', 'like', '%' . $this->ssr . '%')->get();
        }elseif(is_numeric($this->show)&& $this->kategoriCari == 'kecamatan') {
            $kaders = ModelsKader::where('kecamatan', 'like', '%' . $this->kecamatan . '%')->paginate($this->show);
        }elseif(is_string($this->show) && $this->kategoriCari == 'kecamatan'){
            $kaders = ModelsKader::where('kecamatan', 'like', '%' . $this->kecamatan . '%')->get();
        }elseif(is_numeric($this->show)&& $this->kategoriCari == 'jenis') {
            $kaders = ModelsKader::where('jenis', 'like', '%' . $this->jenis . '%')->paginate($this->show);
        }elseif(is_string($this->show) && $this->kategoriCari == 'jenis'){
            $kaders = ModelsKader::where('jenis', 'like', '%' . $this->jenis . '%')->get();
        }

    
        $ssr = Ssr::get();
        if($this->kabupaten_id){
            $this->kecamatan = District::where('regency_id', $this->kabupaten_id)->get();
        }
        $this->provinsi = Province::find(27);
        $this->kabupaten = Regency::where('province_id',73)->get();
        return view('livewire.kader.kader',[
            'kaders' => $kaders,
            'ssrs' => 'ssr',
            
            // 'kabupaten' => $this->kabupatenEdit,
            // 'provinsi' => $this->provinsiEdit,
        ]);
    }
}
