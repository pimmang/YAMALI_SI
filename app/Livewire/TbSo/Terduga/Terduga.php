<?php

namespace App\Livewire\TbSo\Terduga;

use App\Livewire\Component\LoadingStatus;
use App\Livewire\Component\ToastHapus;
use App\Models\IKRumahTangga;
use App\Models\Kontak;
use App\Models\Terduga as ModelsTerduga;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Terduga extends Component
{

    use WithPagination;
    public $status = 'list';
    public $statusPage = 'terduga';
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
    public $hapusId;
    public $editId;


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
        $this->state = 'edit';
        $this->editId = $id;
    }

    #[On('close')]
    public function close()
    {
        $this->state = null;
    }

    #[On('hapus')]
    public function hapusTerduga()
    {
        $terduga = ModelsTerduga::find($this->hapusId);
        $kontak = Kontak::find($terduga->kontak_id);
        $kontak->terduga = 0;
        $kontak->update();
        $terduga->delete();
        $this->dispatch('sukses', message: 'Data terduga berhasil dihapus');
    }

    public function hapus($id)
    {
        $this->hapusId = $id;
        $this->dispatch('hapusTerduga');
        $this->dispatch('hapusData', id: $id, status: '')->to(ToastHapus::class);
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

        $query = ModelsTerduga::query();
        if ($this->tanggalMulai && $this->tanggalAkhir) {
            $query->whereBetween('created_at', [$this->tanggalMulai, $this->tanggalAkhir]);
        }
        if ($this->cari) {
            if (is_numeric($this->cari)) {
                $query->whereHas('kontak', function ($query) {
                    $query->where('nik_kontak', 'like', '%' . $this->cari . '%');;
                });
            } else {
                $query->whereHas('kontak', function ($query) {
                    $query->where('nama', 'like', '%' . $this->cari . '%');;
                });
            }
        }

        $query->where(function ($query) {
            $query->where('tipe_pemeriksaan', 'BTA -')
                ->orwhere('tipe_pemeriksaan', 'CXR -')
                ->orwhere('tipe_pemeriksaan', 'Extra Paru -')
                ->orwhere('tipe_pemeriksaan', 'Rontgen -')
                ->orwhere('tipe_pemeriksaan', 'TCM -');
        });

        if (Auth::user()->hasRole('ssr')) {
            $query->whereHas('kontak', function ($query) {
                $query->whereHas('iKRumahTangga', function ($query) {
                    $query->whereHas('index', function ($query) {
                        $query->where('ssr_id', Auth::user()->ssr->id);
                    });
                })->orWhereHas('iKNRumahTangga', function ($query) {
                    $query->whereHas('index', function ($query) {
                        $query->where('ssr_id', Auth::user()->ssr->id);
                    });
                });
            });
        }

        $data = $query->orderBy('created_at', 'desc')->paginate(10);
        $this->dispatch('loadingStop')->to(LoadingStatus::class);
        return view('livewire.tb-so.terduga.terduga', [
            'datas' => $data,
        ]);
    }
}
