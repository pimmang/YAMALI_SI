<?php

namespace App\Livewire\Kader;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Ssr;
use Livewire\Component;




class FormKader extends Component
{
    public $provinsi;
    public $kabupaten;
    public $kabupaten_id;
    public $kecamatan;
    public function render()
    {
        $ssr = Ssr::get();

        if($this->kabupaten_id){
            $this->kecamatan = District::where('regency_id', $this->kabupaten_id)->get();
        }
        $this->provinsi = Province::find(27);
        $this->kabupaten = Regency::where('province_id',73)->get();
        return view('livewire.kader.form-kader',[
            'ssrs' => $ssr,
        ]);
    }
}
