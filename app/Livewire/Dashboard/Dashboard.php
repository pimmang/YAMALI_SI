<?php

namespace App\Livewire\Dashboard;

use App\Models\Kader;
use App\Models\Kontak;
use App\Models\Ssr;
use App\Models\Terduga;
use Livewire\Component;

class Dashboard extends Component
{
    public $ssrPilihan;
    public $ssrs;
    public function mount($ssr){
        $this->ssrs = Ssr::get();
        $this->ssrPilihan = $ssr;
    }

    public function updatedSsrPilihan(){
        if($this->ssrPilihan == 'semua'){
            return redirect('/dashboard');
        }else{
            $ssr = Ssr::where('id', $this->ssrPilihan)->first();
            return redirect('/dashboard/'.$ssr->nama);
        }
    }

    public function render()
    {
        // $this->dispatch('refreshJs', jumlahDiperiksaLaki:$this->jumlahDiperiksaLaki, jumlahDiperiksaPerempuan:$this->jumlahDiperiksaPerempuan );
        return view('livewire.dashboard.dashboard');
    }
}
