<div class="w-full h-full  flex flex-col items-start justify-start gap-6 text-slate-900 mt-8">
    <x-toast-component :status="$statusPage" />

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
                @php
                    $i = 0;
                @endphp
                @foreach ($kaders as $kader)
                    @php
                        $i += 1;
                    @endphp
                    <div
                        class=" rounded-lg shadow-md bg-white w-full text-xs text-center grid grid-cols-5 gap-2 px-3 py-4">
                        <p>{{ $kader->nik }}</p>
                        <p>{{ $kader->nama }}</p>
                        <p>{{ $kader->kecamatan }}</p>
                        <p>{{ $kader->ssr }}</p>
                        <div class="flex items-center justify-around text-lg ">
                            <div
                            class="relative z-0 before:absolute before:content-['Detail'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">
                                <i class=" text-xl hover:text-lg ph-bold ph-eye p-0 text-blue-500 cursor-pointer  transition-all"
                                    wire:click="detail({{ $kader->id }})"></i>
                            </div>
                            <div
                            class="relative before:absolute before:content-['Edit'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                <i
                                    class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
                            </div>
                            <div
                                class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">
                               
                                <i
                                    class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if ($details)
                    <div class=" w-full h-full absolute top-0 left-0 flex items-center justify-center px-40 py-20 ">
                        <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

                        </div>
                        <div class="bg-white w-full h-full rounded-xl p-8 z-20">
                            <div class="bg-white w-full h-full overflow-y-scroll">
                                <h1 class="font-bold text-black text-xl mb-8">Detail</h1>
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

                <div class="w-full py-5 mb-10">
                    @if (is_numeric($show))
                        {{ $kaders->links() }}
                    @endif
                </div>



            </div>
        </div>
    @elseif($status == 'form')
        @livewire('fasyankes.fasyankes-form')
    @endif


    {{-- <script>
        Livewire.hook('component.init', () => {
            alert('ini saya');
        })
    </script> --}}

{{-- 
    <script>
        function updateKader() {
            const detail = document.querySelectorAll('.detail');
            const detailSimbol = document.querySelectorAll('.detail-simbol');
            for (let i = 0; i < detail.length; i++) {
                detailSimbol[i].addEventListener('mouseenter', (function(index) {
                    return function() {
                        detail[index].classList.toggle('opacity-0');
                        detail[index].classList.add('!-top-7');
                        detail[index].classList.remove('scale-0');
                    };
                })(i));
                detailSimbol[i].addEventListener('mouseleave', (function(index) {
                    return function() {
                        detail[index].classList.toggle('opacity-0');
                        detail[index].classList.remove('!-top-7');
                        detail[index].classList.add('scale-0');
                    };
                })(i));
            }

            const edit = document.querySelectorAll('.edit');
            const editSimbol = document.querySelectorAll('.edit-simbol');
            for (let i = 0; i < editSimbol.length; i++) {
                editSimbol[i].addEventListener('mouseenter', (function(index) {
                    return function() {
                        edit[index].classList.toggle('opacity-0');
                        edit[index].classList.add('!-top-7');
                        edit[index].classList.remove('scale-0');
                        console.log(index)
                    };
                })(i));
                editSimbol[i].addEventListener('mouseleave', (function(index) {
                    return function() {
                        edit[index].classList.toggle('opacity-0');
                        edit[index].classList.remove('!-top-7');
                        edit[index].classList.add('scale-0');
                    };
                })(i));
            }

            const hapus = document.querySelectorAll('.hapus');
            const hapusSimbol = document.querySelectorAll('.hapus-simbol');
            for (let i = 0; i < hapusSimbol.length; i++) {
                hapusSimbol[i].addEventListener('mouseenter', (function(index) {
                    return function() {
                        hapus[index].classList.toggle('opacity-0');
                        hapus[index].classList.add('!-top-7');
                        hapus[index].classList.remove('scale-0');
                        console.log(index)
                    };
                })(i));
                hapusSimbol[i].addEventListener('mouseleave', (function(index) {
                    return function() {
                        hapus[index].classList.toggle('opacity-0');
                        hapus[index].classList.remove('!-top-7');
                        hapus[index].classList.add('scale-0');
                    };
                })(i));
            }

        }
        let observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                updateKader();
            });
        });

        // Tentukan target node yang akan diamati oleh MutationObserver
        let targetNode = document.body;

        // Konfigurasi untuk MutationObserver
        let config = {
            childList: true,
            subtree: true
        };

        // Memulai observasi pada target node dengan konfigurasi yang ditentukan
        observer.observe(targetNode, config);
    </script> --}}




</div>
