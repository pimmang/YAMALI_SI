<?php

namespace App\Livewire\TbSo\Ternotifikasi;

use App\Models\HasilPengobatan as ModelsHasilPengobatan;
use Livewire\Component;

class HasilPengobatan extends Component
{
    public $pengobatanId;
    public $dataHasilPengobatan;
    public $state;

    public function close(){
        $this->dispatch('close');
    }
    public function edit(){
        $this->state = 'edit';
    }
    public function batal(){
        $this->state = null;
    }

    public function mount($id){
        $this->pengobatanId = $id;
        $this->dataHasilPengobatan = ModelsHasilPengobatan::where('ternotifikasi_id', $id)->first();
    }

    public function render()
    {
        return view('livewire.tb-so.ternotifikasi.hasil-pengobatan');
    }
}
