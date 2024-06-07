<?php

namespace App\Livewire\Kontak;

use App\Models\Fasyankes;
use App\Models\IKRumahTangga;
use App\Models\Ssr;
use Carbon\Carbon;
use Livewire\Component;

class TambahKontak extends Component
{
    public $idIndex;
    public $tglLahir;
    public $umur;
    public $ssrs;
    public $fasyankes;
    public $ssrPilihan;
    public $fasyankesIndex;
    public function mount($id){
        $this->idIndex = $id;
        $this->fasyankesIndex = IKRumahTangga::find($id)->fasyankes_id;
    }
    public function render()
    {
        $this->ssrs = Ssr::get();
        if($this->ssrPilihan){
            $this->fasyankes = Fasyankes::where('ssr_id', $this->ssrPilihan)->get();
        }
        if($this->tglLahir){
            $this->umur = Carbon::parse($this->tglLahir)->age;}
        return view('livewire.kontak.tambah-kontak');
    }
}
