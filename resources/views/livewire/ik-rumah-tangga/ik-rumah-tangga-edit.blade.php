<div class="w-full h-full absolute z-50 top-0 left-0 flex items-center justify-center px-40 py-20 ">
    <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

    </div>
    <div class="bg-white w-full h-full rounded-xl p-8 z-20">
        <div class="bg-white w-full h-full overflow-y-scroll">
            <div class="flex justify-between items-top">
                <h1 class="font-bold text-black text-xl mb-8">Edit</h1>
                {{-- <div class="flex items-top gap-5 pe-10">
                    <div
                        class="relative before:absolute before:z-50 before:content-['Edit'] before:shadow-md before:bg-white before:bottom-0 before:scale-0 before:transition-all hover:before:-bottom-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                        <i
                            class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
                    </div>
                    <div
                        class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:bottom-0 before:scale-0 before:transition-all hover:before:-bottom-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                        <i
                            class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
                    </div>
                </div> --}}
            </div>
            <div>
                <form action="/edit-ik-rumah-tangga/{{ $details->id }}" method="POST">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="sumberData"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber
                                Data</label>
                            <select id="sumberData" name="sumberData"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option selected>{{ $details->sumber_data }}</option>
                                <option value="pmdt">PMDT</option>
                                <option value="fasyankes">Fasyankes</option>
                                <option value="dppm">DPPM</option>
                            </select>
                        </div>

                        <div>
                            <label for="fasyankes"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                            <select id="fasyankes" name="fasyankes"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option selected>{{ $details->type_fasyankes }}</option>
                                <option value="puskesmas">Puskesmas</option>
                                <option value="klinik">Klinik</option>
                                <option value="rumah sakit">Rumah Sakit</option>
                            </select>
                        </div>

                        <div>
                            <label for="tahunIndex"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                                Index</label>
                            <select id="tahunIndex" name="tahunIndex"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option selected>{{ $details->tahun_index }}</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                            </select>
                        </div>

                        <div>
                            <label for="semesterIndex"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">semester
                                Index</label>
                            <select id="semesterIndex" name="semesterIndex"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option selected>{{ $details->semester_index }}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div>
                            <label for="kegiatanIk"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kegiatan
                                IK</label>
                            <select id="kegiatanIk" name="kegiatanIk"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option selected>{{ $details->kegiatan_ik }}</option>
                                <option value="re-visit">Re-visit</option>
                                <option value="re-ik">Re-IK (IK Ulang)</option>
                            </select>
                        </div>
                        <div>
                            <label for="idPasien"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID
                                Pasien</label>
                            <input type="text" id="idPasien" name="idPasien" value="{{ $details->id }}" disabled
                                class=" border bg-gray-50 !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 cursor-not-allowed">
                        </div>
                        <div>
                            <label for="nomorRegister"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                                Register
                                TBC.03/06 Indeks</label>
                            <input type="text" id="nomorRegister" name="nomorRegister"
                                value="{{ $details->nomor_register_tbc }}" disabled
                                class="bg-gray-50 border cursor-not-allowed !border-orange-200  text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="No. Register TBC.03/06 Indeks" />
                        </div>
                        <div>
                            <label for="namaPasien"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Pasien</label>
                            <input type="text" id="namaPasien" name="namaPasien" value="{{ $details->nama_pasien }}"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="Nama Pasien" />
                        </div>
                        <div>
                            <label for="nomorTerduga"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                Terduga</label>
                            <input type="tel" id="nomorTerduga" name="nomorTerduga"
                                value="{{ $details->no_terduga }}"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="Nomor Terduga" />
                        </div>
                        <div>
                            <label for="nikIndex"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK
                                Index</label>
                            <input type="text" id="nikIndex" name="nikIndex" value="{{ $details->nik_index }}"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="NIK Index" />
                        </div>

                        <div>
                            <label for="tanggalLahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Lahir</label>
                            <input type="date" name="tanggalLahir" id="tanggalLahir" wire:model.live='tglLahir'
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        </div>

                        <div>
                            <label for="jenisKelamin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <select id="jenisKelamin" name="jenisKelamin"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option selected>{{ $details->jenis_kelamin }}</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div>
                            <label for="umur"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                            <div class="relative flex overflow-hidden rounded-lg">
                                <input type="number" id="umur" name="umur" value="{{ $umur }}"
                                    disabled
                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                    placeholder="Umur" />
                                <div
                                    class="absolute right-0 flex items-center justify-center h-full w-1/5 px-4 bg-orange-300 text-gray-500">
                                    <label class=" text-sm font-medium w-fit text-white">Tahun</label>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="provinsi"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                            <select id="provinsi" name="provinsi"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option value="{{ $details->province_id }}" selected>
                                    {{ ucwords(strtolower($details->province->name)) }} </option>
                            </select>
                        </div>

                        <div>
                            <label for="kabupaten"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                            <select id="kabupaten" wire:model.change="kabupaten_id" name="kabupaten"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                @foreach ($kabupaten as $kab)
                                    <option value={{ $kab->id }}
                                        {{ $details->regency_id == $kab->id ? 'selected' : '' }}>
                                        {{ ucwords(strtolower($kab->name)) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="kecamatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                            <select id="kecamatan" name="kecamatan" value="{{ $details->district_id }}"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">

                                @if ($kecamatan)
                                    @foreach ($kecamatan as $kec)
                                        <option value='{{ $kec->id }}'
                                            {{ $details->district_id == $kec->id ? 'selected' : '' }}>
                                            {{ ucwords(strtolower($kec->name)) }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-span-2">
                            <label for="alamat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <textarea id="alamat" rows="4" name="alamat"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border !border-orange-200 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="Alamat">{{ $details->alamat }}</textarea>
                        </div>

                        <div>
                            <label for="sr"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SR</label>
                            <select id="sr" name="sr"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option value="sulawesi selatan">Sulawesi Selatan</option>
                            </select>
                        </div>

                        <div>
                            <label for="ssr"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                            <select id="ssr" name="ssr" wire:model.live='ssrPilihan'
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">

                                @foreach ($ssrs as $ssr)
                                    <option value="{{ $ssr->id }}"
                                        {{ $details->ssr_id == $ssr->id ? 'selected' : '' }}>{{ $ssr->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="namaFasyankes"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                            <select id="namaFasyankes" name="namaFasyankes"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                @if ($fasyankes)
                                    @foreach ($fasyankes as $fasyan)
                                        <option value="{{ $fasyan->id }}"
                                            {{ $details->fasyankes_id == $fasyan->id ? 'selected' : '' }}>
                                            {{ $fasyan->nama_fasyankes . '(' . $fasyan->kode_fasyankes . ')' }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div>
                            <label for="kader"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kader</label>
                            <select id="kader" name="kader"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">

                                @if ($kaders)
                                    @foreach ($kaders as $kader)
                                        <option value="{{ $kader->id }}"
                                            {{ $details->kader_id == $kader->id ? 'selected' : '' }}>
                                            {{ $kader->nama . '(' . $kader->nik . ')' }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                    </div>
                    <button type="submit"
                        class="text-white !bg-orange-600 !hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
