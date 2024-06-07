<?php

namespace App\Livewire\IkRumahTangga;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use App\Models\IKRumahTangga as IkrumahTanggaModels;
use App\Models\Kader;
use Livewire\Component;
use Livewire\Attributes\On; 


class IkRumahTangga extends Component
{

    public $status = 'list';
    public $statusPage = 'ik-rumah-tangga';
    public $show = 10;
    public $state ;
    public $details;
    public $edits;
    public $kabupaten;
    public $kecamatan;
    public $provinsi;
    public $kader;
   
    
    public function edit($id){
        $this->state = 'edit';
        $this->edits = IkrumahTanggaModels::find($id);
    }
    public $detailId;
    public function detail($id){
        $this->state = 'details';
        $this->details = IkrumahTanggaModels::find($id);
        // $kabupaten = Regency::find($this->details->kota_kabupaten_id);
        // $provinsi = Province::find($this->details->provinsi_id);
        // $kecamatan = District::find($this->details->kecamatan_id);
        // $kader = Kader::find($this->details->kader_id);
        // $this->kabupaten = $kabupaten->name;
        // $this->provinsi = $provinsi->name;
        // $this->kecamatan = $kecamatan->name;
        
    }

    
    #[On('close')]
    public function close(){
        $this->state = null;
    }

    public $hapusId;
    public function hapus($id){
       $this->hapusId = $id;
    }

    #[On('hapus')] 
    public function HapusData()
    {
        $kader = IkrumahTanggaModels::find($this->hapusId);
        $kader->delete();
        session()->flash('ik-rumah-tangga', 'Data Ik Rumah Tangga berhasil dihapus');
        $this->hapusId = null;
        return redirect('/rumah-tangga');
    }

    public function list(){
        $this->status = 'list';
    }
    public function form(){
        $this->status = 'form';
    }
    

    
    public function render()
    {
        $datas = IkrumahTanggaModels::paginate($this->show);
        return view('livewire.ik-rumah-tangga.ik-rumah-tangga',[
            'datas' => $datas,
        ]);
    }
}
