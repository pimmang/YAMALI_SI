<?php

namespace App\Livewire\Index;

use App\Livewire\Component\ToastHapus;
use App\Models\Index;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListIndex extends Component
{
    use WithPagination;
    public $status = 'list';
    public $statusPage = 'index';
    public $show = 10;
    public $state;
    public $details;
    public $edits;
    public $kabupaten;
    public $kecamatan;
    public $provinsi;
    public $kader;
    public $deleted = false;
    public $data;
    public $jumlahIKRT;
    public $jumlahIndex;
    public $jumlahIKNRT;
    public $belumIK;

    public $filteredData;



    public function mount()
    {

        $query = Index::query();

        if (Auth::user()->hasRole('ssr')) {
            $query->where('ssr_id', Auth::user()->ssr->id);
        }

        $this->jumlahIndex = $query->count();
        $this->jumlahIKRT =  $query->whereHas('iKRumahTangga')->count();
        $this->jumlahIKNRT =  $query->whereHas('iKNRumahTangga')->count();
        $this->belumIK =  $query->doesntHave('iKRumahtangga')->doesntHave('iKNRumahtangga')->count();
    }
    public function list()
    {
        $this->status = 'list';
    }

    public function edit($id)
    {
        $this->state = 'edit';
        $this->edits = Index::find($id);
    }

    public function detail($id)
    {
        $this->state = 'details';
        $this->details = Index::find($id);
    }

    public function hapus($id)
    {
        // dd($id);
        $this->dispatch('hapusData', id: $id, status: 'index')->to(ToastHapus::class);
        $this->dispatch('hapusIndex');
    }



    #[On('close')]
    public function close()
    {
        $this->state = null;
    }

    public function form()
    {
        $this->status = 'form';
    }
    public function hubungan($id)
    {
        // dd('ya');
        $this->dispatch('hubungan', id: $id);
        $this->state = 'hubungan';
    }

    #[On('indexDeleted')]
    public function indexDeleted()
    {
        $this->dispatch('$refresh');
        $this->dispatch('sukses', message: 'Data Index berhasil dihapus');
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

        $this->resetPage();
    }
    public function render()
    {
        // Check if a query exists; if not, default to all data with ordering
        // Build the query in render based on the filter parameters
        $query = Index::query();
        if ($this->tanggalMulai && $this->tanggalAkhir) {
            $query->whereBetween('created_at', [$this->tanggalMulai, $this->tanggalAkhir]);
        }
        if ($this->cari) {
            if (is_numeric($this->cari)) {
                $query->where('nik_index', 'like', '%' . $this->cari . '%');
            } else {
                $query->where('nama_pasien', 'like', '%' . $this->cari . '%');
            }
        }

        if (Auth::user()->hasRole('ssr')) {
            $query->where('ssr_id', Auth::user()->ssr->id);
        }
        // Paginate the results
        $data = $query->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.index.list-index', [
            'datas' => $data,
        ]);
    }
}
