<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
    <th scope="row" class="px-6 py-4 font-medium capitalize text-gray-900 whitespace-nowrap dark:text-white">
        <p>{{ $ssr->name }}</p>
    </th>
    <td scope="row" class="px-6 py-4">
        {{ $ssr->email }}
    </td>
    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        <div class="rujukan text-xs" wire:poll="cek">
            
                <select wire:model.change="verifikasi" 
                    class=" text-2xs py-1 ps-2 rounded-full border-2 font-bold border-none {{ $ssr->verifikasi == 1 ? 'bg-lime-300 focus:border-lime-500 focus:ring-lime-500 focus:ring-1 text-lime-700' : 'bg-red-300 focus:border-red-500 focus:ring-red-500 focus:ring-1 text-red-700' }} ">
                    <option value="1" {{ $ssr->verifikasi == 1 ? 'selected' : '' }}>
                        Verifikasi</option>
                    <option value="0" {{ $ssr->verifikasi == 0 ? 'selected' : '' }}>
                        Belum Verifikasi</option>
                </select>
            {{-- @else
                <p class="px-3 py-2 bg-lime-400 text-lime-950 rounded-full w-fit text-xs">Terverifikasi</p>
            @endif --}}
        </div>
    </th>
</tr>
