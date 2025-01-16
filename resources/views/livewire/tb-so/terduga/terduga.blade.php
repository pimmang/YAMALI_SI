<div class="w-full flex flex-col items-start justify-start gap-6 text-slate-900 mt-8">
    <x-toast-component :status="$statusPage" class="z-50" />
    <livewire:component.toast-gagal />
    <livewire:component.toast-sukses />
    <livewire:component.toast-hapus />
    <div class="w-full flex justify-between items-start ">
        <div>
            <h1 class="font-bold text-gray-900 text-2xl">Terduga TBC</h1>

            <div class="flex items-center text-xs gap-1 font-semibold text-gray-500 ">
                <i class="ph-fill ph-house-line"></i>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                <p>TBC-SO</p>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                <p>Terduga</p>
            </div>
        </div>

        <div class="flex  justify-between relative">
            @if ($status == 'list')
                <div>
                    <x-primary-button class="w-fit gap-2" wire:click='list'>
                        <i class="ph ph-table text-lg"></i> List
                    </x-primary-button>
                    <x-secondary-button class="w-fit gap-2" wire:click='form'>
                        <i class="ph ph-waveform text-lg"></i> Form
                    </x-secondary-button>
                </div>
            @elseif($status == 'form')
                <div>
                    <x-secondary-button class="w-fit gap-2" wire:click='list'>
                        <i class="ph ph-table text-lg"></i> List
                    </x-secondary-button>
                    <x-primary-button class="w-fit gap-2" wire:click='form'>
                        <i class="ph ph-waveform text-lg"></i> Form
                    </x-primary-button>
                </div>
            @endif
        </div>
    </div>
    @if ($status == 'form')
        <div class="flex justify-end w-full relative">
            <livewire:tb-so.terduga.cari-terduga>
        </div>
    @endif
    @if ($status == 'list')
        <div class="w-full flex flex-col gap-5 h-full">
            <livewire:component.filter-data>
                <div class="relative  shadow-md sm:rounded-lg overflow-hidden  flex w-full ">
                    <livewire:component.loading-status>
                        @if ($datas->count() == 0)
                            <div class="flex h-full w-full p-9 items-center justify-center flex-col text-red-600">
                                <i class="ph ph-x-circle  text-5xl"></i>
                                <p class="text-sm">Maaf, data tidak tersedia</p>
                            </div>
                        @else
                            <div class=" w-11/12 overflow-x-auto ">
                                <table
                                    class="w-full  text-sm text-left  rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-white  bg-orange-500 uppercase dark:bg-gray-700 dark:text-gray-400 whitespace-nowrap">
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
                                                Ssr
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Tipe pemeriksaan
                                            </th>
                                            {{-- <th scope="col" class="px-6 py-3 text-center">
                                Aksi
                            </th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $data)
                                            <tr class="odd:bg-white  even:bg-orange-50 border-b capitalize">
                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->kontak->nama }}
                                                </td>
                                                <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                                    {{ $data->kontak->nik_kontak }}
                                                </td>
                                                <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                                    {{ $data->kontak->tgl_lahir }}
                                                </td>
                                                <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                                    {{ $data->kontak->jenis_kelamin }}
                                                </td>
                                                <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                                    {{ $data->kontak->alamat }}
                                                </td>
                                                <td scope="row" class="px-6 py-4  whitespace-wrap dark:text-white">
                                                    @if ($data->kontak->iKRumahTangga)
                                                        {{ $data->kontak->iKRumahTangga->index->ssr->nama }}
                                                    @else
                                                        {{ $data->kontak->iKNRumahTangga->index->ssr->nama }}
                                                    @endif
                                                </td>
                                                <td scope="row"
                                                    class="px-6 text-center py-4  whitespace-wrap dark:text-white">
                                                    {{ $data->tipe_pemeriksaan }}
                                                </td>
                                                {{-- <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                    <div class="flex items-center justify-around text-lg capitalize text-center gap-3">
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
                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <table
                                class="w-1/12 text-sm mb-10 text-left  rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-white  bg-orange-500 uppercase dark:bg-gray-700 dark:text-gray-400 whitespace-nowrap">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr class="odd:bg-white  even:bg-orange-50 border-b capitalize">
                                            <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                                <div
                                                    class="flex items-center justify-around text-lg capitalize text-center gap-3">
                                                    <div wire:click="edit({{ $data->id }})"
                                                        class="relative before:absolute before:content-['Edit'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8  hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                                        <i
                                                            class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
                                                    </div>
                                                    @if (Auth::user()->hasRole('sr'))
                                                        <div wire:click="hapus({{ $data->id }})"
                                                            class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                                            <i
                                                                class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                </div>
                <div class="container my-6">
                    {{ $datas->links() }}
                </div>

        </div>
    @elseif($status == 'form')
        <livewire:tb-so.terduga.terduga-form />
    @endif

    @if ($state == 'edit')
        <livewire:tb-so.terduga.edit-terduga :id="$editId" />
    @endif

    @script
        <script>
            $wire.on('sukses', ({
                message
            }) => {
                tampilSukses(message)
            });
            $wire.on('hapusTerduga', () => {
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
    <style>
        .bg-blue-700 {
            background-color: rgb(255 90 31 / var(--tw-bg-opacity)) !important
        }
    </style>
</div>
