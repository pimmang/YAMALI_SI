<?php

namespace App\Livewire\IkRumahTangga;

use App\Models\IKRumahTangga as IkrumahTanggaModels;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IkRumahTangga extends Component
{
    use WithPagination;
    public $status = 'list';
    public $statusPage = 'ik-rumah-tangga';
    public $show = 10;
    // public $state ='details';
    public $details;
    public $edits;
    public $kabupaten;
    public $kecamatan;
    public $provinsi;
    public $kader;
    public $deleted = false;
    public $data;



    public function list()
    {
        $this->status = 'list';
    }

    public function form()
    {
        $this->status = 'form';
    }

    #[On('irtDeleted')]
    public function irtDeleted()
    {
        $this->dispatch('$refresh');
        $this->dispatch('sukses', message: 'Data IKRT berhasil dihapus');
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
        $query = IkrumahTanggaModels::query();
        if ($this->tanggalMulai && $this->tanggalAkhir) {
            $query->whereBetween('created_at', [$this->tanggalMulai, $this->tanggalAkhir]);
        }
        if ($this->cari) {
            if (is_numeric($this->cari)) {
                $query->whereHas('index', function ($query) {
                    $query->where('nik_index', 'like', '%' . $this->cari . '%');;
                });
            } else {
                $query->whereHas('index', function ($query) {
                    $query->where('nama_pasien', 'like', '%' . $this->cari . '%');;
                });
            }
        }

        if (Auth::user()->hasRole('ssr')) {
            $query->whereHas('index', function ($query) {
                $query->where('ssr_id', Auth::user()->ssr->id);
            });
        }
        // Paginate the results
        $data = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('livewire.ik-rumah-tangga.ik-rumah-tangga', [
            'datas' => $data,
        ]);
    }
}
