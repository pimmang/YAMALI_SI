<?php

namespace App\Livewire\IkNonRumahTangga;

use App\Livewire\Fasyankes\Fasyankes;
use App\Models\District;
use App\Models\Fasyankes as ModelsFasyankes;
use App\Models\IKRumahTangga;
use App\Models\Index;
use App\Models\Kader;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Ssr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IkNonRumahTanggaForm extends Component
{
    public $provinsi;
    public $kabupaten;
    public $kabupaten_id;
    public $kecamatan;
    public $kecamatan_id;
    public $kabupaten_form;
    // public $fasyankes_form;
    public $fasyankes;
    public $fasyankess;
    public $cariFasyankes;
    public $hidden = true;
    public $memilih = false;
    public $tahunSemester;
    public $fasyanId;
    public $hasil;
    public $index;
    public $ssrs;
    public $ssrPilihan;
    public $kaders;

    public $tahun;

    public function mount()
    {
        $this->tahun = Carbon::now();
        $bulan = date('m'); // Mengambil bulan saat ini, bisa juga diganti sesuai kebutuhan

        // dd($bulan)
        if ($bulan >= 1 && $bulan <= 6) {
            $this->tahunSemester = $this->tahun->year . '-1'; // Semester 1
        } else {
            $this->tahunSemester = $this->tahun->year . '-2'; // Semester 2
        }
    }

    public function fasyanPilihan($id)
    {
        // dd('ya');
        $fasyankes = ModelsFasyankes::find($id);
        $this->cariFasyankes = $fasyankes->nama_fasyankes;
        $this->fasyanId = $fasyankes->id;
        $this->hidden = true;
        $this->index = null;
    }

    public function updatedKabupatenId()
    {
        $this->kecamatan = District::where('regency_id', $this->kabupaten_id)->get();
        $this->fasyankes = ModelsFasyankes::where('regency_id', $this->kabupaten_id)->get();
        $this->hidden = true;
        $this->index = null;
    }

    public function updatedKabupatenForm()
    {
        $this->kecamatan = District::where('regency_id', $this->kabupaten_form)->get();
    }

    public function updatedTahunSemester()
    {
        $this->index = null;
    }

    public function resetIndex()
    {
        $this->index = null;
    }
    public function updatedCariFasyankes()
    {

        $this->fasyankes = ModelsFasyankes::where(function ($query) {
            $query->where('nama_fasyankes', 'like', '%' . $this->cariFasyankes . '%')
                ->orWhere('kode_fasyankes', 'like', '%' . $this->cariFasyankes . '%');
        })
            ->where('regency_id', $this->kabupaten_id)
            ->get();
        $this->hidden = false;
    }

    public function indexPilihan($id)
    {
        $this->index = Index::find($id);
        $this->kecamatan_id = $this->index->district_id;
        $this->fasyankess = ModelsFasyankes::where('ssr_id', $this->index->ssr_id)->get();
        $this->kaders = Kader::where('ssr_id', $this->index->ssr_id)->get();
    }

    public function render()
    {


        $this->kabupaten = Regency::where('province_id', 73)->get();
        $array = explode("-", $this->tahunSemester);
        if ($this->fasyanId) {
            if (Auth::user()->hasRole('ssr')) {
                $this->hasil = Index::where('fasyankes_id', $this->fasyanId)->where('semester_index', $array[1])->where('tahun_index', $array[0])->where('ssr_id', Auth::user()->ssr->id)->get();
            } elseif (Auth::user()->hasRole('sr')) {
                $this->hasil = Index::where('fasyankes_id', $this->fasyanId)->where('semester_index', $array[1])->where('tahun_index', $array[0])->get();
            }
        }

        if ($this->ssrPilihan) {
            $this->fasyankes = ModelsFasyankes::where('ssr_id', $this->ssrPilihan)->get();
            $this->kaders = Kader::where('ssr_id', $this->ssrPilihan)->where('status', 'Aktif')->get();
        }

        return view('livewire.ik-non-rumah-tangga.ik-non-rumah-tangga-form');
    }
}
