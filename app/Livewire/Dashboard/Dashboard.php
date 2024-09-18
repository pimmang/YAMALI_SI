<?php

namespace App\Livewire\Dashboard;

use App\Models\Index;
use App\Models\Kader;
use App\Models\Kontak;
use App\Models\Ssr;
use App\Models\Terduga;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Dashboard extends Component
{
    public $ssrPilihan;
    public $ssrs;
    public $tahun;
    public $tahunTerkecil;
    public function mount($ssr, $tahun){
        $this->ssrs = Ssr::get();
        $this->ssrPilihan = $ssr;
        $this->$tahun = $tahun;
        $this->tahunTerkecil = Index::oldest('created_at')->value(DB::raw('YEAR(created_at)'));
    }

    public function filter(){
        if ($this->ssrPilihan == 'semua' && $this->tahun == 'semua') {
            return redirect('/dashboard');
        } else {
            if($this->ssrPilihan == 'semua'){
                $ssr = 'semua';
            }else{
                $ssr = Ssr::where('id', $this->ssrPilihan)->first();
                $ssr = $ssr->nama;
            }
            $url = route('filterDashboard', [
                'ssr' => $ssr,
                'tahun' => $this->tahun,
            ]);
            return redirect($url);
        }
    }
    public function updatedSsrPilihan(){
        $this->filter();
    }

    public function updatedTahun(){
        $this->filter();
    }

    public function render()
    {
        // $this->dispatch('refreshJs', jumlahDiperiksaLaki:$this->jumlahDiperiksaLaki, jumlahDiperiksaPerempuan:$this->jumlahDiperiksaPerempuan );
        return view('livewire.dashboard.dashboard');
    }
}
