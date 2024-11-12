<div class="w-full flex flex-col items-start justify-start gap-6 text-slate-900 mt-2">

    <x-toast-component :status="$statusPage" class="z-50" />
    <livewire:component.toast-gagal />
    <livewire:component.toast-sukses />
    <livewire:component.toast-hapus />
    <div class="flex w-full justify-between">


        <div>
            <h1 class="font-bold text-gray-900 text-2xl">Index</h1>
            <div class="flex items-center text-xs gap-1 font-semibold text-gray-500 ">
                <i class="ph-fill ph-house-line"></i>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                <p>Index</p>
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

    {{-- @if ($status == 'list') --}}
    @livewire('index.hubungan-kontak')
    <div class="w-full flex flex-col gap-5 h-full {{ $status == 'list' ? 'block' : 'hidden' }}">
        <livewire:component.filter-data>
            <div class="relative  shadow-md sm:rounded-lg overflow-clip flex ">
                <div class=" w-11/12 overflow-x-auto">
                    <table
                        class=" w-full overflow-x-auto text-sm text-left  rtl:text-right text-gray-500  dark:text-gray-400">
                        <thead
                            class="text-xs text-white  bg-orange-500 dark:bg-gray-700 dark:text-gray-400 whitespace-nowrap uppercase">
                            <tr>

                                <th scope="col" class="px-6 py-3">
                                    Tanggal Input
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    IK-RT
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    IK-NRT
                                </th>
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
                                    Jenis Kelamin
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alamat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fasyankes
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr class="odd:bg-white  even:bg-orange-50 border-b capitalize">

                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        <p class="">
                                            {{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}</p>
                                    </td>
                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        {!! $data->iKRumahTangga ? '&#10003;' : '-' !!}
                                    </td>
                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        {!! $data->iKNRumahTangga->isNotEmpty() ? '&#10003;' : '-' !!}
                                    </td>

                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-700  whitespace-nowrap dark:text-white uppercase">
                                        <p class="">
                                            {{ $data->nama_pasien }}</p>
                                    </td>
                                    <td scope="row" class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <p class="">
                                            {{ $data->nik_index }}</p>
                                    </td>
                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        <p class="">
                                            {{ $data->tanggal_lahir }}</p>
                                    </td>
                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        <p class="">
                                            {{ $data->jenis_kelamin }}</p>
                                    </td>
                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        <p class="">
                                            {{ $data->alamat }}</p>
                                    </td>
                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        <p class="">
                                            {{ $data->fasyankes->nama_fasyankes }}</p>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <table class="w-1/12 mb-10  text-sm text-left  rtl:text-right text-gray-500  dark:text-gray-400">
                    <thead
                        class="text-xs text-white  bg-orange-500 dark:bg-gray-700 dark:text-gray-400 whitespace-nowrap uppercase">
                        <tr>
                            <th scope="col" class="text-center py-3 ">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr class="odd:bg-white  even:bg-orange-50 border-b capitalize">
                                <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                    <div class="flex items-center justify-around text-lg capitalize text-center gap-3">
                                        <div wire:click="detail({{ $data->id }})"
                                            class="relative before:absolute before:content-['Detail'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8  hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">
                                            <i class=" text-xl hover:text-lg ph-bold ph-eye p-0 text-blue-500 cursor-pointer  transition-all"
                                                wire:click="detail({{ $data->id }})"></i>
                                        </div>
                                        <div wire:click="edit({{ $data->id }})"
                                            class="relative before:absolute before:content-['Edit'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8  hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                            <i
                                                class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
                                        </div>
                                        <div wire:click="hapus({{ $data->id }})"
                                            class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                            <i
                                                class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="container my-6">
                {{ $datas->links() }}
            </div>
            @if ($state == 'details')
                <livewire:index.detail-index :data="$details" />
            @endif
            @if ($state == 'edit')
                <livewire:index.edit-index :data="$edits" />
            @endif
    </div>
    {{-- @elseif($status == 'form') --}}
    <div class="{{ $status == 'form' ? 'block' : 'hidden' }} w-full">
        @livewire('index.form-index')
    </div>
    {{-- @endif --}}

    @script
        <script>
            $wire.on('sukses', ({
                message
            }) => {
                tampilSukses(message)
            });
            $wire.on('hapusIndex', () => {
                tampilHapus();
            });
            $wire.on('gagal', ({
                message
            }) => {
                tampilGagal(message);
            });
        </script>
    @endscript
    <style>
        .bg-blue-700 {
            background-color: rgb(255 90 31 / var(--tw-bg-opacity)) !important
        }
    </style>






</div>
