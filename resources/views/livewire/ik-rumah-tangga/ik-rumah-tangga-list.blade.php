<div class="w-full  h-16 pb-2 overflow-hidden containerPasien{{ $data->id }}">
    <div
        class=" rounded-lg shadow-md bg-white w-full text-xs text-center  items-center grid grid-cols-5 gap-2 px-3 h-14 mb-2">
        <p>{{ $data->nama_pasien }}</p>
        <p>{{ $data->tanggal_lahir }}</p>
        <p>{{ $data->umur }}</p>
        <p>{{ $data->ssr->nama }}</p>
        <div class="flex items-center justify-around text-lg ">
            <div
                class="relative z-0 before:absolute before:content-['Detail'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">
                <i class=" text-xl hover:text-lg ph-bold ph-eye p-0 text-blue-500 cursor-pointer  transition-all"
                    wire:click="detail({{ $data->id }})"></i>
            </div>
            <div wire:click="edit({{ $data->id }})"
                class="relative before:absolute before:content-['Edit'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                <i
                    class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
            </div>
            <div wire:click="hapus({{ $data->id }})"
                class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                <i class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"
                    onclick="tampilHapus()"></i>
            </div>
            <div
                class="relative before:absolute before:content-['Kontak'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">
                <i
                    class="text-xl hover:text-lg ph-bold ph-users-three text-lime-500 p-0 cursor-pointer transition-all"></i>
            </div>

        </div>
    </div>
    <livewire:kontak.kontak :id="$data->id" />
</div>
