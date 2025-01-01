<?php

namespace App\Livewire\Fasyankes;

use App\Models\District;
use App\Models\Fasyankes as modelsFasyankes;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Ssr;
use Livewire\Component;

class FasyankesEdit extends Component
{
    public $provinsi;
    public $kabupaten;
    public $kabupaten_id;
    public $kecamatan;
    public $edits;
    public $kodeFasyankes;
    public $oldKode;
    public $message;
    public function mount($data)
    {
        $this->edits = $data;
        $this->kabupaten_id = $data->regency_id;
        $this->kodeFasyankes = $data->kode_fasyankes;
        $this->oldKode =  $data->kode_fasyankes;
    }
    public function close()
    {
        $this->dispatch('close')->to(Fasyankes::class);
    }

    public function updatedKodeFasyankes()
    {
        if ($this->kodeFasyankes !== $this->oldKode) {
            $fasyankes= Modelsfasyankes::where('kode_fasyankes', $this->kodeFasyankes)->first();
            if ($fasyankes) {
                $this->dispatch('gagal', message: 'Fasyankes sudah terdaftar')->to(Fasyankes::class);
                $this->message = 'Kode fasyankes sudah terdaftar';
            } else {
                $this->message = '';
            }
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
        return view('livewire.fasyankes.fasyankes-edit', [
            'ssrs' => $ssr,
        ]);
    }
}
