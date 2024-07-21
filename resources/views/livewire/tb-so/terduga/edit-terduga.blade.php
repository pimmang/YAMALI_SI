<div class="w-full h-full absolute z-50 top-0 left-0  flex items-center justify-center px-10 py-10  ">
    <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

    </div>
    <div class="w-full z-20 h-full flex gap-4 rounded-lg justify-center ">
        <div class="w-3/12 h-full flex flex-col bg-white mb-10 overflow-hidden rounded-lg shadow">
            <div class="w-full bg-orange-50 p-4 flex-none">
                <p class="uppercase font-semibold text-sm text-gray-700">Data</p>
            </div>
            <div class="w-full flex flex-grow flex-col p-4 justify-around text-sm font-medium text-gray-700">
                <p class="underline text-xs">Nama</p>
                <p class="uppercase font-bold">{{ $dataTerduga->kontak->nama }}</p>
                <p class="underline text-xs">NIK</p>
                <p class="uppercase font-bold">{{ $dataTerduga->kontak->nik_kontak }}</p>
                <p class="underline text-xs">Nomor Telepon</p>
                <p class="uppercase font-bold">{{ $dataTerduga->kontak->no_telepon }}</p>
                <p class="underline text-xs">Kecamatan, Kabupaten, Provinsi</p>
                @if ($dataTerduga->kontak->i_k_rumah_tangga_id)
                    <p class="uppercase font-bold">
                        {{ $dataTerduga->kontak->iKRumahTangga->district->name . ', ' . $dataTerduga->kontak->iKRumahTangga->regency->name . ', ' . $dataTerduga->kontak->iKRumahTangga->province->name }}
                    </p>
                @else
                    <p class="uppercase font-bold">
                        {{ $dataTerduga->kontak->iKNRumahTangga->district->name . ', ' . $dataTerduga->kontak->iKNRumahTangga->regency->name . ', ' . $dataTerduga->kontak->iKNRumahTangga->province->name }}
                    </p>
                @endif
                <p class="underline text-xs">SR</p>
                @if ($dataTerduga->kontak->iKrumahTangga)
                    <p class="uppercase font-bold">{{ $dataTerduga->kontak->iKRumahTangga->sr }}</p>
                @else
                    <p class="uppercase font-bold">{{ $dataTerduga->kontak->iKNRumahTangga->sr }}</p>
                @endif
                <p class="underline text-xs">SSR</p>
                @if ($dataTerduga->kontak->iKrumahTangga)
                    <p class="uppercase font-bold">{{ $dataTerduga->kontak->iKRumahTangga->ssr->nama }}</p>
                @else
                    <p class="uppercase font-bold">{{ $dataTerduga->kontak->iKNRumahTangga->ssr->nama }}</p>
                @endif
                @if ($dataTerduga->kontak->i_k_rumah_tangga_id)
                    <p class="underline text-xs">Kegiatan IK</p>
                    <p class="uppercase font-bold">{{ $dataTerduga->kontak->iKRumahTangga->kegiatan_ik }}</p>
                @else
                    <p class="underline text-xs">Jenis Penyuluhan</p>
                    <p class="uppercase font-bold">{{ $dataTerduga->kontak->iKNRumahTangga->jenis_penyuluhan }}</p>
                @endif

            </div>

        </div>

        <form action="/edit-terduga/{{ $dataTerduga->id }}" method="POST" class="h-full overflow-y-scroll flex-grow">
            <div class="bg-white rounded-lg overflow-hidden shadow ">
                <div class="w-full bg-orange-50 p-4">
                    <p class="uppercase font-semibold text-sm text-gray-700">Form Terduga</p>
                </div>
                @csrf
                <div class="grid gap-10  md:grid-cols-2 p-5">
                    <div>
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
                    </div>
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
                                        {{ $dataTerduga->mulai_kembali_berobat == 1 ? 'checked' : '' }}
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
                                        {{ $dataTerduga->mulai_kembali_berobat == 0 ? 'checked' : '' }}
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
                            value="{{ $dataTerduga->nama_petugas_tbc }}"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                            placeholder="Nama PetugasTbc" required />
                    </div>
                    <div>
                        <label for="noTeleponPetugas"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">Nomor
                            Telepon
                            Petugas TBC</label>
                        <input type="number" id="noTeleponPetugas" name="noTeleponPetugas"
                            value="{{ $dataTerduga->no_telepon_petugas_tbc }}"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                            placeholder="Nomor telepon petugas TBC" required />
                    </div>

                    <div>
                        <label for="tglHasilPemeriksaanDahak"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">Tanggal Hasil
                            Pemeriksaan
                            Dahak</label>
                        <input type="date" name="tglHasilPemeriksaanDahak" id="tglHasilPemeriksaanDahak"
                            value="{{ $dataTerduga->tgl_hasil_pemeriksaan_dahak }}" required
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
                                        {{ $dataTerduga->covid_19 == 1 ? 'checked' : '' }}
                                        class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                    <label for="covid1"
                                        class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                <div class="flex items-center ps-3">
                                    <input id="covid2" type="radio" value="0" name="covid" required
                                        {{ $dataTerduga->covid_19 == 0 ? 'checked' : '' }}
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
                        <select id="tipePemeriksaan" name="tipePemeriksaan" required
                            wire:model.change="tipePemeriksaan"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option>Pilih</option>
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
                    $tipePemeriksaan == 'Extra Paru' ||
                    $tipePemeriksaan == 'Rontgen +' ||
                    $tipePemeriksaan == 'TCM +')

                @if ($dataTernotifikasi)
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
                                    value="{{ $dataTernotifikasi->nama_petugas_pkm }}"
                                    class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                    placeholder="Nama PetugasPKM" required />
                            </div>
                            <div>
                                <label for="tglVerifikasi"
                                    class="block mb-2 text-sm font-medium required text-gray-900 dark:text-white">Tanggal
                                    Verifikasi</label>
                                <input type="date" name="tglVerifikasi" id="tglVerifikasi"
                                    value="{{ $dataTernotifikasi->tgl_verifikasi }}" wire:model.live='tglVerifikasi'
                                    required
                                    class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            </div>

                            <div>
                                <label for="namaPMO"
                                    class="block mb-2 text-sm font-medium required text-gray-900 dark:text-white">Nama
                                    PMO</label>
                                <input type="text" id="namaPMO" name="namaPMO"
                                    value="{{ $dataTernotifikasi->nama_pmo }}"
                                    class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                    placeholder="Nama PMO" required />
                            </div>
                            <div>
                                <label for="noTeleponPMO"
                                    class="block mb-2 text-sm font-medium required text-gray-900 dark:text-white">Nomor
                                    Telepon
                                    PMO</label>
                                <input type="number" id="noTeleponPMO" name="noTeleponPMO"
                                    value="{{ $dataTernotifikasi->no_telepon_pmo }}"
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
                                    <option value="Keluarga"
                                        {{ $dataTernotifikasi->tipe_pmo == 'Keluarga' ? 'selected' : '' }}>Keluarga
                                    </option>
                                    <option
                                        value="Non-Keluarga"{{ $dataTernotifikasi->tipe_pmo == 'Non-Keluarga' ? 'selected' : '' }}>
                                        Non-Keluarga</option>
                                </select>
                            </div>

                            <div>
                                <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required">
                                    Edukasi
                                    HIV
                                </h3>
                                <ul
                                    class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-400 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <li
                                        class="w-full border-b border-orange-400 sm:border-b-0 sm:border-r dark:border-gray-600">
                                        <div class="flex items-center ps-3">
                                            <input id="edukasiHIV1" type="radio" value="1" required
                                                {{ $dataTernotifikasi->edukasi_hiv == '1' ? 'checked' : '' }}
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
                                                {{ $dataTernotifikasi->edukasi_hiv == '0' ? 'checked' : '' }}
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
                                    value="{{ $dataTernotifikasi->catatan }}" placeholder="Catatan"
                                    class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            </div>

                        </div>
                    </div>
                @else
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
                                <input type="date" name="tglVerifikasi" id="tglVerifikasi" required
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
                                    <option value="Keluarga">Keluarga
                                    </option>
                                    <option value="Non-Keluarga">
                                        Non-Keluarga</option>
                                </select>
                            </div>

                            <div>
                                <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white required">
                                    Edukasi
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
                                    class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            </div>

                        </div>
                    </div>
                @endif

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
    </div>
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
