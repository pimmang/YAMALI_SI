<?php

namespace App\Livewire\IkNonRumahTangga;

use App\Livewire\Fasyankes\Fasyankes;
use App\Models\District;
use App\Models\Fasyankes as ModelsFasyankes;
use App\Models\IKRumahTangga;
use App\Models\Kader;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Ssr;
use Carbon\Carbon;
use Livewire\Component;

class IkNonRumahTanggaForm extends Component
{
    public $provinsi;
    public $kabupaten;
    public $kabupaten_id;
    public $kecamatan;
    public $kabupaten_form;
    public $fasyankes;
    public $cariFasyankes;
    public $hidden = true;
    public $memilih= false;
    public $tahunSemester;
    public $fasyanId;
    public $hasil;
    public $ikrt;
    public $ssrs;
    public $ssrPilihan;
    public $kaders;

    public $tahun;

    public function mount(){
        $this->tahun = Carbon::now();
        $this->tahunSemester = $this->tahun->year.'-1';
        // $this->ikrt = IKRumahTangga::where('id', 89)->first();
        $this->ssrs = Ssr::get();

    }

    public function fasyanPilihan($id){
        // dd('ya');
        $fasyankes = ModelsFasyankes::find($id);
        $this->cariFasyankes = $fasyankes->nama_fasyankes;
        $this->fasyanId = $fasyankes->id;
        $this->hidden = true;
        $this->ikrt = null;
    }

    public function updatedKabupatenId(){ 
        $this->kecamatan = District::where('regency_id', $this->kabupaten_id)->get();
        $this->fasyankes = ModelsFasyankes::where('regency_id', $this->kabupaten_id)->get();
        $this->hidden = true;
        $this->ikrt = null;
    }

    public function updatedKabupatenForm(){
        $this->kecamatan = District::where('regency_id', $this->kabupaten_form)->get();
    }

    public function updatedTahunSemester(){
        $this->ikrt = null;
    }
    
    public function resetIkrt(){
        $this->ikrt = null;
    }
    public function updatedCariFasyankes(){
            // dd($this->ikrt);
            
            $this->fasyankes = ModelsFasyankes::where(function($query) {
                $query->where('nama_fasyankes', 'like', '%' . $this->cariFasyankes . '%')
                    ->orWhere('kode_fasyankes', 'like', '%' . $this->cariFasyankes . '%');
            })
            ->where('regency_id', $this->kabupaten_id)
            ->get();
            $this->hidden = false;
           
    }

    public function ikrtPilihan($id){
        $this->ikrt = IKRumahTangga::find($id);
        $this->ssrPilihan = $this->ikrt->ssr_id;
    }

    public function render()
    {
       
        $this->provinsi = Province::find(27);
        $this->kabupaten = Regency::where('province_id',73)->get();

        $array = explode("-", $this->tahunSemester);
        if($this->fasyanId){
            $this->hasil = IKRumahTangga::where('fasyankes_id', $this->fasyanId)->where('semester_index', $array[1])->where('tahun_index', $array[0])->get();
        }

        if($this->ssrPilihan){
            $this->fasyankes = ModelsFasyankes::where('ssr_id', $this->ssrPilihan)->get();
            $this->kaders = Kader::where('ssr_id',$this->ssrPilihan)->where('status', 'Aktif')->get();
        }

        return view('livewire.ik-non-rumah-tangga.ik-non-rumah-tangga-form');
    }
}
