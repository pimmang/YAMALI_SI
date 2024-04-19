<?php

namespace App\Livewire;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use Livewire\Component;

class IkTptBalitaForm extends Component
{
    public $provinsi;
    public $kabupaten;
    public $kabupaten_id;
    public $kecamatan;
    public $kabupaten_form = '7302';
    public function render()
    {
        if($this->kabupaten_id || $this->kabupaten_form){
            if($this->kabupaten_id){
                $this->kecamatan = District::where('regency_id', $this->kabupaten_id)->get();
            }else{
                $this->kecamatan = District::where('regency_id', $this->kabupaten_form)->get();
            }
          
        }
        $this->provinsi = Province::find(27);
        $this->kabupaten = Regency::where('province_id',73)->get();
        return view('livewire.ik-tpt-balita-form');
    }
}
