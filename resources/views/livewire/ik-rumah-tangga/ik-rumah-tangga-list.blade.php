<div class="w-full odd:bg-white  even:bg-orange-50 rounded-lg overflow-hidden  shadow-md " id="{{ $data->id }}">
    <div
        class=" uppercase  text-gray-900 w-full text-sm font-medium text-start  items-center grid grid-cols-6 gap-2 px-3 py-5">
        <p>{{ $data->nama_pasien }}</p>
        <p>{{ $data->nik_index }}</p>
        <p>{{ $data->tanggal_lahir }}</p>
        <p>{{ $data->fasyankes->nama_fasyankes }}</p>
        <p>{{ $data->ssr->nama }}</p>
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
            <div wire:click="hapus({{ $data->id }})"
                class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:left-0 before:scale-0 before:transition-all hover:before:-left-16 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                <i class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
            </div>
            <div wire:click="kontak"
                class="relative before:absolute before:content-['Kontak'] before:shadow-md before:bg-white before:left-0 before:scale-0 before:transition-all hover:before:-left-16 left hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">
                <i
                    class="text-xl hover:text-lg ph-bold  {{ $klik ? 'ph-caret-circle-down' : 'ph-users-three' }} text-lime-500 p-0 cursor-pointer transition-all"></i>
            </div>

        </div>
    </div>
    @if ($klik)
        <livewire:kontak.kontak :id="$data->id" />
    @endif

    @if ($state == 'details')
        <livewire:ik-rumah-tangga.ik-rumah-tangga-details :data="$details" />
    @endif

    @if ($state == 'edit')
        <livewire:ik-rumah-tangga.ik-rumah-tangga-edit :data="$edits" />
    @endif

    @script
        <script>
            $wire.on('hapusIrt', () => {
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
