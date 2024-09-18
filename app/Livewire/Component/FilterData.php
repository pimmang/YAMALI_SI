<?php

namespace App\Livewire\Component;

use Carbon\Carbon;
use Livewire\Component;

class FilterData extends Component
{
    public $dateStart;
    public $dateEnd;
    public $cari;

    public function submit()
    {
        if ($this->dateStart && $this->dateEnd) {
            $tanggalMulai = Carbon::createFromFormat('m/d/Y', $this->dateStart)->startOfDay();
            $tanggalAkhir = Carbon::createFromFormat('m/d/Y', $this->dateEnd)->endOfDay();
        } else {
            $tanggalMulai = '';
            $tanggalAkhir = '';
        }
        $this->dispatch('filter', tanggalMulai : $tanggalMulai, tanggalAkhir: $tanggalAkhir, cari: $this->cari);
    }

    public function render()
    {
        return view('livewire.component.filter-data');
    }
}
