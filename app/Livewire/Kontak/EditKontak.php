<?php

namespace App\Livewire\Kontak;

use App\Livewire\Kontak\Kontak as KontakKontak;
use App\Models\Fasyankes;
use App\Models\Kontak;
use App\Models\Ssr;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;

class EditKontak extends Component
{
    public $idKontak;
    public $tglLahir;
    public $umur;
    public $ssrs;
    public $fasyankes;
    public $ssrPilihan;
    public $fasyankesIndex;
    public $kontak;
    public function mount($id)
    {
        $kontak =  Kontak::find($id);
        $this->kontak = $kontak;
        $this->fasyankesIndex = Kontak::find($id)->fasyankes_id;
        $this->tglLahir = $kontak->tgl_lahir;
        $this->ssrPilihan = $kontak->ssr_id;
        $this->idKontak = $id;
        $this->dispatch('openEditKontak')->self();
    }
    public function close()
    {
        $this->dispatch('close')->to(KontakKontak::class);
    }

    // #[On('editKontak')]
    // public function edit()
    // {

    // }

    public function render()
    {
        $this->ssrs = Ssr::get();
        if ($this->ssrPilihan) {
            $this->fasyankes = Fasyankes::where('ssr_id', $this->ssrPilihan)->get();
        }
        if ($this->tglLahir) {
            $this->umur = Carbon::parse($this->tglLahir)->age;
        }
        return view('livewire.kontak.edit-kontak');
    }
}
