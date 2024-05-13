<?php

namespace App\Livewire\Kader;
use Livewire\Attributes\On;
use App\Models\Kader as ModelsKader;
use Livewire\Component;

class Kader extends Component
{

    public $status = 'list';
    public $show;
    public $nama ='';
    public $nik ='';
    public $ssr ='';
    public $kecamatan ='';
    public $jenis ='';
    public $kategoriCari = 'nama';
    public $sr = 'sulawesi selatan';
    public $statusPage = 'kader';

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

    public $details = false;


    public function mount(){
        $this->show = 10;
    }

    // #[On('termuat')]
    // public function refreshJs()
    // {
    //     $this->dispatch('kader');
    // }

    public function detail($id){
        $this->details = !$this->details;
        $kader = ModelsKader::where('id', $id)->first();
        $this->detailNama = $kader->nama;
        $this->detailNik = $kader->nik;
        $this->detailTelepon = $kader->nomor_telepon;
        $this->detailUmur = $kader->umur;
        $this->detailKelamin = $kader->jenis_kelamin;
        $this->detailProvinsi = $kader->provinsi;
        $this->detailKabupaten = $kader->kota_kabupaten;
        $this->detailKecamatan = $kader->kecamatan;
        $this->detailSr = $kader->sr;
        $this->detailSsr = $kader->ssr;
        $this->detailJenis = $kader->jenis;
        $this->detailStatus = $kader->status;
    }

    public function updateSymbolDetail(){
        $this->dispatch('kader');
    }
    
    public function close(){
        $this->details = !$this->details;
    }

    public function list(){
        $this->status = 'list';
    }
    public function form(){
        $this->status = 'form';
    }
    public function mounted()
    {
       
    }
    public function render()
    {
       
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

    
        
        return view('livewire.kader.kader',[
            'kaders' => $kaders,
        ]);
    }
}
