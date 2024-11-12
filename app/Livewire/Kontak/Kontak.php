<?php

namespace App\Livewire\Kontak;

use App\Livewire\IkRumahTangga\IkRumahTangga;
use App\Models\Kontak as ModelsKontak;
use Livewire\Component;

use Livewire\Attributes\On;

class Kontak extends Component
{
    public $idIndex;
    public $state;
    public $idKontak;
    public $editId;
    public $rujuk = 1;
    public $kunjung = 0;
    public $kontaks;
    public $status;

    public function mount($id, $status)
    {
        $this->idIndex = $id;
        $this->status = $status;
        if ($status == 'ikrt') {
            $this->kontaks = ModelsKontak::where('i_k_rumah_tangga_id', $id)->get();
        }
        if ($status == 'iknrt') {
            $this->kontaks = ModelsKontak::where('i_k_n_rumah_tangga_id', $id)->get();
        }
    }


    public function tambah()
    {
        $this->state = "tambah";
        $this->dispatch('openTambahKontak')->to(TambahKontak::class);
    }

    #[On('close')]
    public function close()
    {
        $this->state = null;
    }
    #[On('edit')]
    public function edit($id)
    {
        // dd('ya');
        $this->state = 'edit';
        $this->editId = $id;
    }
    #[On('hapusKontak')]
    public function deleteKontak()
    {
        $this->kontaks = ModelsKontak::where('i_k_rumah_tangga_id', $this->idIndex)->get();
        $this->dispatch('sukses', message: 'Kontak berhasil dihapus')->self();
    }
    public function render()
    {
        return view('livewire.kontak.kontak');
    }
}
