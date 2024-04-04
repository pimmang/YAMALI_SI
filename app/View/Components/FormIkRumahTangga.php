<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormIkRumahTangga extends Component
{
    public $provinsi;
    public $kabupaten;
    public $kecamatan;
    public function __construct($provinsi,$kabupaten,$kecamatan)
    {
        $this->provinsi = $provinsi;
        $this->kabupaten = $kabupaten;
        $this->kecamatan = $kecamatan;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        
        return view('components.form-ik-rumah-tangga');
    }
}
