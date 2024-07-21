<?php

namespace App\Livewire\Kontak;

use App\Models\Fasyankes;
use App\Models\IKNRumahTangga;
use App\Models\IKRumahTangga;
use App\Models\Ssr;
use Carbon\Carbon;
use Livewire\Component;

class TambahKontak extends Component
{
    public $idIndex;
    public $tglLahir;
    public $umur;
    // public $ssrs;
    public $fasyankes;
    public $ssrPilihan;
    public $fasyankesIndex;
    public $status;
    public function mount($id, $status){
        $this->idIndex = $id;
        $this->status = $status;
        if($status == 'ikrt'){
            $this->fasyankesIndex = IKRumahTangga::find($id)->fasyankes_id;
            $this->ssrPilihan = IKRumahTangga::find($id)->ssr_id;
        }
        if($status == 'iknrt'){
            $this->fasyankesIndex = IKNRumahTangga::find($id)->fasyankes_id;
            $this->ssrPilihan = IKNRumahTangga::find($id)->ssr_id;
        }

    }
    public function close(){
        $this->dispatch('close')->to(Kontak::class);
    }

    public function render()
    {
        // $this->ssrs = Ssr::get();
        if($this->ssrPilihan){
            $this->fasyankes = Fasyankes::where('ssr_id', $this->ssrPilihan)->get();
        }
        if($this->tglLahir){
            $this->umur = Carbon::parse($this->tglLahir)->age;}
        return view('livewire.kontak.tambah-kontak');
    }
}
