<?php

namespace App\Livewire\Fasyankes;

use App\Models\District;
use App\Models\Fasyankes as ModelsFasyankes;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Ssr;
use Livewire\Component;

class FasyankesForm extends Component
{
    public $provinsi;
    public $kabupaten;
    public $kabupaten_id;
    public $kecamatan;
    public $kodeFasyankes;
    public $message;
    public function updatedKodeFasyankes()
    {
        $fasyankes = Modelsfasyankes::where('kode_fasyankes', $this->kodeFasyankes)->first();
        if ($fasyankes) {
            $this->dispatch('gagal', message: 'Fasyankes sudah terdaftar')->to(Fasyankes::class);
            $this->message = 'Kode fasyankes sudah terdaftar';
        } else {
            $this->message = '';
        }
    }
    public function render()
    {
        $ssr = Ssr::get();
        if ($this->kabupaten_id) {
            $this->kecamatan = District::where('regency_id', $this->kabupaten_id)->get();
        }
        $this->provinsi = Province::find(27);
        $this->kabupaten = Regency::where('province_id', 73)->get();
        return view('livewire.fasyankes.fasyankes-form', [
            'ssrs' => $ssr,
        ]);
    }
}
