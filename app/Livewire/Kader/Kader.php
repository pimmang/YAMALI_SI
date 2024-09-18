<?php

namespace App\Livewire\Kader;

use App\Models\District;
use Livewire\Attributes\On;
use App\Models\Kader as ModelsKader;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Ssr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class Kader extends Component
{

    use WithPagination;
    // filter variabel
    public $status = 'list';
    public $show;
    public $nama = '';
    public $nik = '';
    public $ssrs;
    public $kecamatanFilter = '';
    public $jenis = '';
    public $kategoriCari = 'nama';
    public $sr = 'sulawesi selatan';
    public $statusPage = 'kader';



    // detail variabel
    public $detailNama;
    public $detailNik;
    public $detailTelepon;
    public $detailUmur;
    public $detailKelamin;
    public $detailProvinsi;
    public $detailKabupaten;
    public $detailKecamatan;
    public $detailSr;
    public $detailSsr;
    public $detailJenis;
    public $detailStatus;

    // state
    public $state;

    // // edit variabel
    public $provinsi;
    public $kabupaten;
    public $kabupaten_id;
    public $kecamatan;
    public $kaderEdit;
    public function edit($id)
    {
        $this->state = 'edit';
        $this->kaderEdit = ModelsKader::where('id', $id)->first();
        $this->kabupaten_id = $this->kaderEdit->regency_id;
    }


    // cari
    public $cariSsr;

    public $hapusId;
    public function hapus($id)
    {
        // dd($id);
        $this->hapusId = $id;
    }

    #[On('hapus')]
    public function HapusData()
    {


        $kader = ModelsKader::find($this->hapusId);
        if ($kader->iKRumahTangga()->exists() || $kader->iKNRumahTangga()->exists()) {
            $this->dispatch('gagal', message: 'Data digunakan di data lain')->self();
        } else {
            $kader->delete();
            $this->dispatch('sukses', message: 'Data berhasil dihapus')->self();
            $this->hapusId = null;
        }
    }

    public function mount()
    {
        $this->show = 10;
        $this->ssrs = Ssr::get();
    }

    public function detail($id)
    {
        $this->state = 'details';
        $kader = ModelsKader::where('id', $id)->first();
        $this->detailNama = $kader->nama;
        $this->detailNik = $kader->nik;
        $this->detailTelepon = $kader->nomor_telepon;
        $this->detailUmur = $kader->umur;
        $this->detailKelamin = $kader->jenis_kelamin;
        $this->detailProvinsi = $kader->province->name;
        $this->detailKabupaten = $kader->regency->name;
        $this->detailKecamatan = $kader->district->name;
        $this->detailSr = $kader->sr;
        $this->detailSsr = $kader->ssr->nama;
        $this->detailJenis = $kader->jenis;
        $this->detailStatus = $kader->status;
    }

    public function updateSymbolDetail()
    {
        $this->dispatch('kader');
    }

    public function close()
    {
        $this->state = null;
    }

    public function list()
    {
        $this->status = 'list';
    }
    public function form()
    {
        $this->status = 'form';
    }

    public function render()
    {
        //    filter
        $query = ModelsKader::query();

        if ($this->kategoriCari === 'nama') {
            $query->where('nama', 'like', '%' . $this->nama . '%');
        } elseif ($this->kategoriCari === 'nik') {
            $query->where('nik', 'like', '%' . $this->nik . '%');
        } elseif ($this->kategoriCari === 'ssr') {
            $query->whereHas('ssr', function ($query) {
                $query->where('nama', 'like', '%' . $this->cariSsr . '%');
            });
        } elseif ($this->kategoriCari === 'kecamatan') {
            $query->whereHas('district', function ($query) {
                $query->where('name', 'like', '%' . $this->kecamatan . '%');
            });
        } elseif ($this->kategoriCari === 'jenis') {
            $query->where('jenis', 'like', '%' . $this->jenis . '%');
        }
        if (Auth::user()->hasRole('ssr')) {
            $query->where('ssr_id', Auth::user()->ssr->id);
        }

        if (is_numeric($this->show)) {
            $kaders = $query->paginate($this->show);
        } else {
            $kaders = $query->get();
        }




        $ssr = Ssr::get();
        if ($this->kabupaten_id) {
            $this->kecamatan = District::where('regency_id', $this->kabupaten_id)->get();
        }
        $this->provinsi = Province::find(27);
        $this->kabupaten = Regency::where('province_id', 73)->get();
        return view('livewire.kader.kader', [
            'kaders' => $kaders,
            'ssrs' => 'ssr',

            // 'kabupaten' => $this->kabupatenEdit,
            // 'provinsi' => $this->provinsiEdit,
        ]);
    }
}
