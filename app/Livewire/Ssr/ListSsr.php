<?php

namespace App\Livewire\Ssr;

use App\Livewire\Component\ToastConfirm;
use App\Models\Ssr;
use App\Livewire\Ssr\Ssr as SsrSsr;
use App\Models\User;
use Livewire\Component;


class ListSsr extends Component
{

    public $status = 'list';
    public $statusPage = 'ssr';

    public $verifikasi;
    public $ssr;

    public $id;
    public function mount($ssr)
    {
        $this->ssr = $ssr;
        $this->id = $ssr->id;
        $this->verifikasi = $ssr->verifikasi;
        // $this->kunjung = $kontak->kunjungan;
    }

    public function cek()
    {
        $ssr = User::find($this->id);
        if ($ssr->verifikasi != $this->verifikasi) {
            $this->verifikasi = $ssr->verifikasi;
        }
    }
    public function updatedVerifikasi()
    {
        $this->dispatch('confirm')->to(SsrSsr::class);
        $this->dispatch('confirm', id: $this->id, value: $this->verifikasi)->to(ToastConfirm::class);
    }

    public function render()
    {


        return view('livewire.ssr.list-ssr');
    }
}
