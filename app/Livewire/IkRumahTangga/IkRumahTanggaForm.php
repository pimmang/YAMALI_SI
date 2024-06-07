<?php

namespace App\Livewire\IkRumahTangga;

use App\Models\District;
use App\Models\Fasyankes;
use App\Models\Kader;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Ssr;
use Carbon\Carbon;
use Livewire\Component;

class IkRumahTanggaForm extends Component
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
        }
        
        if($this->ssrPilihan){
            $this->kaders = Kader::where('ssr_id',$this->ssrPilihan)->where('status', 'Aktif')->get();
         }
        return view('livewire.ik-rumah-tangga.ik-rumah-tangga-form',[
            'ssrs' => $ssrs,
        ]);
    }
}
