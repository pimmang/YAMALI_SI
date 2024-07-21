<?php

namespace App\Livewire\TbSo\Terduga;

use App\Livewire\Fasyankes\Fasyankes;
use App\Livewire\Kader\Kader;
use App\Livewire\TbSo\Terduga\Terduga as TerdugaTerduga;
use App\Models\District;
use App\Models\Fasyankes as ModelsFasyankes;
use App\Models\Kader as ModelsKader;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Ssr;
use App\Models\Terduga;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;

class EditTerduga extends Component
{

    public $dataTerduga;
    public $provinsi;
    public $kabupaten;
    public $kabupaten_id;
    public $kecamatan;
    public $tglLahir;
    public $umur;
    public $ssrPilihan;
    public $kaders;
    public $fasyankes;
    public $data;
    public $fasyankesIdPilihan;
    public $tipePemeriksaan;
    public $dataTernotifikasi;

   public function mount($id){
    $this->dataTerduga = Terduga::find($id);
    if($this->dataTerduga->kontak->iKRumahTangga){
        $this->ssrPilihan = $this->dataTerduga->kontak->iKRumahTangga->ssr_id;
    }else{
        $this->ssrPilihan = $this->dataTerduga->kontak->iKNRumahTangga->ssr_id;
    }
    $this->fasyankesIdPilihan = $this->dataTerduga->kontak->fasyankes_id;
    $this->tipePemeriksaan = $this->dataTerduga->tipe_pemeriksaan;
    if($this->dataTerduga->ternotifikasi){
        $this->dataTernotifikasi = $this->dataTerduga->ternotifikasi;
    }
   }

   public function close(){
    $this->dispatch('close');
   }
    

    public function render()
    {
        $this->umur = $this->tglLahir;
        if($this->tglLahir){
           $this->umur = Carbon::parse($this->tglLahir)->age;}
        if($this->kabupaten_id){
            $this->kecamatan = District::where('regency_id', $this->kabupaten_id)->get();
        }
        $this->provinsi = Province::find(27);
        $this->kabupaten = Regency::where('province_id',73)->get();
        $ssrs = Ssr::get();

        if($this->ssrPilihan){
            $this->fasyankes = ModelsFasyankes::where('ssr_id', $this->ssrPilihan)->get();
            $this->kaders = ModelsKader::where('ssr_id',$this->ssrPilihan)->where('status', 'Aktif')->get();
        }

        return view('livewire.tb-so.terduga.edit-terduga',[
            'ssrs' => $ssrs,
        ]);
    }
}
