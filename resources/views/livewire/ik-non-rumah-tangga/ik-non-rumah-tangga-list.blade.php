<div class="w-full odd:bg-white  even:bg-orange-50 rounded-lg overflow-hidden  shadow-md " id="{{ $data->id }}">
    <div class=" capitalize   w-full text-sm  text-start  items-center grid grid-cols-5 gap-2 px-3 py-5">
        <p class="text-gray-900 font-medium">{{ $data->index->nama_pasien }}</p>
        <p>{{ $data->index->nik_index }}</p>
        <p>{{ $data->lokasi_penyuluhan }}</p>
        <p>{{ ucwords(strtolower($data->alamat_penyuluhan . ', ' . $data->district->name . ', ' . $data->regency->name)) }}
        </p>
        {{-- <p>{{ $data->district->name }}</p> --}}
        <div class="flex items-center justify-around text-lg capitalize text-center">
            <div
                class="relative z-0 before:z-30 before:absolute before:content-['Detail'] before:shadow-md before:bg-white before:left-0 before:scale-0 before:transition-all hover:before:-left-16  hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">
                <i class=" text-xl hover:text-lg ph-bold ph-eye p-0 text-blue-500 cursor-pointer  transition-all"
                    wire:click="detail({{ $data->id }})"></i>
            </div>
            <div wire:click="edit({{ $data->id }})"
                class="relative before:absolute before:content-['Edit'] before:shadow-md before:bg-white before:left-0 before:scale-0 before:transition-all hover:before:-left-16  hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                <i
                    class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
            </div>

            @if (Auth::user()->hasRole('sr'))
                <div wire:click="hapus({{ $data->id }})"
                    class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:left-0 before:scale-0 before:transition-all hover:before:-left-16 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                    <i
                        class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
                </div>
            @endif
            <div wire:click="kontak"
                class="relative before:absolute before:content-['Kontak'] before:shadow-md before:bg-white before:left-0 before:scale-0 before:transition-all hover:before:-left-16 left hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">
                <i
                    class="text-xl hover:text-lg ph-bold  {{ $klik ? 'ph-caret-circle-down' : 'ph-users-three' }} text-lime-500 p-0 cursor-pointer transition-all"></i>
            </div>

        </div>
    </div>
    {{-- @if ($klik) --}}
    <div class="{{ $klik ? '' : 'hidden' }}">
        <livewire:kontak.kontak :id="$data->id" status="iknrt" />
    </div>
    {{-- @endif --}}

    @if ($state == 'details')
        <livewire:ik-non-rumah-tangga.ik-non-rumah-tangga-details :data="$details" />
    @endif

    @if ($state == 'edit')
        <livewire:ik-non-rumah-tangga.ik-non-rumah-tangga-edit :data="$edits" />
    @endif

    @script
        <script>
            $wire.on('hapusInrt', () => {
                tampilHapus();
            });
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
