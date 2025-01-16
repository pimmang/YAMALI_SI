<?php

namespace App\Livewire\TbSo\Ternotifikasi;

use App\Livewire\Component\LoadingStatus;
use App\Livewire\Component\ToastHapus;
use App\Models\Kontak;
use App\Models\Terduga;
use App\Models\Ternotifikasi as ModelsTernotifikasi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Ternotifikasi extends Component
{
    public $statusPage = 'ternotifikasi';
    use WithPagination;
    public $status = 'list';
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
    public $pengobatanId;
    public $pemantauanId;


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
        $this->editId = $id;
        $this->state = 'edit';
    }
    public function pengobatan($id)
    {
        $this->pengobatanId = $id;
        $this->state = 'pengobatan';
    }

    #[On('close')]
    public function close()
    {
        $this->state = null;
    }

    #[On('hapus')]
    public function hapusTerduga()
    {
        $terduga = Terduga::find($this->hapusId);
        $kontak = Kontak::find($terduga->kontak_id);
        $kontak->terduga = 0;
        $kontak->update();
        $terduga->delete();
        $this->dispatch('sukses', message: 'Data ternotifikasi berhasil dihapus');
    }

    public function hapus($id)
    {
        $this->hapusId = $id;
        $this->dispatch('hapusTerduga');
        $this->dispatch('hapusData', id: $id, status: '')->to(ToastHapus::class);
    }

    public function pemantauan($id)
    {
        $this->state = 'pemantauan';
        $this->pemantauanId = $id;
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
        $this->dispatch('loading')->to(LoadingStatus::class);
    }
    public function render()
    {

        // dd('ya');



        $query = ModelsTernotifikasi::query();
        if ($this->tanggalMulai && $this->tanggalAkhir) {
            $query->whereBetween('created_at', [$this->tanggalMulai, $this->tanggalAkhir]);
        }
        if ($this->cari) {
            if (is_numeric($this->cari)) {
                $query->whereHas('terduga', function ($query) {
                    $query->wherehas('kontak', function ($query) {
                        $query->where('nik_kontak', 'like', '%' . $this->cari . '%');
                    });
                });
            } else {
                $query->whereHas('terduga', function ($query) {
                    $query->wherehas('kontak', function ($query) {
                        $query->where('nama', 'like', '%' . $this->cari . '%');
                    });
                });
            }
        }
        if (Auth::user()->hasRole('ssr')) {
            $query->whereHas('terduga', function ($query) {
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
            });
        }

        $data = $query->orderBy('created_at', 'desc')->paginate(10);
       
            $this->dispatch('loadingStop')->to(LoadingStatus::class);
        

        return view('livewire.tb-so.ternotifikasi.ternotifikasi', [
            'datas' => $data,
        ]);
    }
}
