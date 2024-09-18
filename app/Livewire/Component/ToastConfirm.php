<?php

namespace App\Livewire\Component;

// use App\Livewire\Ssr\ListSsr;
use App\Livewire\Ssr\Ssr;
use Livewire\Component;
use Livewire\Attributes\On;

class ToastConfirm extends Component
{
    public $id;
    public $message;
    public $value;

    #[On('confirm')]
    public function confirm($id, $value)
    {
        $this->value = $value;
        $this->id = $id;
        if ($value == 1) {
            $this->message = "Yakin untuk verifikasi SSR?";
        } else {
            $this->message = "Yakin untuk membatalkan verifikasi SSR?";
        }
    }
    public function verifikasi()
    {
        $this->dispatch('verif', id: $this->id, value: $this->value)->to(Ssr::class);
    }


    public function render()
    {
        return view('livewire.component.toast-confirm');
    }
}
