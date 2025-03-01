<div class="w-full flex flex-col items-start justify-start gap-6 text-slate-900 mt-8">
    <x-toast-component :status="$statusPage" class="z-50" />
    <livewire:component.toast-gagal />
    <livewire:component.toast-sukses />
    <livewire:component.toast-hapus />
    <div class="flex justify-between w-full  ">

        <div>
            <h1 class="font-bold text-gray-900 text-2xl">Ternotifikasi TBC</h1>
            <div class="flex items-center text-xs gap-1 font-semibold text-gray-500 ">
                <i class="ph-fill ph-house-line"></i>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                <p>TBC-SO</p>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                <p>Ternotifikasi</p>
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
            @livewire('tb-so\terduga.cari-terduga')
        </div>
    @endif
    @if ($status == 'list')
        <div class="w-full flex flex-col gap-5 h-full">
            <livewire:component.filter-data>
                <div class="relative flex  shadow-md sm:rounded-lg   overflow-hidden">
                    <livewire:component.loading-status>
                        @if ($datas->count() == 0)
                            <div class="flex h-full w-full p-9 items-center justify-center flex-col text-red-600">
                                <i class="ph ph-x-circle  text-5xl"></i>
                                <p class="text-sm">Maaf, data tidak tersedia</p>
                            </div>
                        @else
                            <div class="overflow-x-auto w-11/12 ">
                                <table
                                    class="w-full text-sm text-left  rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-white uppercase bg-orange-500 dark:bg-gray-700 dark:text-gray-400 whitespace-nowrap">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Nama
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Hasil Pengobatan
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
                                            <tr
                                                class="odd:bg-white  even:bg-orange-50 border-b whitespace-nowrap capitalize">

                                                <td scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->terduga->kontak->nama }}
                                                </td>
                                                @if ($data->hasilPengobatan)
                                                    <td scope="row"
                                                        class="px-6 py-4  whitespace-nowrap dark:text-white">
                                                        {{ $data->hasilPengobatan->hasil_pengobatan }}
                                                    </td>
                                                @else
                                                    <td scope="row"
                                                        class="px-6 py-4  whitespace-nowrap dark:text-white">
                                                        -
                                                    </td>
                                                @endif
                                                <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                                    {{ $data->terduga->kontak->nik_kontak }}
                                                </td>
                                                <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                                    {{ $data->terduga->kontak->tgl_lahir }}
                                                </td>
                                                <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                                    {{ $data->terduga->kontak->jenis_kelamin }}
                                                </td>
                                                <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                                    {{ $data->terduga->kontak->alamat }}
                                                </td>
                                                <td scope="row" class="px-6 py-4  whitespace-wrap dark:text-white">
                                                    @if ($data->terduga->kontak->iKRumahTangga)
                                                        {{ $data->terduga->kontak->iKRumahTangga->index->ssr->nama }}
                                                    @else
                                                        {{ $data->terduga->kontak->iKNRumahTangga->index->ssr->nama }}
                                                    @endif
                                                </td>
                                                <td scope="row"
                                                    class="px-6 text-center py-4  whitespace-wrap dark:text-white">
                                                    {{ $data->terduga->tipe_pemeriksaan }}
                                                </td>
                                                @if ($data->terduga->kontak->i_k_rumah_tangga_id)
                                                    <td scope="row"
                                                        class="px-6  py-4  whitespace-wrap dark:text-white">
                                                        {{ $data->terduga->kontak->iKRumahTangga->kader->nama }}
                                                    </td>
                                                @else
                                                    <td scope="row"
                                                        class="px-6  py-4  whitespace-wrap dark:text-white">
                                                        {{ $data->terduga->kontak->iKNRumahTangga->kader->nama }}
                                                    </td>
                                                @endif

                                                <td scope="row" class="px-6  py-4  whitespace-wrap dark:text-white">
                                                    {{ $data->nama_petugas_pkm }}
                                                </td>
                                                <td scope="row" class="px-6  py-4  whitespace-wrap dark:text-white">
                                                    {{ $data->nama_pmo . ' (' . $data->tipe_pmo . ')' }}
                                                </td>
                                                <td scope="row" class="px-6  py-4  whitespace-wrap dark:text-white">
                                                    {{ $data->no_telepon_pmo }}
                                                </td>

                                                <td scope="row"
                                                    class="px-6 text-center py-4  whitespace-wrap dark:text-white">
                                                    {!! $data->edukasi_hiv == 1 ? '&#10003;' : '-' !!}
                                                </td>
                                                <td scope="row" class="px-6  py-4  whitespace-wrap dark:text-white">
                                                    {{ $data->tgl_verifikasi }}
                                                </td>
                                                <td scope="row" class="px-6  py-4  whitespace-wrap dark:text-white">
                                                    {{ $data->catatan ? $data->catatan : '-' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <table
                                class="w-1/12 text-sm text-left mb-10  rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-white  bg-orange-500 dark:bg-gray-700 dark:text-gray-400 whitespace-nowrap">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($datas as $data)
                                        <tr class="odd:bg-white  even:bg-orange-50 border-b whitespace-nowrap">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div
                                                    class="flex items-center justify-around text-lg capitalize text-center gap-3">

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
                                                    <div wire:click="edit({{ $data->terduga->id }})"
                                                        class="relative before:absolute before:content-['Edit'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8  hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                                        <i
                                                            class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
                                                    </div>
                                                    @if (Auth::user()->hasRole('sr'))
                                                        <div wire:click="hapus({{ $data->terduga->id }})"
                                                            class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                                            <i
                                                                class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                </div>
        </div>
        <div class="container my-6">
            {{ $datas->links() }}
        </div>
    @elseif($status == 'form')
        <livewire:tb-so.terduga.terduga-form />
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
