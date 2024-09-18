<?php

namespace App\Livewire\IkNonRumahTangga;

use Livewire\Component;
use App\Models\District;
use App\Models\Fasyankes;
use App\Models\Kader;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Ssr;
use Carbon\Carbon;
class IkNonRumahTanggaEdit extends Component
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
    // public $notChange = true;
    public $details;
    public function mount($data){
        $this->details = $data ;
        $this->ssrPilihan = $data->index->ssr_id;
        $this->kabupaten_id = $data->regency_id;
        $this->tglLahir = $data->tanggal_lahir;
        // dd($this->details->index->ssr_id);
    }
    public function close(){
        $this->dispatch('close')->to(IkNonRumahTanggaList::class);
    }
    public function render()
    {
        if($this->tglLahir){
            $this->umur = Carbon::parse($this->tglLahir)->age;}
         if($this->kabupaten_id){
             $this->kecamatan = District::where('regency_id', $this->kabupaten_id)->get();
         }
         $this->provinsi = Province::find(27);
         $this->kabupaten = Regency::where('province_id',73)->get();
         $ssrs = Ssr::get();
         
         if($this->ssrPilihan){
             $this->kaders = Kader::where('ssr_id',$this->ssrPilihan)->where('status', 'Aktif')->get();
             $this->fasyankes = Fasyankes::where('ssr_id',$this->ssrPilihan)->get();
          }
        return view('livewire.ik-non-rumah-tangga.ik-non-rumah-tangga-edit',[
            'ssrs' => $ssrs,
        ]);
    }
}
