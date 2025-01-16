<div class="w-full h-full  flex flex-col items-start justify-start gap-6 text-slate-900 mt-8">

    <x-toast-component :status="$statusPage" class="z-50" />
    <livewire:component.toast-hapus />
    <livewire:component.toast-hapus />
    <livewire:component.toast-gagal />
    <livewire:component.toast-sukses />

    <div class="w-full flex items-start justify-between ">
        <div class="flex flex-col gap-2">
            <h1 class="font-bold text-gray-900 text-2xl">Kader</h1>
            <div class="flex items-center text-xs gap-1 font-semibold text-gray-500 ">
                <i class="ph-fill ph-house-line"></i>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                <p>Tambah Data</p>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                <p>Kader</p>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                @if ($status == 'list')
                    <p>Lihat Kader</p>
                @elseif($status == 'form')
                    <p>Tambah Kader</p>
                @endif
                {{-- <i class="ph ph-caret-right text-sm font-bold"></i> --}}
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

    @if ($status == 'list')
        <div class="w-full flex flex-col gap-5 h-full mb-10">
            <livewire:component.filter-data>
                <div class="flex flex-col gap-3">
                    <div class="relative rounded-lg overflow-clip">
                        <livewire:component.loading-status>
                        @if ($kaders->count() == 0)
                            <div class="flex h-full w-full p-9 items-center justify-center flex-col text-red-600">
                                <i class="ph ph-x-circle  text-5xl"></i>
                                <p class="text-sm">Maaf, data tidak tersedia</p>
                            </div>
                        @else
                            <div class="flex">
                                <table
                                    class="w-11/12 overflow-x-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-white uppercase bg-orange-500 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Nama
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                NIK
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Kecamatan
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                SSR
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kaders as $kader)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <th scope="row"
                                                    class="px-6 py-4 uppercase font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <p>{{ $kader->nama }}</p>
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $kader->nik }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    <p>{{ ucwords(strtolower($kader->district->name)) }}</p>
                                                </td>
                                                <td class="px-6 py-4">
                                                    <p>{{ $kader->ssr->nama }}</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <table class="w-1/12 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-white uppercase bg-orange-500 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-center">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kaders as $kader)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center justify-around text-lg gap-4 ">
                                                        <div
                                                            class="relative z-0 before:absolute before:content-['Detail'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">
                                                            <i class=" text-xl hover:text-lg ph-bold ph-eye p-0 text-blue-500 cursor-pointer  transition-all"
                                                                wire:click="detail({{ $kader->id }})"></i>
                                                        </div>
                                                        <div wire:click="edit({{ $kader->id }})"
                                                            class="relative before:absolute before:content-['Edit'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                                            <i
                                                                class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
                                                        </div>
                                                        @if (Auth::user()->hasRole('sr'))
                                                            <div wire:click="hapus({{ $kader->id }})"
                                                                class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                                                <i class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"
                                                                    onclick="tampilHapus()"></i>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                    @if ($state == 'details')
                        <div
                            class="w-full h-full absolute z-20 top-0 left-0 flex items-center justify-center px-40 py-20 ">
                            <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

                            </div>
                            <div class="bg-white w-full h-full rounded-xl  overflow-hidden z-20 pb-8">
                                <div class="w-full bg-orange-100 flex justify-between items-center ">
                                    <p class="uppercase font-semibold text-gray-700 p-4">Detail Kader</p>
                                    <i class="text-lg p-4 ph-bold cursor-pointer transition-all ph-x text-gray-700 active:scale-90"
                                        wire:click='close'></i>
                                </div>

                                <div class="bg-white w-full h-full overflow-y-scroll p-8 ">
                                    <div class="grid grid-cols-2 gap-4 mb-6">
                                        <div>
                                            <label for="namaKader"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                            </label>
                                            <input type="text" id="namaKader" name="namaKader"
                                                wire:model="detailNama"
                                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                placeholder="Nama kader" disabled />
                                        </div>
                                        <div>
                                            <label for="nikKader"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK
                                            </label>
                                            <input  type="text" pattern="\d*" maxlength="16" minlength="16"  id="nikKader" name="nikKader"
                                                wire:model="detailNik"
                                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                placeholder="Nik Kader" disabled />
                                        </div>
                                        <div>
                                            <label for="nomorTelepon"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                                Telepon</label>
                                            <input type="text" id="nomorTelepon" name="nomorTelepon"
                                                wire:model="detailTelepon"
                                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                placeholder="Nomor Telepon" disabled />
                                        </div>
                                        <div>
                                            <label for="umur"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                                            <input type="text" id="umur" name="umur"
                                                wire:model="detailUmur"
                                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                placeholder="Umur Kader" disabled />
                                        </div>

                                        <div>
                                            <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                                Kelamin</label>
                                            <input type="text" wire:model="detailUmur"
                                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                placeholder="Umur Kader" disabled />
                                        </div>



                                        <div>
                                            <label for="kabupaten"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                                            <input type="text" wire:model="detailKabupaten"
                                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                placeholder="Umur Kader" disabled />
                                        </div>

                                        <div>
                                            <label for="kecamatan"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                            <input type="text" wire:model="detailKecamatan"
                                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                placeholder="Umur Kader" disabled />
                                        </div>

                                        {{-- <div>
                                            <label for="sr"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SR</label>
                                            <input type="text" wire:model="detailSr"
                                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                placeholder="Umur Kader" disabled />
                                        </div> --}}

                                        <div>
                                            <label for="ssr"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                                            <input type="text" wire:model="detailSsr"
                                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                placeholder="Umur Kader" disabled />
                                        </div>

                                        <div>
                                            <label for="jenis"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                                            <input type="text" wire:model="detailJenis"
                                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                placeholder="Umur Kader" disabled />
                                        </div>

                                        <div>
                                            <label for="status"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                            <input type="text" wire:model="detailStatus"
                                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                placeholder="Umur Kader" disabled />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($state == 'edit')
                        <div
                            class="w-full h-full absolute z-20 top-0 left-0 flex items-center justify-center px-40 py-20 ">
                            <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

                            </div>
                            <div class="bg-white w-full h-full rounded-xl  overflow-hidden z-20 pb-8">
                                <div class="w-full bg-orange-100 flex justify-between items-center">
                                    <p class="uppercase font-semibold text-gray-700 p-4">Edit Kader</p>
                                    <i class="text-lg p-4 ph-bold cursor-pointer transition-all ph-x text-gray-700 active:scale-90"
                                        wire:click='close'></i>
                                </div>

                                <div class="bg-white w-full h-full overflow-y-scroll p-8 ">
                                    <form action="/edit-kader/{{ $kaderEdit->id }}" method="POST">
                                        @csrf
                                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                                            <div>
                                                <label for="namaKader"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                                </label>
                                                <input type="text" id="namaKader" name="namaKader"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                    placeholder="Nama kader" required
                                                    value="{{ $kaderEdit->nama }}" />
                                            </div>
                                            <div>
                                                <div class="flex mb-2  gap-3 items-center">
                                                    <label for="nikKader"
                                                        class="block text-sm font-medium text-gray-900 dark:text-white">NIK
                                                    </label>
                                                    @if ($message)
                                                        <p class="text-xs text-red-500">{{ $message }}</p>
                                                    @endif
                                                </div>
                                                <input  type="text" pattern="\d*" maxlength="16" minlength="16"  id="nikKader" maxlength="16"
                                                    name="nikKader" wire:model.blur='nikEdit'
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                    placeholder="Nik Kader" required value="{{ $kaderEdit->nik }}" />
                                            </div>
                                            <div>
                                                <label for="nomorTelepon"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                                    Telepon</label>
                                                <input type="text" id="nomorTelepon" name="nomorTelepon"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                    placeholder="Nomor Telepon" required
                                                    value="{{ $kaderEdit->nomor_telepon }}" />
                                            </div>
                                            <div>
                                                <label for="umur"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                                                <input type="text" id="umur" name="umur"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                                    placeholder="Umur Kader" required
                                                    value="{{ $kaderEdit->umur }}" />
                                            </div>
                                            <div>
                                                <label for="jenisKelamin"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                                    Kelamin</label>
                                                <select id="jenisKelamin" name="jenisKelamin" required
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option selected>{{ $kaderEdit->jenis_kelamin }}</option>
                                                    <option value="laki-laki">Laki-laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                            </div>


                                            <div>
                                                <label for="kabupaten"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                                                <select id="kabupaten" wire:model.change="kabupaten_id"
                                                    name="kabupaten"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option value ="{{ $kaderEdit->regency->id }}" selected>
                                                        {{ ucwords(strtolower($kaderEdit->regency->name)) }}</option>
                                                    @foreach ($kabupaten as $kab)
                                                        <option value={{ $kab->id }}>
                                                            {{ ucwords(strtolower($kab->name)) }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div>
                                                <label for="kecamatan"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                                                <select id="kecamatan" name="kecamatan"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option value ="{{ $kaderEdit->district->id }}" selected>
                                                        {{ ucwords(strtolower($kaderEdit->district->name)) }}</option>
                                                    @if ($kecamatan)
                                                        @foreach ($kecamatan as $kec)
                                                            <option value={{ $kec->id }}>
                                                                {{ ucwords(strtolower($kec->name)) }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>

                                            {{-- <div>
                                                <label for="sr"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SR</label>
                                                <select id="sr" name="sr"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                                </select>
                                            </div> --}}

                                            <div>
                                                <label for="ssr"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                                                <select id="ssr" name="ssr"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    @if (Auth::user()->hasRole('sr'))
                                                        <option value='' selected>Pilih</option>
                                                        @foreach ($ssrs as $ssr)
                                                            <option value="{{ $ssr->id }}">{{ $ssr->nama }}
                                                            </option>
                                                        @endforeach
                                                    @elseif(Auth::user()->hasRole('ssr'))
                                                        <option value="{{ Auth::user()->ssr->id }}">
                                                            {{ Auth::user()->ssr->nama }}</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <div>
                                                <label for="jenis"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                                                <select id="jenis" name="jenis"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option value="{{ $kaderEdit->jenis }}" selected>
                                                        {{ $kaderEdit->jenis }}</option>
                                                    <option value="kader">Kader</option>
                                                    <option value="Patient Suporter">Patient Suporter</option>
                                                    <option value="Kader + PS">Kader + PS</option>
                                                    <option value="TB Army">TB Army</option>
                                                    <option value="TB Army + PS">TB Army + PS</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label for="status"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                                <select id="status" name="status"
                                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                                    <option value="{{ $kaderEdit->status }}" selected>
                                                        {{ $kaderEdit->status }}</option>
                                                    <option value="Aktif">Aktif</option>
                                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="flex justify-end mb-8">
                                            <button type="submit" {{ $message ? 'disabled' : '' }}
                                                class="text-white  hover:bg-orange-400  {{ $message ? '!bg-orange-200' : 'bg-orange-500' }} focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
    @endif




    <div class="w-full py-5 mb-10">
        @if (is_numeric($show))
            {{ $kaders->links() }}
        @endif
    </div>



</div>
</div>
@elseif($status == 'form')
@livewire('kader.form-kader')
@endif


@script
    <script>
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
