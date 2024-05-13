<div class="w-full h-full  flex flex-col items-start justify-start gap-6 text-slate-900 mt-8">
    <x-toast-component :status="$statusPage" />

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
                        <p>{{ $ssr }}</p>
                        <select id="show" wire:model.live='show'
                            class="bg-gray-50 border border-white text-gray-900 text-sm rounded-lg shadow-md focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
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
                            class="bg-gray-50 border border-white text-gray-900 text-sm rounded-lg shadow-md focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
                            <option value="nama">Nama</option>
                            <option value="kode">Kode</option>
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
                                class="block w-full ps-10 p-2.5 text-sm border-white text-gray-900 border shadow-md rounded-lg bg-gray-50 focus:ring-orange-500 focus:!border-orange-500"
                                placeholder="Cari data..." />
                        </div>
                    @elseif ($kategoriCari == 'kode')
                        <div class="relative w-full ">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="search" id="default-search" wire:model.live='kode'
                                class="block w-full ps-10 p-2.5 text-sm border-white text-gray-900 border shadow-md rounded-lg bg-gray-50 focus:ring-orange-500 focus:!border-orange-500"
                                placeholder="Cari data..." />
                        </div>
                    @elseif ($kategoriCari == 'ssr')
                        <select id="ssr" name="ssr" wire:model.live='ssr'
                            class="bg-gray-50 border border-white text-gray-900 text-sm rounded-lg shadow-md focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
                            <option selected>Pilih</option>
                            <option value="Makassar">Makassar</option>
                            <option value="Gowa">Gowa</option>
                            <option value="Wajo">Wajo</option>
                            <option value="Pinrang">Pinrang</option>
                            <option value="Bulukumba">Bulukumba</option>
                            <option value="Jeneponto">Jeneponto</option>
                            <option value="Maros">Maros</option>
                            <option value="Bone">Bone</option>
                            <option value="Sidrap">Sidrap</option>
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
                                class="block w-full ps-10 p-2.5 text-sm border-white text-gray-900 border shadow-md rounded-lg bg-gray-50 focus:ring-orange-500 focus:!border-orange-500"
                                placeholder="Cari data..." required />
                        </div>
                    @elseif ($kategoriCari == 'jenis')
                        <select id="jenis" name="jenis" wire:model.live='jenis'
                            class="bg-gray-50 border border-white text-gray-900 text-sm rounded-lg shadow-md focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
                            <option selected>Pilih</option>
                            <option value="pemerintah">Pemerintah</option>
                            <option value="swasta">Swasta</option>
                        </select>
                    @endif
                </div>
            </div>
            <div class="flex flex-col gap-3 mb-10">
                <div
                    class="rounded-lg text-xs shadow-md font-bold text-center text-white bg-orange-400 w-full grid grid-cols-5 gap-2 px-3 py-4">
                    <p>Kode</p>
                    <p>Nama</p>
                    <p>Alamat</p>
                    <p>SSR</p>
                    <p>Aksi</p>
                </div>
                @foreach ($fasyankess as $fasyankes)
                    <div
                        class="rounded-lg shadow-md bg-white w-full text-xs text-center grid grid-cols-5 gap-2 px-3 py-4">
                        <p>{{ $fasyankes->kode_fasyankes }}</p>
                        <p>{{ $fasyankes->nama_fasyankes }}</p>
                        <p>{{ $fasyankes->alamat }}</p>
                        <p>{{ $fasyankes->ssr }}</p>
                        <div class="flex items-center justify-around text-lg ">
                            <div class="h-5 w-5 flex items-center justify-center">
                                <i
                                    class="ph-bold ph-eye p-0 text-blue-500 cursor-pointer hover:text-2xl transition-all"></i>
                            </div>
                            <div class="h-5 w-5 flex items-center justify-center">
                                <i
                                    class="ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer hover:text-2xl transition-all"></i>
                            </div>
                            <div class="h-5 w-5 flex items-center justify-center">
                                <i
                                    class="ph-bold ph-trash text-red-500 p-0 cursor-pointer hover:text-2xl transition-all"></i>
                            </div>
                        </div>
                    </div>
                @endforeach


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

</div>