<?php

namespace App\Livewire\Component;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;

class FilterData extends Component
{
    public $dateStart;
    public $dateEnd;
    public $cari;

    public $status = 'ya';


    public function submit()
    {
        if ($this->dateStart && $this->dateEnd) {
            $tanggalMulai = Carbon::createFromFormat('m/d/Y', $this->dateStart)->startOfDay();
            $tanggalAkhir = Carbon::createFromFormat('m/d/Y', $this->dateEnd)->endOfDay();
        } else {
            $tanggalMulai = '';
            $tanggalAkhir = '';
        }
        // dd($this->dateEnd);
        $this->dispatch('filter', tanggalMulai: $tanggalMulai, tanggalAkhir: $tanggalAkhir, cari: $this->cari);
    }

    public function restart()
    {
        $tanggalAkhir = '';
        $tanggalMulai = '';
        $this->cari = '';
        $this->dateStart = '';
        $this->dateEnd = '';

        $this->dispatch('filter', tanggalMulai: $tanggalMulai, tanggalAkhir: $tanggalAkhir, cari: $this->cari);
    }
    #[On('ganti')]
    public function status()
    {
        // dd('deh');
        $this->status = 'fasyankes';
    }
    public function render()
    {
        return view('livewire.component.filter-data');
    }
}
