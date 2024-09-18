<?php

namespace App\Livewire\Profil;

use App\Models\Kontak;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profil extends Component
{
    public $kategoriCari = 'nama';
    public $show;

    public function render()
    {
        $query = Kontak::query();

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
        $data = $query->where('rujukan', 1)->where('terduga', 0)->orderBy('updated_at', 'desc')->paginate(10);

        return view('livewire.profil.profil', [
            'kontaks' => $data,
        ]);
    }
}
