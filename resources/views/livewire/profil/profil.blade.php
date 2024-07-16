<div class="w-full mt-8">
    <div class="w-full flex items-start justify-between mb-10">
        <div class="flex flex-col gap-2">
            <h1 class="font-bold text-gray-900 text-2xl">Profil</h1>
            <div class="flex items-center text-xs gap-1 font-semibold text-gray-500 ">
                <i class="ph-fill ph-house-line"></i>
                <i class="ph ph-caret-right text-sm font-bold"></i>

                <p>Lihat Index</p>

                {{-- <i class="ph ph-caret-right text-sm font-bold"></i> --}}
            </div>
        </div>

    </div>
    <div class="flex items-center text-sm font-semibold gap-4 mt-10 justify-between !w-full">
        <div class="flex items-center gap-4 w-1/3">
            <div class="flex items-center gap-2">
                <p>Show</p>
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
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

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6 uppercase">
        <table class="w-full text-sm text-left  rtl:text-right text-gray-500 dark:text-gray-400">

            <thead class="text-xs text-white  bg-orange-500 dark:bg-gray-700 dark:text-gray-400 whitespace-nowrap">
                <tr>
                    {{-- <th scope="col" class="text-center py-3 ">
                        Aksi
                    </th> --}}
                    {{-- <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th> --}}
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nik
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tgl Lahir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kelamin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ssr
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Index | NIK
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kontaks as $kontak)
                    <tr class="odd:bg-white  even:bg-orange-50 border-b">

                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $kontak->nama }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $kontak->nik_kontak }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $kontak->tgl_lahir }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $kontak->jenis_kelamin }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $kontak->alamat }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                            {{ $kontak->ssr->nama }}
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <p>
                                @if ($kontak->iKRumahTangga)
                                {{ $kontak->iKRumahTangga->nama_pasien . ' | ' . $kontak->iKRumahTangga->nik_index }}
                                @else
                                {{ $kontak->iKNRumahTangga->iKRumahTangga->nama_pasien . ' | ' . $kontak->iKNRumahTangga->iKRumahTangga->nik_index }} 
                                @endif
                               
                            </p>
                        </th>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container my-6">
        {{ $kontaks->links() }}
    </div>
</div>
