<?php

namespace App\Livewire\TbSo\Terduga;

use App\Models\Kontak as ModelsKontak;
use Livewire\Component;

class CariTerduga extends Component
{
    public $cari;
    public $hasil = false;

    public function pilihData($id){
        $this->dispatch('data', id:$id)->to(TerdugaForm::class);
        $this->cari = '';
    }
    public function render()
    {
        if(strlen($this->cari)> 3){
                $terduga = ModelsKontak::where('nik_kontak', 'like', '%' . $this->cari . '%')->orwhere('nama', 'like', '%' . $this->cari . '%')->where('rujukan', 1)->where('terduga',0)->get();
                $this->hasil = true;
        }else{
            $terduga = null;
            $this->hasil = false;
        }
        return view('livewire.tb-so.terduga.cari-terduga',[
            "terdugas" => $terduga,
        ]);
    }
}
