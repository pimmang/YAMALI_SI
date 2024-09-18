<tr class="odd:bg-white  even:bg-orange-50 border-b text-gray-500">
    <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap dark:text-white w-full">
        <div class="flex items-center gap-3 justify-center !w-full">
            <div wire:click="edit({{ $kontak->id }})"
                class="relative before:absolute before:content-['Edit'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                <i
                    class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
            </div>
            <div wire:click="hapus({{ $kontak->id }})"
                class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                <i class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
            </div>
        </div>
    </th>
    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
        {{ $kontak->tgl_kegiatan }}
    </td>
    <th scope="row" class="px-6 py-4 font-medium uppercase text-gray-900 whitespace-nowrap dark:text-white">
        {{ $kontak->nama }}
    </th>
    <td scope="row" class="px-6 py-4  text-center whitespace-nowrap dark:text-white">
        {!! $kontak->batuk == 1 ||
        $kontak->sesak_napas == 1 ||
        $kontak->keringat_malam == 1 ||
        $kontak->demam_meriang == 1
            ? '&#10003;'
            : '-' !!}
    </td>
    <td scope="row" class="px-6 py-4 text-center  whitespace-nowrap dark:text-white">
        {!! $kontak->dm == 1 ||
        $kontak->lansia_60_tahun == 1 ||
        $kontak->ibu_hamil == 1 ||
        $kontak->perokok == 1 ||
        $kontak->berobat_tidak_tuntas == 1
            ? '&#10003;'
            : '-' !!}
    </td>

    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
        {{ $kontak->tgl_lahir }}
    </td>
    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
        {{ $kontak->jenis_kelamin }}
    </td>
    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
        {{ $kontak->alamat }}
    </td>
    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
        <div class="rujukan text-xs">
            <select wire:model.live="rujuk"
                class=" text-2xs py-1 ps-2 rounded-full border-2 font-bold border-none {{ $rujuk == 1 ? 'bg-lime-300 focus:border-lime-500 focus:ring-lime-500 focus:ring-1 text-lime-700' : 'bg-red-300 focus:border-red-500 focus:ring-red-500 focus:ring-1 text-red-700' }} ">
                <option value="1" {{ $rujuk == 1 ? 'selected' : '' }}>Dirujuk</option>
                <option value="0" {{ $rujuk == 0 ? 'selected' : '' }}>Belum</option>
            </select>
        </div>
    </td>
    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
        <div class="rujukan text-xs">
            <select wire:model.live="kunjung"
                class=" text-2xs py-1 ps-2 rounded-full border-2 font-bold border-none {{ $kunjung == 1 ? 'bg-lime-300 focus:border-lime-500 focus:ring-lime-500 focus:ring-1 text-lime-700' : 'bg-red-300 focus:border-red-500 focus:ring-red-500 focus:ring-1 text-red-700' }} ">
                <option value="1" {{ $kunjung == 1 ? 'selected' : '' }}>Dikunjungi
                </option>
                <option value="0" {{ $kunjung == 0 ? 'selected' : '' }}>Belum</option>
            </select>
        </div>
    </td>





    {{-- <p>{{ $kontak->tgl_kegiatan }}</p>
    <p>{{ $kontak->nama }}</p>
    <p>{{ $kontak->tgl_lahir }}</p>
    <p>{{ $kontak->jenis_kelamin }}</p>
    <p>{{ $kontak->alamat }} {{ $rujuk }}</p>
   
   
     --}}



</tr>
