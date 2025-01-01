<div class="w-full h-full absolute z-50 top-0 left-0 flex items-center justify-center px-40 py-20 ">
    <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

    </div>
    <div class="bg-white w-full h-full rounded-xl  overflow-hidden z-20">
        <div class="w-full bg-orange-100 ">
            <p class="uppercase font-semibold text-gray-700 p-4">Detail Index</p>
            <i class="text-lg p-4 ph-bold cursor-pointer transition-all ph-x text-gray-700 active:scale-90"
                wire:click='close'></i>
        </div>

        <div class="bg-white w-full h-full overflow-y-scroll p-8 ">
           
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="sumberData" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber
                        Data</label>
                    <select id="sumberData" name="sumberData" disabled
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>{{ $details->sumber_data }}</option>
                        <option value="pmdt">PMDT</option>
                        <option value="fasyankes">Fasyankes</option>
                        <option value="dppm">DPPM</option>
                    </select>
                </div>

                <div>
                    <label for="fasyankes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type
                        Fasyankes</label>
                    <select id="fasyankes" name="fasyankes" disabled
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>{{ $details->type_fasyankes }}</option>
                        <option value="puskesmas">Puskesmas</option>
                        <option value="klinik">Klinik</option>
                        <option value="rumah sakit">Rumah Sakit</option>
                    </select>
                </div>

                <div>
                    <label for="tahunIndex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                        Index</label>
                    <select id="tahunIndex" name="tahunIndex" disabled
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
                    <select id="semesterIndex" disabled name="semesterIndex"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>{{ $details->semester_index }}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>


                {{-- <div>
                    <label for="nomorRegister" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                        Register
                        TBC.03/06 Indeks</label>
                    <input type="text" id="nomorRegister" name="nomorRegister"
                        value="{{ $details->nomor_register_tbc }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="No. Register TBC.03/06 Indeks" disabled />
                </div> --}}
                <div>
                    <label for="namaPasien" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Pasien</label>
                    <input type="text" id="namaPasien" name="namaPasien" value="{{ $details->nama_pasien }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Nama Pasien" disabled />
                </div>
                {{-- <div>
                    <label for="nomorTerduga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                        Terduga</label>
                    <input type="tel" id="nomorTerduga" name="nomorTerduga" value="{{ $details->no_terduga }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Nomor Terduga" disabled />
                </div> --}}
                <div>
                    <label for="nikIndex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK
                        Index</label>
                    <input type="text" id="nikIndex" name="nikIndex" value="{{ $details->nik_index }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="NIK Index" disabled />
                </div>

                <div>
                    <label for="tanggalLahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tanggalLahir" id="tanggalLahir" value="{{ $details->tanggal_lahir }}"
                        wire:model.live='tglLahir' disabled
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                </div>

                <div>
                    <label for="jenisKelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Kelamin</label>
                    <select id="jenisKelamin" name="jenisKelamin" disabled
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>{{ $details->jenis_kelamin }}</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>

                <div>
                    <label for="kabupaten"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                    <select id="kabupaten" name="kabupaten" disabled
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>{{ ucwords(strtolower($details->regency->name)) }} </option>
                    </select>
                </div>

                <div>
                    <label for="kecamatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" disabled
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>{{ ucwords(strtolower($details->district->name)) }} </option>
                    </select>
                </div>

                <div>
                    <label for="alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input id="alamat" rows="4" name="alamat" disabled value="{{ $details->alamat }}"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border !border-orange-200 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Alamat" />
                </div>
                <div>
                    <label for="namaFasyankes"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                    <input type="text" id="fasyankes" name="namaFasyankes"
                        value="{{ $details->fasyankes->nama_fasyankes }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="nama Fasyankes" disabled />
                </div>
                <div>
                    <label for="ssr"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                    <input type="text" id="ssr" name="ssr" value="{{ $details->ssr->nama }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="ssr" disabled />
                </div>
            </div>
        </div>
    </div>
</div>
