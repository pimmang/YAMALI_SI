<div class="h-fit w-full  pb-20">
    <div class="w-full rounded-xl h-fit bg-white shadow-lg mb-6 p-4 grid grid-cols-2">
        <div class="w-full pe-4">
            <div
                class="bg-orange-100 py-4 px-6 text-sm font-semibold uppercase text-gray-700 rounded-md flex items-center">
                <p class="text-xs font-bold ">Cari Data Index</p>
            </div>
            <form action="" class="flex flex-col gap-2 p-5">
                @csrf
                <div class="text-xs">
                    <label for="tahun&semester" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Tahun
                        dan Semester </label>
                    <select id="countries" wire:model.change = "tahunSemester" {{ $index ? 'disabled' : '' }}
                        class=" border {{ $index ? 'bg-gray-100' : 'bg-white' }} !border-orange-200 text-gray-900 text-xs rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="{{ $tahun->year - 5 }}-1">Index {{ $tahun->year - 5 }} Semester 1
                        </option>
                        <option value="{{ $tahun->year - 5 }}-2">Index {{ $tahun->year - 5 }} Semester 2
                        </option>
                        <option value="{{ $tahun->year - 4 }}-1">Index {{ $tahun->year - 4 }} Semester 1
                        </option>
                        <option value="{{ $tahun->year - 4 }}-2">Index {{ $tahun->year - 4 }} Semester 2
                        </option>
                        <option value="{{ $tahun->year - 3 }}-1">Index {{ $tahun->year - 3 }} Semester 1
                        </option>
                        <option value="{{ $tahun->year - 3 }}-2">Index {{ $tahun->year - 3 }} Semester 2
                        </option>
                        <option value="{{ $tahun->year - 2 }}-1">Index {{ $tahun->year - 2 }} Semester 1
                        </option>
                        <option value="{{ $tahun->year - 2 }}-2">Index {{ $tahun->year - 2 }} Semester 2
                        </option>
                        <option value="{{ $tahun->year - 1 }}-1">Index {{ $tahun->year - 1 }} Semester
                            1
                        </option>
                        <option value="{{ $tahun->year - 1 }}-2">Index {{ $tahun->year - 1 }} Semester
                            2
                        </option>
                        <option value="{{ $tahun->year }}-1">Index {{ $tahun->year }} Semester 1
                        </option>
                        <option value="{{ $tahun->year }}-2">Index {{ $tahun->year }} Semester 2
                        </option>
                    </select>
                </div>
                <div>
                    <label for="provinsi"
                        class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Provinsi</label>
                    <select id="provinsi" {{ $index ? 'disabled' : '' }}
                        class="{{ $index ? 'bg-gray-100' : 'bg-white' }} border !border-orange-200 text-gray-900 text-xs rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value = 'sulawesi selatan'>Sulawesi Selatan</option>
                    </select>
                </div>
                <div>
                    <label for="kabupaten"
                        class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                    <select id="kabupaten" wire:model.change="kabupaten_id" {{ $index ? 'disabled' : '' }}
                        class="{{ $index ? 'bg-gray-100' : 'bg-white' }} border !border-orange-200 text-gray-900 text-xs rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option>Pilih</option>
                        @foreach ($kabupaten as $kab)
                            <option value={{ $kab->id }}>{{ ucwords(strtolower($kab->name)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="relative">
                    <label for="fasyankes"
                        class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Fasyankes</label>
                    <input type="text" id="cariFasyan" wire:model.live="cariFasyankes" autocomplete="off"
                        {{ $index ? 'disabled' : '' }}
                        class="{{ $index ? 'bg-gray-100' : 'bg-white' }} border !border-orange-200 text-gray-900 text-xs rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Ketik nama/kode fasyankes" required />

                    <div id="fasyankesKontainer"
                        class="absolute {{ $hidden ? 'hidden' : '' }}  top-20 border-solid border border-orange-300 bg-white rounded-lg shadow w-full max-h-52 p-2 overflow-hidden ">
                        <div class="w-full rounded-lg max-h-48 overflow-y-scroll  cursor-all-scroll">
                            @if ($fasyankes)
                                @if ($fasyankes->count() > 0)
                                    @foreach ($fasyankes as $fasyan)
                                        <div class="w-full p-2 text-sm hover:bg-orange-100 cursor-pointer rounded-md"
                                            wire:click="fasyanPilihan({{ $fasyan->id }})">
                                            <p>{{ $fasyan->nama_fasyankes . ' (' . $fasyan->kode_fasyankes . ')' }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="w-full p-2 text-sm hover:bg-orange-100 cursor-pointer rounded-md">
                                        <p class="text-orange-500">Tidak ada data</p>
                                    </div>
                                @endif
                            @else
                                <div class="w-full p-2 text-sm hover:bg-orange-100 cursor-pointer rounded-md">
                                    <p class="text-orange-500">Pilih kabupaten</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <div class="w-full ps-4 border-l border-orange-500 ">
            <div
                class="bg-orange-100 py-4 px-6 text-sm font-semibold uppercase text-gray-700 rounded-md flex items-center">
                <p class="text-xs font-bold ">Data Investigasi Kontak Rumah Tangga</p>
            </div>

            @if ($index)
                <div class="w-full p-4 grid grid-cols-2 gap-4 text-sm font-medium text-gray-700 capitalize">

                    <p
                        class="relative  text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1 after:left-0 after:content-[' ']  ">
                        Nama</p>
                    <p
                        class=" relative  text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1  after:left-0 after:content-[' '] ">
                        NIK</p>
                    <p class="text-xs font-semibold text-gray-700">{{ $index->nama_pasien }}</p>
                    <p class="text-xs font-semibold text-gray-700">{{ $index->nik_index }}</p>
                    <p
                        class="text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1 relative  after:left-0 after:content-[' ']">
                        Tgl Lahir
                    </p>
                    <p
                        class="text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1 relative  after:left-0 after:content-[' ']">
                        Kota/Kabupaten</p>
                    <p class="text-xs font-semibold text-gray-700">{{ $index->tanggal_lahir }}</p>
                    <p class="text-xs font-semibold text-gray-700 ">{{ ucwords(strtolower($index->regency->name)) }}
                    </p>
                    <p
                        class="text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1 relative  after:left-0 after:content-[' ']">
                        Kecamatan
                    </p>
                    <p
                        class="text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1 relative  after:left-0 after:content-[' ']">
                        Alamat</p>
                    <p class="text-xs font-semibold text-gray-700">{{ ucwords(strtolower($index->district->name)) }}
                    </p>
                    <p class="text-xs font-semibold text-gray-700 ">{{ ucwords(strtolower($index->alamat)) }}
                    </p>

                </div>
                <div class="w-full flex justify-end">
                    <x-primary-button class="w-fit gap-2" wire:click='resetIndex'>
                        <i class="ph ph-table text-lg"></i> Reset
                    </x-primary-button>
                </div>
            @elseif($hasil)
                @if ($hasil->count() > 0)
                    <div class="relative overflow-auto rounded-lg flex-grow h-72 mt-4">
                        <table
                            class="w-full whitespace-nowrap h-40 overflow-scroll text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-orange-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NIK
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Tgl Lahir
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        alamat
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        kabupaten
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Kecamatan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hasil as $item)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-orange-100 cursor-pointer"
                                        wire:click="indexPilihan({{ $item->id }})">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->nama_pasien }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $item->nik_index }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->tanggal_lahir }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->alamat }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ ucwords(strtolower($item->regency->name)) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ ucwords(strtolower($item->district->name)) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="w-full h-64 flex-grow  flex items-center  justify-center flex-col">
                        <i class=" text-orange-500 text-xl ph-bold ph-x"></i>
                        <p class=" font-medium text-center align-middle">Data tidak ditemukan</p>
                    </div>
                @endif
            @elseif($hasil == null)
                <div class="w-full h-5/6 flex justify-center items-center flex-col">
                    <i class="ph ph-database text-3xl"></i>
                    Data akan muncul di sini
                </div>


            @endif

        </div>



    </div>
    <div class="bg-white rounded-lg w-full overflow-hidden">
        <div class="bg-orange-100 p-4 px-6 text-sm font-semibold uppercase text-gray-700">
            <p>Form IK Rumah Tangga</p>
        </div>
        <form action="/tambah-ikrt/{{ $index ? $index->id : '' }}" method="POST" class="bg-white rounded-lg p-6">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="kegiatan IK"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kegiatan IK</label>
                    <select id="kegiatanIk" name="kegiatanIk"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value='' selected>Pilih</option>
                        <option value='Revisit'>Revisit</option>
                        <option value='Re-IK'>Re-IK</option>
                    </select>
                </div>
                <div>
                    <label for="fasyankes"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                    <select id="fasyankes" name="fasyankes" required
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value='' selected>Pilih</option>
                        @if ($fasyankess)
                            @foreach ($fasyankess as $fasyankes)
                                <option value="{{ $fasyankes->id }}"
                                    @if ($index) {{ $fasyankes->id == $index->fasyankes_id ? 'selected' : '' }} @endif>
                                    {{ $fasyankes->nama_fasyankes }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div>
                    <label for="kader"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kader</label>
                    <select id="kader" name="kader" required
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value='' selected>Pilih</option>
                        @if ($kaders)
                            @foreach ($kaders as $kader)
                                <option value="{{ $kader->id }} "
                                    @if ($index) {{ $kader->id == $index->kader_id ? 'selected' : '' }} @endif>
                                    {{ $kader->nama . '(' . $kader->nik . ')' }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <button type="submit" {{ $index ? '' : 'disabled' }}
                class="relative text-white bg-orange-500 hover:bg-orange-300 focus:ring-4 {{ $index ? '' : '!bg-orange-300 cursor-not-allowed  before:absolute before:content-["pilih_data_ik_rumah_tangga"] before:shadow-md before:bg-white  before:whitespace-nowrap before:top-0 before:left-0  before:scale-0 before:transition-all hover:before:left-28  hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-3 before:rounded' }} focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center   before:text-black ">Submit</button>
        </form>
    </div>
    <style>
        .scroll-hide::-webkit-scrollbar {
            display: none;
        }
    </style>

    @script
        <script>
            const cariFasyankes = document.getElementById('cariFasyan');
            const fasyanContainer = document.getElementById('fasyankesKontainer');
            console.log(cariFasyankes, fasyanContainer);

            cariFasyankes.addEventListener('focus', function() {
                console.log('focus');
                fasyanContainer.classList.remove('hidden');
            });

            cariFasyankes.addEventListener('blur', function() {
                setTimeout(function() {
                    fasyanContainer.classList.add('hidden');
                }, 300);
            });
        </script>
    @endscript
</div>
