<div class="h-fit w-full  pb-20">
    <form action="/ik-rumah-tangga" method="POST">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="sumberData" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber
                    Data</label>
                <select id="sumberData" name="sumberData" required
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Pilih</option>
                    <option value="PMDT">PMDT</option>
                    <option value="Fasyankes">Fasyankes</option>
                    <option value="DPPM">DPPM</option>
                </select>
            </div>

            <div>
                <label for="fasyankes"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                <select id="fasyankes" name="fasyankes" required
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Pilih</option>
                    <option value="Puskesmas">Puskesmas</option>
                    <option value="Klinik">Klinik</option>
                    <option value="Rumah Sakit">Rumah Sakit</option>
                </select>
            </div>

            <div>
                <label for="tahunIndex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                    Index</label>
                <select id="tahunIndex" name="tahunIndex" required
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Pilih</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                </select>
            </div>

            <div>
                <label for="semesterIndex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">semester
                    Index</label>
                <select id="semesterIndex" required name="semesterIndex"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Pilih</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div>
            <div>
                <label for="kegiatanIk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kegiatan
                    IK</label>
                <select id="kegiatanIk" name="kegiatanIk"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option value="" selected>Pilih</option>
                    <option value="re-visit">Re-visit</option>
                    <option value="re-ik">Re-IK (IK Ulang)</option>
                </select>
            </div>
            <div>
                <label for="idPasien" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID
                    Pasien</label>
                <input type="text" id="idPasien" placeholder="ID Pasien"
                    class="bg-gray-100 border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 cursor-not-allowed"
                    value="" disabled>
            </div>
            <div>
                <label for="nomorRegister" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                    Register
                    TBC.03/06 Indeks</label>
                <input type="text" id="nomorRegister" name="nomorRegister"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                    placeholder="No. Register TBC.03/06 Indeks" disabled />
            </div>
            <div>
                <label for="namaPasien" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Pasien</label>
                <input type="text" id="namaPasien" name="namaPasien"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                    placeholder="Nama Pasien" required />
            </div>
            <div>
                <label for="nomorTerduga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                    Terduga</label>
                <input type="tel" id="nomorTerduga" name="nomorTerduga"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                    placeholder="Nomor Terduga" required />
            </div>
            <div>
                <label for="nikIndex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK
                    Index</label>
                <input type="text" id="nikIndex" name="nikIndex"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                    placeholder="NIK Index" required />
            </div>

            <div>
                <label for="tanggalLahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Lahir</label>
                <input type="date" name="tanggalLahir" id="tanggalLahir" wire:model.live='tglLahir' required
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
            </div>

            <div>
                <label for="jenisKelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Kelamin</label>
                <select id="jenisKelamin" name="jenisKelamin" required
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Pilih</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>

            <div>
                <label for="umur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                <div class="relative flex overflow-hidden rounded-lg">
                    <input type="number" id="umur" name="umur" value="{{ $umur }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Umur" disabled />
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
                    <option value ='73'>Sulawesi Selatan</option>
                </select>
            </div>

            <div>
                <label for="kabupaten"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                <select id="kabupaten" wire:model.change="kabupaten_id" name="kabupaten"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    @foreach ($kabupaten as $kab)
                        <option value={{ $kab->id }}>{{ ucwords(strtolower($kab->name)) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="kecamatan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                <select id="kecamatan" name="kecamatan"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    @if ($kecamatan)
                        @foreach ($kecamatan as $kec)
                            <option value='{{ $kec->id }}'>{{ ucwords(strtolower($kec->name)) }}
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
                    placeholder="Alamat"></textarea>
            </div>

            <div>
                <label for="sr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SR</label>
                <select id="sr" name="sr"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option value="sulawesi selatan">Sulawesi Selatan</option>
                </select>
            </div>

            <div>
                <label for="ssr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                <select id="ssr" name="ssr" wire:model.live='ssrPilihan'
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option value='' selected>Pilih</option>
                    @foreach ($ssrs as $ssr)
                        <option value="{{ $ssr->id }}">{{ $ssr->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="namaFasyankes"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                <select id="namaFasyankes" name="namaFasyankes"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option value='' selected>Pilih</option>
                    @if ($fasyankes)
                        @foreach ($fasyankes as $fasyan)
                            <option value="{{ $fasyan->id }}">
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
                    <option value='' selected>Pilih</option>
                    @if ($kaders)
                        @foreach ($kaders as $kader)
                            <option value="{{ $kader->id }}">{{ $kader->nama . '(' . $kader->nik . ')' }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</div>
