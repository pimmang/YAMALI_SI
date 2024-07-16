<div class="h-fit w-full  pb-20">
    <div class="w-full rounded-xl h-fit bg-white shadow-lg mb-6 p-4 grid grid-cols-2">
        <div class="w-full pe-4">
            <div
                class="bg-orange-100 py-4 px-6 text-sm font-semibold uppercase text-gray-700 rounded-md flex items-center">
                <p class="text-xs font-bold ">Cari data dari investigasi kontak Rumah Tangga</p>
            </div>
            <form action="" class="flex flex-col gap-2 p-5">
                @csrf
                <div class="text-xs">
                    <label for="tahun&semester" class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Tahun
                        dan Semester </label>
                    <select id="countries" wire:model.change = "tahunSemester" {{ $ikrt ? 'disabled' : '' }}
                        class=" border {{ $ikrt ? 'bg-gray-100' : 'bg-white' }} !border-orange-200 text-gray-900 text-xs rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="{{ $tahun->year - 5 }}-1">IK Rumah Tangga {{ $tahun->year - 5 }} Semester 1
                        </option>
                        <option value="{{ $tahun->year - 5 }}-2">IK Rumah Tangga {{ $tahun->year - 5 }} Semester 2
                        </option>
                        <option value="{{ $tahun->year - 4 }}-1">IK Rumah Tangga {{ $tahun->year - 4 }} Semester 1
                        </option>
                        <option value="{{ $tahun->year - 4 }}-2">IK Rumah Tangga {{ $tahun->year - 4 }} Semester 2
                        </option>
                        <option value="{{ $tahun->year - 3 }}-1">IK Rumah Tangga {{ $tahun->year - 3 }} Semester 1
                        </option>
                        <option value="{{ $tahun->year - 3 }}-2">IK Rumah Tangga {{ $tahun->year - 3 }} Semester 2
                        </option>
                        <option value="{{ $tahun->year - 2 }}-1">IK Rumah Tangga {{ $tahun->year - 2 }} Semester 1
                        </option>
                        <option value="{{ $tahun->year - 2 }}-2">IK Rumah Tangga {{ $tahun->year - 2 }} Semester 2
                        </option>
                        <option value="{{ $tahun->year - 1 }}-1">IK Rumah Tangga {{ $tahun->year - 1 }} Semester
                            1
                        </option>
                        <option value="{{ $tahun->year - 1 }}-2">IK Rumah Tangga {{ $tahun->year - 1 }} Semester
                            2
                        </option>
                        <option value="{{ $tahun->year }}-1">IK Rumah Tangga {{ $tahun->year }} Semester 1
                        </option>
                        <option value="{{ $tahun->year }}-2">IK Rumah Tangga {{ $tahun->year }} Semester 2
                        </option>
                    </select>
                </div>
                <div>
                    <label for="provinsi"
                        class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Provinsi</label>
                    <select id="provinsi" {{ $ikrt ? 'disabled' : '' }}
                        class="{{ $ikrt ? 'bg-gray-100' : 'bg-white' }} border !border-orange-200 text-gray-900 text-xs rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value = 'sulawesi selatan'>Sulawesi Selatan</option>
                    </select>
                </div>
                <div>
                    <label for="kabupaten"
                        class="block mb-2 text-xs font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                    <select id="kabupaten" wire:model.change="kabupaten_id" {{ $ikrt ? 'disabled' : '' }}
                        class="{{ $ikrt ? 'bg-gray-100' : 'bg-white' }} border !border-orange-200 text-gray-900 text-xs rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
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
                    <input type="text" id="cariFasyankes" wire:model.live="cariFasyankes" autocomplete="off"
                        {{ $ikrt ? 'disabled' : '' }}
                        class="{{ $ikrt ? 'bg-gray-100' : 'bg-white' }} border !border-orange-200 text-gray-900 text-xs rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Ketik nama/kode fasyankes" required />

                    <div id="fasyanContainer"
                        class="absolute {{ $hidden ? 'hidden' : '' }} top-20 border-solid border border-orange-300 bg-white rounded-lg shadow w-full max-h-52 p-2 overflow-hidden ">

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

                    <script>
                        const cariFasyankes = document.getElementById('cariFasyankes');
                        const fasyanContainer = document.getElementById('fasyanContainer');

                        cariFasyankes.addEventListener('focus', function() {
                            fasyanContainer.classList.remove('hidden');
                        });

                        cariFasyankes.addEventListener('blur', function() {
                            setTimeout(function() {
                                fasyanContainer.classList.add('hidden');
                            }, 300);
                        });
                    </script>
                </div>

            </form>
        </div>
        <div class="w-full ps-4 border-l border-orange-500 ">
            <div
                class="bg-orange-100 py-4 px-6 text-sm font-semibold uppercase text-gray-700 rounded-md flex items-center">
                <p class="text-xs font-bold ">Data Investigasi Kontak Rumah Tangga</p>
            </div>

            @if ($ikrt)
                <div class="w-full p-4 grid grid-cols-2 gap-4 text-sm font-medium text-gray-700 capitalize">

                    <p
                        class="relative  text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1 after:left-0 after:content-[' ']  ">
                        Nama</p>
                    <p
                        class=" relative  text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1  after:left-0 after:content-[' '] ">
                        NIK</p>
                    <p class="text-xs font-semibold text-gray-700">{{ $ikrt->nama_pasien }}</p>
                    <p class="text-xs font-semibold text-gray-700">{{ $ikrt->nik_index }}</p>
                    <p
                        class="text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1 relative  after:left-0 after:content-[' ']">
                        Tgl Lahir
                    </p>
                    <p
                        class="text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1 relative  after:left-0 after:content-[' ']">
                        Kecamatan</p>
                    <p class="text-xs font-semibold text-gray-700">{{ $ikrt->tanggal_lahir }}</p>
                    <p class="text-xs font-semibold text-gray-700 ">{{ ucwords(strtolower($ikrt->district->name)) }}
                    </p>
                    <p
                        class="text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1 relative  after:left-0 after:content-[' ']">
                        Kabupaten</p>
                    <p
                        class="text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1 relative  after:left-0 after:content-[' ']">
                        provinsi</p>
                    <p class="text-xs font-semibold text-gray-700">{{ ucwords(strtolower($ikrt->regency->name)) }}</p>
                    <p class="text-xs font-semibold text-gray-700">{{ ucwords(strtolower($ikrt->province->name)) }}</p>
                    <p
                        class="text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1 relative  after:left-0 after:content-[' ']">
                        Alamat</p>
                    <p
                        class="text-xs after:w-36 after:border-solid after:border-b after:border-gray-400 after:absolute after:-bottom-1 relative  after:left-0 after:content-[' ']">
                        SSR</p>
                    <p class="text-xs font-semibold text-gray-700">{{ $ikrt->alamat }}</p>
                    <p class="text-xs font-semibold text-gray-700">{{ $ikrt->ssr->nama }}</p>
                </div>
                <div class="w-full flex justify-end">
                    <x-primary-button class="w-fit gap-2" wire:click='resetIkrt'>
                        <i class="ph ph-table text-lg"></i> Reset
                    </x-primary-button>
                </div>
            @elseif($hasil)
                @if ($hasil->count() > 0)
                    <div class="relative overflow-auto rounded-lg flex-grow h-72">
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
                                        SSR
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hasil as $item)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-orange-100 cursor-pointer"
                                        wire:click="ikrtPilihan({{ $item->id }})">
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
                                            {{ $item->ssr->nama }}
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
            <p>Form IK Non Rumah Tangga</p>
        </div>
        <form action="/tambah-iknrt/{{ $ikrt ? $ikrt->id : '' }}" method="POST" class="bg-white rounded-lg p-6">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="lokasi-penyuluhan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                        Penyuluhan</label>
                    <select id="lokasi-penyuluhan" required name="lokasiPenyuluhan"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="">Pilih</option>
                        <option value="Balai Desa/warga">Balai Desa/Warga</option>
                        <option value="Pertemuan RT/RW/Kel/Kec">Pertemuan RT/RW/Kel/Kec</option>
                        <option value="Lingkungan Sekitar Tempat Tinggal">Lingkungan Sekitar Tempat Tinggal </option>
                        <option value="Pertemuan PKK/Posyandu/Arisan">Pertemuan PKK/Posyandu/Arisan </option>
                        <option value="Lingkungan Kupat-kumis">Lingkungan Kupat-kumis</option>
                        <option value="Pengungsian">Pengungsian</option>
                        <option value="Bantaran Kali">Bantaran Kali</option>
                        <option value="Sekolah (SD/SMP/SMA)">Sekolah (SD/SMP/SMA)</option>
                        <option value="Perguruan Tinggi">Perguruan Tinggi</option>
                        <option value="Tempat Kerja(Perkantoran/pabrik/dll)">Tempat Kerja(Perkantoran/pabrik/dll)
                        </option>
                        <option value="Rutan/Lapas">Rutan/Lapas</option>
                        <option value="Pondok Pesantren">Pondok Pesantren</option>
                        <option value="Panti Asuhan">Panti Asuhan</option>
                        <option value="Panti Jompo">Panti Jompo</option>
                    </select>
                </div>
                <div>
                    <label for="tanggal-penyuluhan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Penyuluhan</label>

                    <input id="tanggal-penyuluhan" name="tglPenyuluhan" type="date" required
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:!border-orange-500 block w-full p-2.5 "
                        placeholder="Select date">

                </div>

                <div>
                    <label for="waktu-penyuluhan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                        Penyuluhan</label>
                    <select id="waktu-penyuluhan" required name="waktuPenyuluhan"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected value="">Pilih</option>
                        <option value="pagi">Pagi</option>
                        <option value="siang">Siang</option>
                        <option value="malam">Malam</option>
                    </select>
                </div>
                <div>
                    <label for="jenis-penyuluhan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Penyuluhan</label>
                    <select id="jenis-penyuluhan" required name="jenisPenyuluhan"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected value="">Pilih</option>
                        <option value="Budget">Budget</option>
                        <option value="Non-Budget">Non-Budget</option>
                    </select>
                </div>
                <div>
                    <label for="provinsi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                    <select id="provinsi" required name="provinsi"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value = '73'>Sulawesi Selatan</option>
                    </select>
                </div>
                <div>
                    <label for="kabupaten"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                    <select id="kabupaten" wire:model.change="kabupaten_form" required name="kabupaten"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="">Pilih</option>
                        @foreach ($kabupaten as $kab)
                            <option value={{ $kab->id }} {{ $kab->id == $kabupaten_id ? 'selected' : '' }}>
                                {{ ucwords(strtolower($kab->name)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="kecamatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" required
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="">Pilih</option>
                        @if ($kecamatan)
                            @foreach ($kecamatan as $kec)
                                <option value='{{ $kec->id }}'>{{ ucwords(strtolower($kec->name)) }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div>
                    <label for="Sr"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SR</label>
                    <select id="Sr" required name="sr"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="sulawesi selatan">Sulawesi Selatan</option>
                    </select>
                </div>

                <div>
                    <label for="ssr"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                    <select id="ssr" name="ssr" wire:model.live='ssrPilihan' required
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value='' selected>Pilih</option>
                        @foreach ($ssrs as $ssr)
                            <option value="{{ $ssr->id }}"
                                @if ($ikrt) {{ $ssr->id == $ikrt->ssr_id ? 'selected' : '' }} @endif>
                                {{ $ssr->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="namaFasyankes"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                    <select id="namaFasyankes" name="namaFasyankes" required
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value='' selected>Pilih</option>
                        @if ($fasyankes)
                            @foreach ($fasyankes as $fasyan)
                                <option value="{{ $fasyan->id }}"
                                    @if ($ikrt) {{ $fasyan->id == $ikrt->fasyankes_id ? 'selected' : '' }} @endif>
                                    {{ $fasyan->nama_fasyankes . '(' . $fasyan->kode_fasyankes . ')' }}</option>
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
                                    @if ($ikrt) {{ $kader->id == $ikrt->kader_id ? 'selected' : '' }} @endif>
                                    {{ $kader->nama . '(' . $kader->nik . ')' }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>


            </div>

            <button type="submit" {{ $ikrt ? '' : 'disabled' }}
                class="relative text-white bg-orange-500 hover:bg-orange-300 focus:ring-4 {{ $ikrt ? '' : '!bg-orange-300 cursor-not-allowed  before:absolute before:content-["pilih_data_ik_rumah_tangga"] before:shadow-md before:bg-white  before:whitespace-nowrap before:top-0 before:left-0  before:scale-0 before:transition-all hover:before:left-28  hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-3 before:rounded' }} focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center   before:text-black ">Submit</button>
        </form>
    </div>
    <style>
        .scroll-hide::-webkit-scrollbar {
            display: none;
        }
    </style>
</div>
