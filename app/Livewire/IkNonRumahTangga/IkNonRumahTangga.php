<?php

namespace App\Livewire\IkNonRumahTangga;

use App\Livewire\Component\LoadingStatus;
use App\Models\IKNRumahTangga;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class IkNonRumahTangga extends Component
{
    use WithPagination;
    public $statusPage = 'ik-non-rumah-tangga';
    public $status = 'list';

    public $show;
    public function list()
    {
        $this->status = 'list';
    }
    public function form()
    {
        $this->status = 'form';
    }

    #[On('iknrtDeleted')]
    public function iknrtDeleted()
    {
        $this->dispatch('$refresh');
        $this->dispatch('sukses', message: 'Data IKNRT berhasil dihapus');
    }

    #filter
    public $tanggalMulai;
    public $tanggalAkhir;
    public $cari;
    public $cariStatus = false;
    #[On('filter')]
    public function filter($tanggalMulai, $tanggalAkhir, $cari)
    {
        // Store the filter inputs instead of the query itself
        $this->tanggalMulai = $tanggalMulai;
        $this->tanggalAkhir = $tanggalAkhir;
        $this->cari = $cari;
        $this->cariStatus = true;
        $this->resetPage();
    }
    #[On('cariStatus')]
    public function stop()
    {
        // $this->dispatch('loadingStop')->to(LoadingStatus::class);
        $this->cariStatus = false;
    }
    public function render()
    {

        $query = IKNRumahTangga::query();
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
        $this->dispatch('stopLoading')->self();
        return view('livewire.ik-non-rumah-tangga.ik-non-rumah-tangga', [
            'datas' => $data,
        ]);
    }
}
