<?php

namespace App\Livewire\Kontak;

use App\Livewire\Component\ToastHapus;
use App\Livewire\Kontak\Kontak as KontakKontak;
use App\Models\Kontak;
use Illuminate\Database\Console\Migrations\RefreshCommand;
use Livewire\Component;
use Livewire\Attributes\On;

class ListKontak extends Component
{

    public $id;
    public $rujuk;
    public $kunjung;
    public $gagal;
    public $message;
    public $kontak;
    public function mount($kontak)
    {
        $this->kontak = $kontak;
        $this->id = $kontak->id;
        $this->rujuk = $kontak->rujukan;
        $this->kunjung = $kontak->kunjungan;
    }

    public function updatedRujuk($value)
    {
        $kontak = Kontak::find($this->id);
        $kontak->rujukan = $value;
        if ($value == 1) {
            $this->dispatch('kunjungan')->self();
        }
        $kontak->update();
        if ($value == 1) {

            $this->dispatch('sukses', message: 'Status kontak telah dirujuk')->to(KontakKontak::class);
        } else {
            $this->dispatch('sukses', message: 'Status kontak diubah ke belum dirujuk')->to(KontakKontak::class);
        }
    }
    public function updatedKunjung($value)
    {
        if ($this->rujuk == 1) {
            $this->dispatch('gagalKunjung')->self();
        } else {
            $kontak = Kontak::find($this->id);
            $kontak->kunjungan = $value;
            $kontak->update();

            if ($value == 1) {
                $this->dispatch('sukses', message: 'Status kontak telah dikunjungi')->to(KontakKontak::class);
            } else {
                $this->dispatch('sukses', message: 'Status kontak diubah ke belum dikunjungi')->to(KontakKontak::class);
            }
        }
    }
    #[On('kunjungan')]
    public function kunjungan()
    {
        $kontak = Kontak::find($this->id);
        $kontak->kunjungan = 1;
        $kontak->update();
        $this->kunjung = 1;
        $this->render();
    }

    #[On('gagalKunjung')]
    public function gagal()
    {
        $this->kunjung = 1;
        $this->dispatch('gagal', message: 'Tidak dapat mengubah, kontak telah dirujuk')->to(KontakKontak::class);
    }

    public function hapus($id)
    {
        $this->dispatch('hapusData', id: $id, status: 'kontak')->to(ToastHapus::class);
        $this->dispatch('tampilHapus')->to(KontakKontak::class);
    }

    public function edit($id)
    {
        $this->dispatch('edit', id: $id)->to(KontakKontak::class);
        $this->dispatch('editKontak')->to(EditKontak::class);
    }



    public function render()
    {

        return view('livewire.kontak.list-kontak');
    }
}
