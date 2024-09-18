<div class="w-1/2 flex flex-col gap-2">
    <div class="relative w-full">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>
        </div>
        <input type="search" wire:model.live='cari'
            class="block w-full ps-10 p-2.5 text-sm border-white text-gray-900 border shadow rounded-lg bg-white focus:ring-orange-500 focus:!border-orange-500"
            placeholder="ketik nama/NIK kontak.." />
    </div>


    <div class="absolute overflow-x-auto top-16 left-0 w-full shadow bg-white rounded-lg overflow-hidden">
        @if ($hasil)
            @if ($terdugas->count() > 0)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-orange-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                Nama Terduga
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                NIK Terduga
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                Kecamatan, Kabupaten
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                Nomor Telepon
                            </th>
                            <th scope="col" class="px-6 py-3  whitespace-nowrap">
                                SSR
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terdugas as $terduga)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-orange-50 cursor-pointer"
                                wire:click='pilihData({{ $terduga->id }})'>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white uppercase">
                                    {{ $terduga->nama }}
                                </th>
                                <td class="px-6 py-4  whitespace-nowrap">
                                    {{ $terduga->nik_kontak }}
                                </td>
                                @if ($terduga->i_k_rumah_tangga_id)
                                    <td class="px-6 py-4  whitespace-nowrap">
                                        {{ ucwords(strtolower($terduga->iKRumahTangga->index->district->name . ', ' . $terduga->iKRumahTangga->index->regency->name )) }}
                                    </td>
                                @else
                                    <td class="px-6 py-4  whitespace-nowrap">
                                        {{ ucwords(strtolower($terduga->iKNRumahTangga->district->name . ', ' . $terduga->iKNRumahTangga->regency->name )) }}
                                    </td>
                                @endif

                                <td class="px-6 py-4  whitespace-nowrap">
                                    {{ $terduga->no_telepon }}
                                </td>
                                @if ($terduga->i_k_rumah_tangga_id)
                                    <td class="px-6 py-4  whitespace-nowrap">
                                        {{ $terduga->iKRumahTangga->index->ssr->nama  }}
                                    </td>
                                @else
                                    <td class="px-6 py-4  whitespace-nowrap">
                                        {{ $terduga->iKNRumahTangga->index->ssr->nama  }}
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="w-full p-10 text-center text-red-500">Maaf, data tidak ditemukan</p>
            @endif

        @endif
    </div>

</div>
