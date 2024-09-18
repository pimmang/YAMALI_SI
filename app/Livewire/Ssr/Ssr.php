<?php

namespace App\Livewire\Ssr;

use App\Models\Ssr as ModelsSsr;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Livewire\Component;
use Livewire\Attributes\On;

class Ssr extends Component
{
    public $statusPage = 'ssr';
    public $status = 'list';

    #[On('verif')]
    public function verif($id, $value)
    {
        $ssr = User::find($id);
        $ssr->verifikasi = $value;
        $ssr->update();
        if ($value == '1') {
            $this->dispatch('sukses', message: 'SSR telah diverifikasi')->self();
        } else {
            $this->dispatch('sukses', message: 'Verifikasi SSR telah dibatalkan')->self();
        }

        if ($value == 1) {
            ModelsSsr::create([
                'nama' => $ssr->name,
                'user_id' => $ssr->id,
            ]);
        } else {
            $ssr = ModelsSsr::where('user_id', $ssr->id)->first();
            if ($ssr) {
                $ssr->delete();
            }
        }

        Artisan::call('db:seed', [
            '--class' => 'RolePermissionSeeder', // Nama seeder yang ingin dijalankan
        ]);
    }
    public function render()
    {
        $user = User::where('name', '!=', 'sr')->get();
        return view('livewire.ssr.ssr', [
            'ssrs' => $user,
        ]);
    }
}
