<div class="w-full flex flex-col items-start justify-start gap-6 text-slate-900 mt-8">
    <h1 class="font-bold text-gray-900 text-2xl">Ternotifikasi TBC</h1>
    <x-toast-component :status="$statusPage" class="z-50" />
    <livewire:component.toast-gagal />
    <livewire:component.toast-sukses />
    <livewire:component.toast-hapus />
    <div class="flex items-center text-xs gap-1 font-semibold text-gray-500 ">
        <i class="ph-fill ph-house-line"></i>
        <i class="ph ph-caret-right text-sm font-bold"></i>
        <p>TBC-SO</p>
        <i class="ph ph-caret-right text-sm font-bold"></i>
        <p>Ternotifikasi</p>
    </div>

    <div class="flex w-full justify-between relative">
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
            @livewire('tb-so\terduga.cari-terduga')
        @endif
    </div>


    @if ($status == 'list')
        <div class="w-full flex flex-col gap-5 h-full">
            <div class="flex items-center text-sm font-semibold gap-4 mt-10 justify-between !w-full">
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <p>Show</p>
                        <select id="show" wire:model.live='show'
                            class="bg-gray-50 border border-white text-gray-900 text-sm rounded-lg shadow-md focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
                            <option selected class="bg-orange-500">10</option>
                            <option value="10" class="hover:bg-orange-500">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="all">all</option>
                        </select>
                    </div>

                    <div class="relative max-w-sm  " id="date-filter">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text"
                            class="bg-gray-50 shadow-md border border-white text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:!border-orange-500 block w-full ps-10 p-2.5 "
                            placeholder="Select date">
                    </div>
                </div>


                <div class="relative w-1/2">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full ps-10 p-2.5 text-sm border-white text-gray-900 border shadow-md rounded-lg bg-gray-50 focus:ring-orange-500 focus:!border-orange-500"
                        placeholder="Cari data..." required />
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-6 uppercase">
                <table class="w-full text-sm text-left  rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead
                        class="text-xs text-white  bg-orange-500 dark:bg-gray-700 dark:text-gray-400 whitespace-nowrap">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Hasil Pengobatan
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
                            <th scope="col" class="px-6 py-3">
                                Kader
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Petugas PKM
                            </th>
                            <th scope="col" class="px-6 py-3">
                                PMO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor telepon PMO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                edukasi hiv
                            </th>
                            <th scope="col" class="px-6 py-3">
                                tanggal verifikasi
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Catatan
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr class="odd:bg-white  even:bg-orange-50 border-b whitespace-nowrap">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center justify-around text-lg capitalize text-center gap-3">
                                        <div wire:click="edit({{ $data->terduga->id }})"
                                            class="relative before:absolute before:content-['Edit'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8  hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                            <i
                                                class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
                                        </div>
                                        <div wire:click="hapus({{ $data->terduga->id }})"
                                            class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                            <i
                                                class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
                                        </div>
                                        <div wire:click="pengobatan({{ $data->id }})"
                                            class="relative before:absolute before:content-['Pengobatan'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">
                                            <i
                                                class="text-xl hover:text-lg ph-bold ph-heartbeat text-lime-500 p-0 cursor-pointer transition-all"></i>
                                        </div>
                                        <div wire:click="pemantauan({{ $data->id }})"
                                            class="relative before:absolute before:content-['Riwayat_Pemantauan'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                            <i
                                                class="text-xl hover:text-lg ph-bold ph-clock-user text-blue-500 p-0 cursor-pointer transition-all"></i>
                                        </div>
                                    </div>
                                </th>

                                @if ($data->hasilPengobatan)
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $data->hasilPengobatan->hasil_pengobatan }}
                                    </th>
                                @else
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        -
                                    </th>
                                @endif
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data->terduga->kontak->nama }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data->terduga->kontak->nik_kontak }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data->terduga->kontak->tgl_lahir }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data->terduga->kontak->jenis_kelamin }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $data->terduga->kontak->alamat }}
                                </th>
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                    {{ $data->terduga->kontak->ssr->nama }}
                                </th>
                                <th scope="row"
                                    class="px-6 text-center py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                    {{ $data->terduga->tipe_pemeriksaan }}
                                </th>
                                <th scope="row"
                                    class="px-6  py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                    {{ $data->kader->nama }}
                                </th>
                                <th scope="row"
                                    class="px-6  py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                    {{ $data->nama_petugas_pkm }}
                                </th>
                                <th scope="row"
                                    class="px-6  py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                    {{ $data->nama_pmo . ' (' . $data->tipe_pmo . ')' }}
                                </th>
                                <th scope="row"
                                    class="px-6  py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                    {{ $data->no_telepon_pmo }}
                                </th>

                                <th scope="row"
                                    class="px-6 text-center py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                    {!! $data->edukasi_hiv == 1 ? '&#10003;' : '-' !!}
                                </th>
                                <th scope="row"
                                    class="px-6  py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                    {{ $data->tgl_verifikasi }}
                                </th>
                                <th scope="row"
                                    class="px-6  py-4 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                    {{ $data->catatan ? $data->catatan : '-' }}
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <div class="container my-6">
            {{ $datas->links() }}
        </div>
    @elseif($status == 'form')
        @livewire('tb-so\terduga.terduga-form')
    @endif

    @if ($state == 'edit')
        <livewire:tb-so.terduga.edit-terduga :id="$editId" />
    @endif

    @if ($state == 'pengobatan')
        <livewire:tb-so.ternotifikasi.hasil-pengobatan :id="$pengobatanId" />
    @endif

    @if ($state == 'pemantauan')
        <livewire:tb-so.ternotifikasi.riwayat-pemantauan key="{{ now() }}" :id="$pemantauanId" />
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
