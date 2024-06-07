<div class="w-full h-full  flex flex-col items-start justify-start gap-6 text-slate-900 mt-8">

    <x-toast-component :status="$statusPage" class="z-50" />
    <livewire:component.toast-hapus />

    <div class="w-full flex items-start justify-between mb-10">
        <div class="flex flex-col gap-2">
            <h1 class="font-bold text-gray-900 text-2xl">Kader</h1>
            <div class="flex items-center text-xs gap-1 font-semibold text-gray-500 ">
                <i class="ph-fill ph-house-line"></i>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                @if ($status == 'list')
                    <p>Lihat Kader</p>
                @elseif($status == 'form')
                    <p>Tambah Kader</p>
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
                        {{ $show }}

                        <select id="show" wire:model.live='show' wire:change="updateSymbolDetail"
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
                                class="block w-full ps-10 p-2.5 text-sm border-white text-gray-900 border shadow-md rounded-lg bg-gray-50 focus:ring-orange-500 focus:!border-orange-500"
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
                    <p>NIK</p>
                    <p>Nama</p>
                    <p>Kecamatan</p>
                    <p>SSR</p>
                    <p>Aksi</p>
                </div>
                @foreach ($kaders as $kader)
                    <div
                        class=" rounded-lg shadow-md bg-white w-full text-xs text-center grid grid-cols-5 gap-2 px-3 py-4">
                        <p>{{ $kader->nik }}</p>
                        <p>{{ $kader->nama }}</p>
                        <p>{{ ucwords(strtolower($kader->district->name)) }}</p>
                        <p>{{ $kader->ssr->nama }}</p>
                        <div class="flex items-center justify-around text-lg ">
                            <div
                                class="relative z-0 before:absolute before:content-['Detail'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">
                                <i class=" text-xl hover:text-lg ph-bold ph-eye p-0 text-blue-500 cursor-pointer  transition-all"
                                    wire:click="detail({{ $kader->id }})"></i>
                            </div>
                            <div wire:click="edit({{ $kader->id }})"
                                class="relative before:absolute before:content-['Edit'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                <i
                                    class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
                            </div>
                            <div wire:click="hapus({{ $kader->id }})"
                                class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                <i class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"
                                    onclick="tampilHapus()"></i>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if ($state == 'details')
                    <div
                        class="w-full h-full absolute z-50 top-0 left-0 flex items-center justify-center px-40 py-20 ">
                        <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

                        </div>
                        <div class="bg-white w-full h-full rounded-xl p-8 z-20">
                            <div class="bg-white w-full h-full overflow-y-scroll">
                                <div class="flex justify-between items-top">
                                    <h1 class="font-bold text-black text-xl mb-8">Detail</h1>
                                    <div class="flex items-top gap-5 pe-10">
                                        <div
                                            class="relative before:absolute before:z-50 before:content-['Edit'] before:shadow-md before:bg-white before:bottom-0 before:scale-0 before:transition-all hover:before:-bottom-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                            <i
                                                class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
                                        </div>
                                        <div
                                            class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:bottom-0 before:scale-0 before:transition-all hover:before:-bottom-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                            <i
                                                class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4  ">
                                    <div>
                                        <label for="namaKader"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                        </label>
                                        <input type="text" id="namaKader" name="namaKader"
                                            wire:model="detailNama"
                                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            placeholder="Nama kader" disabled />
                                    </div>
                                    <div>
                                        <label for="nikKader"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK
                                        </label>
                                        <input type="text" id="nikKader" name="nikKader" wire:model="detailNik"
                                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            placeholder="Nik Kader" disabled />
                                    </div>
                                    <div>
                                        <label for="nomorTelepon"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                            Telepon</label>
                                        <input type="text" id="nomorTelepon" name="nomorTelepon"
                                            wire:model="detailTelepon"
                                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            placeholder="Nomor Telepon" disabled />
                                    </div>
                                    <div>
                                        <label for="umur"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                                        <input type="text" id="umur" name="umur" wire:model="detailUmur"
                                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            placeholder="Umur Kader" disabled />
                                    </div>

                                    <div>
                                        <label
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                            Kelamin</label>
                                        <input type="text" wire:model="detailUmur"
                                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            placeholder="Umur Kader" disabled />
                                    </div>

                                    <div>
                                        <label for="provinsi"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                                        <input type="text" wire:model="detailProvinsi"
                                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            placeholder="Umur Kader" disabled />
                                    </div>

                                    <div>
                                        <label for="kabupaten"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                                        <input type="text" wire:model="detailKabupaten"
                                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            placeholder="Umur Kader" disabled />
                                    </div>

                                    <div>
                                        <label for="kecamatan"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                        <input type="text" wire:model="detailKecamatan"
                                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            placeholder="Umur Kader" disabled />
                                    </div>

                                    <div>
                                        <label for="sr"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SR</label>
                                        <input type="text" wire:model="detailSr"
                                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            placeholder="Umur Kader" disabled />
                                    </div>

                                    <div>
                                        <label for="ssr"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                                        <input type="text" wire:model="detailSsr"
                                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            placeholder="Umur Kader" disabled />
                                    </div>

                                    <div>
                                        <label for="jenis"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                                        <input type="text" wire:model="detailJenis"
                                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            placeholder="Umur Kader" disabled />
                                    </div>

                                    <div>
                                        <label for="status"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                        <input type="text" wire:model="detailStatus"
                                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                            placeholder="Umur Kader" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ($state == 'edit')
                    <div
                        class="w-full h-full absolute z-50 top-0 left-0 flex items-center justify-center px-40 py-20 ">
                        <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

                        </div>
                        <div class="bg-white w-full h-full rounded-xl p-8 z-20">
                            <div class="bg-white w-full h-full overflow-y-scroll">
                                <div class="flex justify-between items-top">
                                    <h1 class="font-bold text-black text-xl mb-8">Edit</h1>
                                    {{-- <div class="flex items-top gap-5 pe-10">
                                        <div
                                            class="relative before:absolute before:z-50 before:content-['Edit'] before:shadow-md before:bg-white before:bottom-0 before:scale-0 before:transition-all hover:before:-bottom-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                            <i
                                                class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
                                        </div>
                                        <div
                                            class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:bottom-0 before:scale-0 before:transition-all hover:before:-bottom-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                            <i
                                                class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
                                        </div>
                                    </div> --}}
                                </div>
                                <div>
                                    <form action="/edit-kader/{{ $kaderEdit->id }}" method="POST">
                                        @csrf
                                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                                            <div>
                                                <label for="namaKader"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                </label>
                                                <input type="text" id="namaKader" name="namaKader"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                    placeholder="Nama kader" required
                                                    value="{{ $kaderEdit->nama }}" />
                                            </div>
                                            <div>
                                                <label for="nikKader"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK
                                                </label>
                                                <input type="text" id="nikKader" name="nikKader"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                    placeholder="Nik Kader" required value="{{ $kaderEdit->nik }}" />
                                            </div>
                                            <div>
                                                <label for="nomorTelepon"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                                    Telepon</label>
                                                <input type="text" id="nomorTelepon" name="nomorTelepon"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                    placeholder="Nomor Telepon" required
                                                    value="{{ $kaderEdit->nomor_telepon }}" />
                                            </div>
                                            <div>
                                                <label for="umur"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                                                <input type="text" id="umur" name="umur"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                    placeholder="Umur Kader" required
                                                    value="{{ $kaderEdit->umur }}" />
                                            </div>
                                            <div>
                                                <label for="jenisKelamin"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                                    Kelamin</label>
                                                <select id="jenisKelamin" name="jenisKelamin" required
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option selected>{{ $kaderEdit->jenis_kelamin }}</option>
                                                    <option value="laki-laki">Laki-laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label for="provinsi"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                                                <select id="provinsi" name="provinsi"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option value = '73'>Sulawesi Selatan</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="kabupaten"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                                                <select id="kabupaten" wire:model.change="kabupaten_id"
                                                    name="kabupaten"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option value ="{{ $kaderEdit->regency->id }}" selected>
                                                        {{ ucwords(strtolower($kaderEdit->regency->name)) }}</option>
                                                    @foreach ($kabupaten as $kab)
                                                        <option value={{ $kab->id }}>
                                                            {{ ucwords(strtolower($kab->name)) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div>
                                                <label for="kecamatan"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                                <select id="kecamatan" name="kecamatan"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option value ="{{ $kaderEdit->district->id }}" selected>
                                                        {{ ucwords(strtolower($kaderEdit->district->name)) }}</option>
                                                    @if ($kecamatan)
                                                        @foreach ($kecamatan as $kec)
                                                            <option value={{ $kec->id }}>
                                                                {{ ucwords(strtolower($kec->name)) }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            <div>
                                                <label for="sr"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SR</label>
                                                <select id="sr" name="sr"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label for="ssr"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                                                <select id="ssr" name="ssr"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option value="{{ $kaderEdit->ssr->id }}" selected>
                                                        {{ $kaderEdit->ssr->nama }}</option>
                                                    @foreach ($ssrs as $ssr)
                                                        <option value="{{ $ssr->id }}">{{ $ssr->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div>
                                                <label for="jenis"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                                                <select id="jenis" name="jenis"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option value="{{ $kaderEdit->jenis }}" selected>
                                                        {{ $kaderEdit->jenis }}</option>
                                                    <option value="kader">Kader</option>
                                                    <option value="Patient Suporter">Patient Suporter</option>
                                                    <option value="Kader + PS">Kader + PS</option>
                                                    <option value="TB Army">TB Army</option>
                                                    <option value="TB Army + PS">TB Army + PS</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label for="status"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                                <select id="status" name="status"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option value="{{ $kaderEdit->status }}" selected>
                                                        {{ $kaderEdit->status }}</option>
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>

                                        <button type="submit"
                                            class="text-white !bg-orange-600 !hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif




                <div class="w-full py-5 mb-10">
                    @if (is_numeric($show))
                        {{ $kaders->links() }}
                    @endif
                </div>



            </div>
        </div>
    @elseif($status == 'form')
        @livewire('kader.form-kader')
    @endif


   


</div>
