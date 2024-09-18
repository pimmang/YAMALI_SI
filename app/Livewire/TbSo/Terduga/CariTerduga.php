<?php

namespace App\Livewire\TbSo\Terduga;

use App\Models\Kontak as ModelsKontak;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CariTerduga extends Component
{
    public $cari;
    public $hasil = false;

    public function pilihData($id)
    {
        $this->dispatch('data', id: $id)->to(TerdugaForm::class);
        $this->cari = '';
    }
    public function render()
    {
        $query = ModelsKontak::query();
        if (Auth::user()->hasRole('ssr')) {
            $query->where(function ($query) {
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
        
        if (strlen($this->cari) > 3) {
            $query->where(function ($query) {
                $query->where('nik_kontak', 'like', '%' . $this->cari . '%')
                    ->orwhere('nama', 'like', '%' . $this->cari . '%');
            })->where('rujukan', 1)->where('terduga', 0);


            $terduga = $query->get();
            $this->hasil = true;
        } else {
            $terduga = null;
            $this->hasil = false;
        }
        return view('livewire.tb-so.terduga.cari-terduga', [
            "terdugas" => $terduga,
        ]);
    }
}
