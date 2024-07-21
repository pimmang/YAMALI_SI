<div class="w-full h-full  flex flex-col items-start justify-start gap-6 text-slate-900 mt-8">
    <x-toast-component :status="$statusPage" />
    <livewire:component.toast-hapus />
    <livewire:component.toast-gagal />
    <livewire:component.toast-sukses />
    <div class="w-full flex items-start justify-between mb-10">
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

            <div class="flex items-center text-sm font-semibold gap-4 mt-10 justify-between !w-full">
                <div class="flex items-center gap-4 w-1/3">
                    <div class="flex items-center gap-2">
                        <p>Show</p>
                        <select id="show" wire:model.live='show' wire:change="updateSymbolDetail"
                            class="bg-white border border-white text-gray-900 text-sm rounded-lg shadow focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="all">All</option>
                        </select>
                    </div>
                </div>


                <div class="flex items-center gap-2 justify-end w-2/3">
                    <div class="flex items-center gap-2">
                        <select id="kategori" name="kategori" wire:model.live='kategoriCari'
                            class="bg-white border border-white text-gray-900 text-sm rounded-lg shadow focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
                            <option value="nama">Nama</option>
                            <option value="nik">NIK</option>
                            <option value="ssr">SSR</option>
                            <option value="kecamatan">Kecamatan</option>
                            <option value="jenis">Jenis</option>

                        </select>
                    </div>

                    @if ($kategoriCari == 'nama')
                        <div class="relative w-full ">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search" wire:model.live='nama'
                                class="block w-full ps-10 p-2.5 text-sm border-white text-gray-900 border shadow rounded-lg bg-white focus:ring-orange-500 focus:!border-orange-500"
                                placeholder="Cari data..." />
                        </div>
                    @elseif ($kategoriCari == 'nik')
                        <div class="relative w-full ">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search" wire:model.live='nik'
                                class="block w-full ps-10 p-2.5 text-sm border-white text-gray-900 border shadow rounded-lg bg-white focus:ring-orange-500 focus:!border-orange-500"
                                placeholder="Cari data..." />
                        </div>
                    @elseif ($kategoriCari == 'ssr')
                        <select id="ssr" name="ssr" wire:model.live='ssrCari'
                            class="bg-white border border-white text-gray-900 text-sm rounded-lg shadow focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
                            <option selected>Pilih</option>
                            @foreach ($ssrs as $ssr)
                                <option value="{{ $ssr->nama }}">{{ $ssr->nama }}</option>
                            @endforeach
                        </select>
                    @elseif ($kategoriCari == 'kecamatan')
                        <div class="relative w-full ">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="kecamatan" name="kecamatan" wire:model.live ='kecamatan'
                                class="block w-full ps-10 p-2.5 text-sm border-white text-gray-900 border shadow rounded-lg bg-white focus:ring-orange-500 focus:!border-orange-500"
                                placeholder="Cari data..." required />
                        </div>
                    @elseif($kategoriCari == 'jenis')
                        <select id="jenis" name="jenis" wire:model.live='jenis'
                            class="bg-white border border-white text-gray-900 text-sm rounded-lg shadow focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
                            <option selected>Pilih</option>
                                <option value="swasta">Swasta</option>
                                <option value="pemerintah">Pemerintah</option>
                        </select>
                    @endif
                </div>
            </div>
            <div class="flex flex-col gap-3 mb-10">

                <div class="relative overflow-x-auto rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-orange-500 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center">
                                    Aksi
                                </th>
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
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-around text-lg ">
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
                                            <div wire:click="hapus({{ $fasyankes->id }})"
                                                class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                                <i class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"
                                                    onclick="tampilHapus()"></i>
                                            </div>
                                        </div>
                                    </td>
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
