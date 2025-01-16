<div class="w-full h-full flex flex-col items-start justify-start gap-6 text-slate-900 mt-8">

    <x-toast-component :status="$statusPage" class="z-50" />
    <livewire:component.toast-gagal />
    <livewire:component.toast-sukses />
    <livewire:component.toast-hapus />
    <div class="flex justify-between w-full">
        <div>
            <h1 class="font-bold text-gray-900 text-2xl">Non Rumah Tangga</h1>
            <div class="flex items-center text-xs gap-1 font-semibold text-gray-500 ">
                <i class="ph-fill ph-house-line"></i>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                <p>Investigasi kontak</p>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                <p>Non Rumah tangga</p>
            </div>
        </div>
        <div>
            @if ($status == 'list')
                <x-primary-button class="w-fit gap-2" wire:click='list'>
                    <i class="ph ph-table text-lg"></i> List
                </x-primary-button>
                <x-secondary-button class="w-fit gap-2" wire:click='form'>
                    <i class="ph ph-waveform text-lg"></i> Form
                </x-secondary-button>
            @elseif($status == 'form')
                <x-secondary-button class="w-fit gap-2" wire:click='list'>
                    <i class="ph ph-table text-lg"></i> List
                </x-secondary-button>
                <x-primary-button class="w-fit gap-2" wire:click='form'>
                    <i class="ph ph-waveform text-lg"></i> Form
                </x-primary-button>
            @endif
        </div>
    </div>
    @if ($status == 'list')
        <div class="w-full flex flex-col gap-5 h-full">
            <livewire:component.filter-data>
                <div class=" flex flex-col gap-3 mb-10 w-full h-40 {{ $cariStatus ? '' : 'hidden' }} ">
                    <livewire:component.loading-status-ik>
                </div>
                <div class="flex flex-col gap-3 mb-10 {{ $cariStatus ? 'hidden' : '' }}">
                    @if ($datas->count() == 0)
                        <div class="flex h-full w-full p-9 items-center justify-center flex-col text-red-600">
                            <i class="ph ph-x-circle  text-5xl"></i>
                            <p class="text-sm">Maaf, data tidak tersedia</p>
                        </div>
                    @else
                        <div
                            class="rounded-lg text-xs text-start shadow-md font-bold uppercase text-white bg-orange-500 w-full whitespace-nowrap grid grid-cols-5 gap-2 px-3 py-4">
                            <p>Nama Index</p>
                            <p>NIK Index</p>
                            <p>Lokasi Penyuluhan</p>
                            <p>Alamat</p>
                            <p class="text-center">Aksi</p>
                        </div>
                        @foreach ($datas as $data)
                            <livewire:ik-non-rumah-tangga.ik-non-rumah-tangga-list key="{{ now() }}"
                                :data="$data">
                        @endforeach
                        <div class="container my-6">
                            {{ $datas->links() }}
                        </div>


                    @endif
                </div>
        </div>
    @elseif($status == 'form')
        @livewire('ik-non-rumah-tangga.ik-non-rumah-tangga-form')
    @endif

    @script
        <script>
            $wire.on('sukses', ({
                message
            }) => {
                tampilSukses(message)
            });
            $wire.on('stopLoading', () => {
                setTimeout(() => {
                    // Pastikan Anda mendeklarasikan variabel `cariStatus` di Livewire dengan @this
                    let cariStatus = @this.get(
                        'cariStatus'); // Mengambil nilai variabel Livewire ke dalam JavaScript
                    if (cariStatus) { // Mengecek jika cariStatus bernilai false
                        $wire.dispatchSelf('cariStatus');
                        console.log('ya');
                    }
                }, 500);
            });
        </script>
    @endscript

</div>
