<?php

namespace App\Livewire\Fasyankes;

use App\Livewire\Component\FilterData;
use App\Livewire\Component\LoadingStatus;
use App\Models\Fasyankes as ModelsFasyankes;
use App\Models\IKRumahTangga;
use App\Models\Ssr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Fasyankes extends Component
{
    use WithPagination;
    public $status = 'list';
    public $show = 10;
    public $nama = '';
    public $kode = '';
    public $ssrCari;
    public $kecamatan = '';
    public $jenis = '';
    public $kategoriCari = 'nama';
    public $sr = 'sulawesi selatan';
    public $statusPage = 'fasyankes';
    public $state;
    public $edits;
    public $details;

    public $ssrs;

    public function mount()
    {
        $this->ssrs = Ssr::get();
    }




    public function list()
    {
        $this->status = 'list';
    }
    public function form()
    {
        $this->status = 'form';
    }

    public function edit($id)
    {
        $this->edits = ModelsFasyankes::find($id);
        $this->state = 'edit';
    }
    public $detailId;
    public function detail($id)
    {
        $this->details = ModelsFasyankes::find($id);
        $this->state = 'details';
    }

    #[On('close')]
    public function close()
    {
        $this->state = null;
    }

    public $hapusId;
    public function hapus($id)
    {
        // dd($id);
        $this->hapusId = $id;
    }

    #[On('hapus')]
    public function HapusData()
    {

        $fasyankes = ModelsFasyankes::find($this->hapusId);
        if ($fasyankes->iKRumahTangga()->exists() || $fasyankes->iKNRumahTangga()->exists() || $fasyankes->kontak()->exists()) {
            $this->dispatch('gagal', message: 'Data digunakan di data lain');
        } else {
            $fasyankes->delete();
            $this->dispatch('sukses', message: 'Data fasyankes berhasil dihapus')->self();
            $this->hapusId = null;
        }
    }

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
      
        $query = ModelsFasyankes::query();

        if ($this->tanggalMulai && $this->tanggalAkhir) {
            $query->whereBetween('created_at', [$this->tanggalMulai, $this->tanggalAkhir]);
        }
        if ($this->cari) {
            $query->where(function ($query) {
                $query->where('nama_fasyankes', 'like', '%' . $this->cari . '%')
                    ->orWhere('kode_fasyankes', 'like', '%' . $this->cari . '%');
            });
        }

        if (Auth::user()->hasRole('ssr')) {
            $query->where('ssr_id', Auth::user()->ssr->id);
        }
        // Paginate the results
        $data = $query->orderBy('created_at', 'desc')->paginate(10);

        $this->dispatch('loadingStop')->to(LoadingStatus::class);
        return view('livewire.fasyankes.fasyankes', [
            'fasyankess' => $data,

        ]);
    }
}
