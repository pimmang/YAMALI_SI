<div class="h-fit w-full  pb-20">
    <div class="w-full bg-white mb-10 overflow-hidden rounded-lg shadow">
        <div class="w-full bg-orange-50 p-4">
            <p class="uppercase font-semibold text-sm text-gray-700">Data Terduga</p>
        </div>
        @if ($data)
            <div class="w-full flex p-4 gap-10 text-sm font-medium text-gray-700">
                <div class="flex flex-col items-start gap-4 ">
                    <p>Nama Terduga</p>
                    <p>NIK Terduga</p>
                    <p>Nomor Telepon</p>
                    <p>SSR</p>
                    <p>Alamat</p>
                    @if ($data->i_k_rumah_tangga_id)
                        <p>Kecamatan, Kota/Kabupaten</p>
                        <p>Jenis IK</p>
                    @else
                        <p>Jenis Penyuluhan</p>
                        <p>Lokasi Penyuluhan (Kecamatan, Kota/Kabupaten)</p>
                    @endif

                </div>
                <div class="flex flex-col items-start gap-4 ">
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                </div>
                <div class="flex flex-col items-start gap-4 uppercase ">
                    <p>{{ $data->nama }}</p>
                    <p>{{ $data->nik_kontak }}</p>
                    <p>{{ $data->no_telepon }}</p>
                    <p>
                        @if ($data->i_k_rumah_tangga_id)
                            {{ ucwords(strtolower($data->iKRumahTangga->index->ssr->nama)) }}
                        @else
                            {{ ucwords(strtolower($data->iKNRumahTangga->index->ssr->nama)) }}
                        @endif
                    </p>
                    <p>{{ $data->alamat }}</p>
                    @if ($data->i_k_rumah_tangga_id)
                        <p>
                            {{ ucwords(strtolower($data->iKRumahTangga->index->district->name . ', ' . $data->iKRumahTangga->index->regency->name)) }}
                        </p>
                        <p>
                            {{ ucwords(strtolower($data->iKRumahTangga->kegiatan_ik ? $data->iKRumahTangga->kegiatan_ik : '-')) }}
                        </p>
                    @else
                        <p>
                            {{ ucwords(strtolower($data->iKNRumahTangga->jenis_penyuluhan)) }}
                        </p>
                        <p>
                            {{ ucwords(strtolower($data->iKNRumahTangga->district->name . ', ' . $data->iKNRumahTangga->regency->name)) }}
                        </p>
                    @endif
                </div>
            </div>
        @else
            <div class="p-16 w-full text-center flex flex-col">
                <i class="ph ph-database text-5xl"></i>
                <p>Cari pasien terduga terlebih dahulu</p>
            </div>
        @endif

    </div>
    @if ($data)
        <form action="/tambah-terduga/{{ $data->id }}" method="POST">
            <div class="bg-white rounded-lg overflow-hidden shadow">
                <div class="w-full bg-orange-50 p-4">
                    <p class="uppercase font-semibold text-sm text-gray-700">Form Terduga</p>
                </div>
                @csrf
                <div class="grid gap-10  md:grid-cols-2 p-5">
                    {{-- <div>
                        <label for="namaFasyankes"
                            class="block mb-2 required text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                        <select id="namaFasyankes" name="namaFasyankes" required
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            @if ($fasyankes)
                                @foreach ($fasyankes as $fasyan)
                                    <option value="{{ $fasyan->id }}"
                                        {{ $fasyan->id == $fasyankesIdPilihan ? 'selected' : '' }}>
                                        {{ $fasyan->nama_fasyankes . '(' . $fasyan->kode_fasyankes . ')' }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div> --}}
                    <div>
                        <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required">Mulai kembali
                            pengobatan
                        </h3>
                        <ul
                            class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-400 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <li
                                class="w-full border-b border-orange-400 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="mulaiKembaliBerobat1" type="radio" value="1" required
                                        name="mulaiKembaliBerobat"
                                        class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                    <label for="mulaiKembaliBerobat1"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                <div class="flex items-center ps-3">
                                    <input id="mulaiKembaliBerobat2" type="radio" value="0" required
                                        name="mulaiKembaliBerobat"
                                        class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                    <label for="mulaiKembaliBerobat2"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                </div>
                            </li>
                        </ul>
                    </div>


                    <div>
                        <label for="namaPetugasTbc"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">Nama
                            Petugas TBC</label>
                        <input type="text" id="namaPetugasTbc" name="namaPetugasTbc"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                            placeholder="Nama PetugasTbc" required />
                    </div>
                    <div>
                        <label for="noTeleponPetugas"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">Nomor
                            Telepon
                            Petugas TBC</label>
                        <input type="number" id="noTeleponPetugas" name="noTeleponPetugas"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                            placeholder="Nomor telepon petugas TBC" required />
                    </div>

                    <div>
                        <label for="tglHasilPemeriksaanDahak"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">Tanggal Hasil
                            Pemeriksaan
                            Dahak</label>
                        <input type="date" name="tglHasilPemeriksaanDahak" id="tglHasilPemeriksaanDahak"
                            wire:model.live='tglHasilPemeriksaandahak' required
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    </div>

                    <div>
                        <h3 class="block mb-2 text-sm font-medium text-gray-900 required dark:text-white">Covid-19</h3>
                        <ul
                            class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-400 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <li
                                class="w-full border-b border-orange-400 sm:border-b-0 sm:border-r dark:border-gray-600">
                                <div class="flex items-center ps-3">
                                    <input id="covid1" type="radio" value="1" name="covid" required
                                        class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                    <label for="covid1"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                <div class="flex items-center ps-3">
                                    <input id="covid2" type="radio" value="0" name="covid" required
                                        class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                    <label for="covid2"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <label for="tipePemeriksaan"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">Tipe
                            Pemeriksaan Pasien</label>
                        <select id="tipePemeriksaan" name="tipePemeriksaan" required wire:model.change="tipePemeriksaan"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option selected value="">Pilih</option>
                            <option value="BTA +">BTA +</option>
                            <option value="BTA -">BTA -</option>
                            <option value="CXR +">CXR +</option>
                            <option value="CXR -">CXR -</option>
                            <option value="Extra Paru">Extra Paru</option>
                            <option value="Rontgen +">Rontgen +</option>
                            <option value="Rontgen -">Rontgen -</option>
                            <option value="TCM +">TCM +</option>
                            <option value="TCM -">TCM -</option>
                        </select>
                    </div>






                </div>
            </div>
            @if (
                $tipePemeriksaan == 'BTA +' ||
                    $tipePemeriksaan == 'CXR +' ||
                    $tipePemeriksaan == 'Extra Paru +' ||
                    $tipePemeriksaan == 'Rontgen +' ||
                    $tipePemeriksaan == 'TCM +')
                <div class="w-full bg-white rounded-lg shadow mt-8 overflow-hidden ">
                    <div class="w-full bg-orange-50 p-4">
                        <p class="uppercase font-semibold text-sm text-gray-700">Positif TBC</p>
                    </div>
                    <div class="grid gap-10  md:grid-cols-2 p-5">
                        <div>
                            <label for="namaPetugasPKM"
                                class="block mb-2 text-sm font-medium required text-gray-900 dark:text-white">Nama
                                Petugas PKM</label>
                            <input type="text" id="namaPetugasPKM" name="namaPetugasPKM"
                                class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="Nama PetugasPKM" required />
                        </div>
                        <div>
                            <label for="tglVerifikasi"
                                class="block mb-2 text-sm font-medium required text-gray-900 dark:text-white">Tanggal
                                Verifikasi</label>
                            <input type="date" name="tglVerifikasi" id="tglVerifikasi"
                                wire:model.live='tglVerifikasi' required
                                class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        </div>

                        <div>
                            <label for="namaPMO"
                                class="block mb-2 text-sm font-medium required text-gray-900 dark:text-white">Nama
                                PMO</label>
                            <input type="text" id="namaPMO" name="namaPMO"
                                class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="Nama PMO" required />
                        </div>
                        <div>
                            <label for="noTeleponPMO"
                                class="block mb-2 text-sm font-medium required text-gray-900 dark:text-white">Nomor
                                Telepon
                                PMO</label>
                            <input type="number" id="noTeleponPMO" name="noTeleponPMO"
                                class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="Nomor telepon PMO" required />
                        </div>

                        <div>
                            <label for="tipePMO"
                                class="block mb-2 text-sm font-medium required text-gray-900 dark:text-white">Tipe
                                PMO</label>
                            <select id="tipePMO" name="tipePMO" required
                                class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option value="" selected>Pilih</option>
                                <option value="Keluarga">Keluarga</option>
                                <option value="Non-Keluarga">Non-Keluarga</option>
                            </select>
                        </div>

                        <div>
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required">Edukasi
                                HIV
                            </h3>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-400 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li
                                    class="w-full border-b border-orange-400 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="edukasiHIV1" type="radio" value="1" required
                                            name="edukasiHIV"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="edukasiHIV1"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sudah
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                    <div class="flex items-center ps-3">
                                        <input id="edukasiHIV2" type="radio" value="0" required
                                            name="edukasiHIV"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="edukasiHIV2"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Belum</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <label for="catatan"
                                class="block mb-2 text-sm font-medium opsional text-gray-900 dark:text-white">Catatan</label>
                            <input type="text" name="catatan" id="catatan" wire:model.live='catatan'
                                placeholder="Catatan"
                                class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        </div>

                    </div>
                </div>
            @endif
            <div class="w-full flex justify-between items-center bg-white mt-8 p-5 rounded-lg overflow-hidden shadow">
                <div class="flex items-center h-full gap-4 text-sm font-medium text-gray-700">
                    <p class="ms-5 mt-2"><span class="text-red-500">*</span> : Wajib diisi</p>
                    <p class="ms-5"><span class="text-yellow-300">*</span> : Opsional</p>
                </div>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    @endif

    <style>
        .required::after {
            content: " *";
            color: red;
        }

        .opsional::after {
            content: " *";
            color: rgb(253 224 71);
        }
    </style>
</div>
