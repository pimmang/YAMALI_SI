<?php

namespace App\Livewire\Kader;

use App\Livewire\Component\LoadingStatus;
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
        $this->nikEdit = $this->kaderEdit->nik;
        $this->oldNik = $this->nikEdit;
    }

    public $message;
    public $nikEdit;
    public $oldNik;
    public function updatedNikEdit()
    {

        if ($this->nikEdit !== $this->oldNik) {
            $kader = ModelsKader::where('nik', $this->nikEdit)->first();

            if ($kader) {
                $this->dispatch('gagal', message: 'NIK sudah terdaftar')->to(Kader::class);
                $this->message = 'NIK sudah terdaftar';
            } else {
                $this->message = '';
            }
        } else {
            // Jika NIK sama dengan yang lama, pesan validasi dikosongkan
            $this->message = '';
        }
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
        // $this->detailProvinsi = $kader->province->name;
        $this->detailKabupaten = $kader->regency->name;
        $this->detailKecamatan = $kader->district->name;
        // $this->detailSr = $kader->sr;
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


    #filter
    public $tanggalMulai;
    public $tanggalAkhir;
    public $cari;
    #[On('filter')]
    public function filter($tanggalMulai, $tanggalAkhir, $cari)
    {
        // Store the filter inputs instead of the query itself
        $this->tanggalMulai = $tanggalMulai;
        $this->tanggalAkhir = $tanggalAkhir;
        $this->cari = $cari;
        $this->dispatch('loading')->to(LoadingStatus::class);
        $this->resetPage();
    }
    public function render()
    {
       
        $query = ModelsKader::query();
        if ($this->tanggalMulai && $this->tanggalAkhir) {
            $query->whereBetween('created_at', [$this->tanggalMulai, $this->tanggalAkhir]);
        }
        if ($this->cari) {
            if (is_numeric($this->cari)) {
                $query->where('nik', 'like', '%' . $this->cari . '%');
            } else {
                $query->where('nama', 'like', '%' . $this->cari . '%');
            }
        }

        if (Auth::user()->hasRole('ssr')) {
            $query->where('ssr_id', Auth::user()->ssr->id);
        }
        // Paginate the results
        $data = $query->orderBy('created_at', 'desc')->paginate(10);
        $ssr = Ssr::get();
        if ($this->kabupaten_id) {
            $this->kecamatan = District::where('regency_id', $this->kabupaten_id)->get();
        }
        $this->provinsi = Province::find(27);
        $this->kabupaten = Regency::where('province_id', 73)->get();
        $this->dispatch('loadingStop')->to(LoadingStatus::class);
        return view('livewire.kader.kader', [
            'kaders' => $data,
            'ssrs' => $ssr,
        ]);
    }
}
