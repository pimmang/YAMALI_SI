<div class="w-full mt-8">
    <div class="w-full flex items-start justify-between mb-10">
        <div class="flex flex-col gap-2">
            <div>
                <h1 class="font-bold text-gray-900 text-2xl">Profil</h1>
                {{-- <p class="text-sm text-gray-500">Daftar Kontak yang dirujuk oleh Kader</p> --}}
            </div>
            <div class="flex items-center text-xs gap-1 font-semibold text-gray-500 ">
                <i class="ph-fill ph-house-line"></i>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                <p>Lihat Profil</p>

                {{-- <i class="ph ph-caret-right text-sm font-bold"></i> --}}
            </div>
        </div>

    </div>
    {{-- <div class="flex items-center text-sm font-semibold gap-4 mt-10 justify-between !w-full">
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
    </div> --}}

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6 ">
        @if ($kontaks->count() == 0)
            <div class="flex h-full w-full p-9 items-center justify-center flex-col text-red-600">
                <i class="ph ph-x-circle  text-5xl"></i>
                <p class="text-sm">Maaf, data tidak tersedia</p>
            </div>
        @else
            <table class="w-full text-sm text-left  rtl:text-right text-gray-500 dark:text-gray-400">

                <thead
                    class="uppercase text-xs text-white  bg-orange-500 dark:bg-gray-700 dark:text-gray-400 whitespace-nowrap">
                    <tr>

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
                            SSR
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Batuk
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Demam Meriang
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Sesak Nafas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Keringat Malam
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Diabetes Melitus
                        </th>
                        <th scope="col" class="px-6 py-3">
                            > 60 Thn
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ibu Hamil
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Perokok
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Berobat Tidak Tuntas
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Index | NIK
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kontaks as $kontak)
                        <tr class="odd:bg-white  even:bg-orange-50 border-b capitalize">

                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap uppercase">
                                {{ $kontak->nama }}
                            </td>
                            <td scope="row" class="px-6 py-4  whitespace-nowrap ">
                                {{ $kontak->nik_kontak }}
                            </td>
                            <td scope="row" class="px-6 py-4 whitespace-nowrap ">
                                {{ $kontak->tgl_lahir }}
                            </td>
                            <td scope="row" class="px-6 py-4 whitespace-nowrap ">
                                {{ $kontak->jenis_kelamin }}
                            </td>
                            <td scope="row" class="px-6 py-4 whitespace-nowrap ">
                                {{ $kontak->alamat }}
                            </td>
                            <td scope="row" class="px-6 py-4 whitespace-nowrap ">
                                @if ($kontak->iKRumahTangga)
                                    {{ $kontak->iKRumahTangga->index->ssr->nama }}
                                @else
                                    {{ $kontak->iKNRumahTangga->index->ssr->nama }}
                                @endif
                            </td>

                            <td scope="row" class="px-6 py-4 whitespace-nowrap ">
                                {!! $kontak->batuk == 1 ? '&#10003;' : '-' !!}
                            </td>
                            <td scope="row" class="px-6 py-4 whitespace-nowrap ">
                                {!! $kontak->demam_meriang == 1 ? '&#10003;' : '-' !!}
                            </td>
                            <td scope="row" class="px-6 py-4 whitespace-nowrap ">
                                {!! $kontak->sesak_napas == 1 ? '&#10003;' : '-' !!}
                            </td>
                            <td scope="row" class="px-6 py-4 whitespace-nowrap ">
                                {!! $kontak->keringat_malam == 1 ? '&#10003;' : '-' !!}
                            </td>
                            <td scope="row" class="px-6 py-4 whitespace-nowrap ">
                                {!! $kontak->dm == 1 ? '&#10003;' : '-' !!}
                            </td>
                            <td scope="row" class="px-6 py-4 whitespace-nowrap ">
                                {!! $kontak->lansia_60_thn == 1 ? '&#10003;' : '-' !!}
                            </td>
                            <td scope="row" class="px-6 py-4 whitespace-nowrap ">
                                {!! $kontak->ibu_hamil == 1 ? '&#10003;' : '-' !!}
                            </td>
                            <td scope="row" class="px-6 py-4 whitespace-nowrap ">
                                {!! $kontak->perokok == 1 ? '&#10003;' : '-' !!}
                            </td>
                            <td scope="row" class="px-6 py-4 whitespace-nowrap ">
                                {!! $kontak->berobat_tidak_tuntas == 1 ? '&#10003;' : '-' !!}
                            </td>
                            <td scope="row" class="px-6 py-4  whitespace-nowrap ">
                                <p>
                                    @if ($kontak->iKRumahTangga)
                                        {{ $kontak->iKRumahTangga->index->nama_pasien . ' | ' . $kontak->iKRumahTangga->index->nik_index }}
                                    @else
                                        {{ $kontak->iKNRumahTangga->index->nama_pasien . ' | ' . $kontak->iKNRumahTangga->index->nik_index }}
                                    @endif

                                </p>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    <div class="container my-6">
        {{ $kontaks->links() }}
    </div>
</div>
