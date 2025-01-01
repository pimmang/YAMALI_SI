<?php

namespace App\Livewire\Index;

use App\Models\District;
use App\Models\Fasyankes;
use App\Models\Index;
use App\Models\Regency;
use App\Models\Ssr;
use Carbon\Carbon;
use Livewire\Component;

class EditIndex extends Component
{
    public $details;
    public $provinsi;
    public $kabupaten;
    public $kabupaten_id;
    public $kecamatan;
    public $tglLahir;
    public $umur;
    public $kecamatanPilihan;
    // public $kaders;
    public $fasyankes;
    public $tahun;
    public $nik;
    public $message;
    public $oldNik;

    public $isChange ;
    public $originalData = [];
public $formData = [];


    public function mount($data)
    {
        $this->details = $data;
        $this->nik = $data->nik_index;
        $this->oldNik = $this->nik;
        $this->tahun = Carbon::now()->year;
        $this->kabupaten_id = $data->regency_id;
        $this->kecamatanPilihan = $data->district_id;
    }

    public function close()
    {
        $this->dispatch('close')->to(ListIndex::class);
    }
    public function updatedNik()
    {

        if ($this->nik !== $this->oldNik) {
            $index = Index::where('nik_index', $this->nik)->first();

            if ($index) {
                $this->dispatch('gagal', message: 'NIK sudah terdaftar')->to(ListIndex::class);
                $this->message = 'NIK sudah terdaftar';
            } else {
                $this->message = '';
            }
        } else {
            // Jika NIK sama dengan yang lama, pesan validasi dikosongkan
            $this->message = '';
        }
    }
    public function render()
    {

        if ($this->kabupaten_id) {
            $this->kecamatan = District::where('regency_id', $this->kabupaten_id)->get();
        }
        // $this->provinsi = Province::find(27);
        $this->kabupaten = Regency::where('province_id', 73)->get();
        $ssrs = Ssr::get();

        if ($this->kecamatanPilihan) {
            $this->fasyankes = Fasyankes::where('district_id', $this->kecamatanPilihan)->get();
        }
        return view('livewire.index.edit-index', [
            'ssrs' => $ssrs,
        ]);
    }
}
