<div class="w-full h-full  flex flex-col items-start justify-start gap-6 text-slate-900 my-8 pb-20 ">
    <x-toast-component :status="$statusPage" />
    <livewire:component.toast-hapus />
    <livewire:component.toast-gagal />
    <livewire:component.toast-sukses />
    <div class="w-full flex items-start justify-between ">
        <div class="flex flex-col gap-2">
            <h1 class="font-bold text-gray-900 text-2xl">Fasilitas Layanan Kesehatan</h1>
            <div class="flex items-center text-xs gap-1 font-semibold text-gray-500 ">
                <i class="ph-fill ph-house-line"></i>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                @if ($status == 'list')
                    <p>Lihat Fasyankes</p>
                @elseif($status == 'form')
                    <p>Tambah Fasyankes</p>
                @endif
                {{-- <i class="ph ph-caret-right text-sm font-bold"></i> --}}
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
        <div class="w-full flex flex-col gap-5 h-full mb-10">
            <livewire:component.filter-data>
                <div class="flex flex-col gap-3">
                    <div class="relative  rounded-lg overflow-hidden">
                        <livewire:component.loading-status>
                            @if ($fasyankess->count() == 0)
                                <div class="flex h-full w-full p-9 items-center justify-center flex-col text-red-600">
                                    <i class="ph ph-x-circle  text-5xl"></i>
                                    <p class="text-sm">Maaf, data tidak tersedia</p>
                                </div>
                            @else
                                <div class="flex">
                                    <table
                                        class="w-11/12 overflow-x-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-white uppercase bg-orange-500 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Nama
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Kode
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Kecamatan
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    SSR
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fasyankess as $fasyankes)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                                    <th scope="row"
                                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <p>{{ $fasyankes->nama_fasyankes }}</p>
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $fasyankes->kode_fasyankes }}
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <p>{{ ucwords(strtolower($fasyankes->district->name)) }}</p>
                                                    </td>
                                                    <td class="px-6 py-4">
                                                        <p>{{ $fasyankes->ssr->nama }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <table
                                        class="w-1/12 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <thead
                                            class="text-xs text-white uppercase bg-orange-500 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 text-center">
                                                    Aksi
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($fasyankess as $fasyankes)
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                    <td class="px-6 py-4">
                                                        <div class="flex items-center gap-4 justify-around text-lg ">
                                                            <div
                                                                class="relative z-0 before:absolute before:content-['Detail'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">
                                                                <i class=" text-xl hover:text-lg ph-bold ph-eye p-0 text-blue-500 cursor-pointer  transition-all"
                                                                    wire:click="detail({{ $fasyankes->id }})"></i>
                                                            </div>
                                                            <div wire:click="edit({{ $fasyankes->id }})"
                                                                class="relative before:absolute before:content-['Edit'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                                                <i
                                                                    class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
                                                            </div>
                                                            @if (Auth::user()->hasRole('sr'))
                                                                <div wire:click="hapus({{ $fasyankes->id }})"
                                                                    class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                                                    <i class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"
                                                                        onclick="tampilHapus()"></i>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                    </div>
                    @if ($state == 'details')
                        <livewire:fasyankes.fasyankes-detail :data="$details" />
                    @endif

                    @if ($state == 'edit')
                        <livewire:fasyankes.fasyankes-edit :data="$edits" />
                    @endif

                    <div class="w-full py-5 mb-10">
                        @if (is_numeric($show))
                            {{ $fasyankess->links() }}
                        @endif
                    </div>



                </div>
        </div>
    @elseif($status == 'form')
        @livewire('fasyankes.fasyankes-form')
    @endif

    @script
        <script>
            $wire.on('gagal', ({
                message
            }) => {
                tampilGagal(message);
            });
            $wire.on('sukses', ({
                message
            }) => {
                tampilSukses(message);
            });
        </script>
    @endscript

</div>
