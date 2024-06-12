<?php

namespace App\Livewire\Profil;

use App\Models\Kontak;
use Livewire\Component;

class Profil extends Component
{
    public $kategoriCari = 'nama';
    public $show;
   
    public function render()
    {
        return view('livewire.profil.profil',[
            'kontaks' => Kontak::where('rujukan', 1)->orderBy('updated_at', 'desc')->paginate(10),
        ]);
    }
}
