<?php

namespace App\Livewire\TbSo\Terduga;

use Livewire\Component;
use App\Models\District;
use App\Models\Fasyankes;
use App\Models\Kader;
use App\Models\Kontak;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Ssr;
use Carbon\Carbon;
use Livewire\Attributes\On;


class TerdugaForm extends Component
{
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

    #[On('data')]
    public function data($id){
        $this->data = Kontak::find($id);
        if($this->data->iKRumahTangga){
            $this->ssrPilihan = $this->data->iKRumahTangga->index->ssr_id;
        }else{
            $this->ssrPilihan = $this->data->iKNRumahTangga->index->ssr_id;
        }
        $this->fasyankesIdPilihan = $this->data->fasyankes_id;
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
            $this->fasyankes = Fasyankes::where('ssr_id', $this->ssrPilihan)->get();
            $this->kaders = Kader::where('ssr_id',$this->ssrPilihan)->where('status', 'Aktif')->get();
        }

        return view('livewire.tb-so.terduga.terduga-form',[
            'ssrs' => $ssrs,
        ]);
    }
}
