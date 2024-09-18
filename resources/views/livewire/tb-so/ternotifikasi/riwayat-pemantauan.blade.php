<div class="w-full h-full absolute z-30 top-0 left-0  flex items-center justify-center px-10 py-10  ">
    <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

    </div>
    <div class="w-full z-20 h-full flex gap-4 rounded-lg justify-center items-start ">
        <div class="w-3/12 h-full flex flex-col bg-white mb-10 overflow-hidden rounded-lg shadow">
            <div class="w-full bg-orange-50 p-4 flex-none">
                <p class="uppercase font-semibold text-sm text-gray-700">Data</p>
            </div>
            <div class="w-full flex flex-grow flex-col p-4 justify-around text-sm font-medium text-gray-700">
                <div>
                    <p class="text-gray-500 text-xs">Nama</p>
                    <p class="uppercase font-bold">{{ $data->terduga->kontak->nama }}</p>
                </div>
                <div>

                    <p class="text-gray-500 text-xs">NIK</p>
                    <p class="uppercase font-bold">{{ $data->terduga->kontak->nik_kontak }}</p>
                </div>
                <div>

                    <p class="text-gray-500 text-xs">Nomor Telepon</p>
                    <p class="uppercase font-bold">{{ $data->terduga->kontak->no_telepon }}</p>
                </div>

                @if ($data->terduga->kontak->i_k_rumah_tangga_id)
                    <div>
                        <p class="text-gray-500 text-xs">Kecamatan, Kabupaten</p>
                        <p class="uppercase font-bold">
                            {{ $data->terduga->kontak->iKRumahTangga->index->district->name . ', ' . $data->terduga->kontak->iKRumahTangga->index->regency->name }}
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs">SSR</p>
                        <p class="uppercase font-bold">{{ $data->terduga->kontak->iKRumahTangga->index->ssr->nama }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs">Kegiatan IK</p>
                        <p class="uppercase font-bold">
                            {{ $data->terduga->kontak->iKRumahTangga->kegiatan_ik ? $data->terduga->kontak->iKRumahTangga->kegiatan_ik : '' }}
                        </p>
                    </div>
                @else
                    <div>

                        <p class="text-gray-500 text-xs">Lokasi Penyuluhan (Kecamatan, Kota/Kabupaten)</p>
                        <p class="uppercase font-bold">
                            {{ $data->terduga->kontak->iKNRumahTangga->district->name . ', ' . $data->terduga->kontak->iKNRumahTangga->regency->name }}
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs">SSR</p>
                        <p class="uppercase font-bold">{{ $data->terduga->kontak->iKNRumahTangga->index->ssr->nama }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs">Jenis Penyuluhan</p>
                        <p class="uppercase font-bold">{{ $data->terduga->kontak->iKNRumahTangga->jenis_penyuluhan }}
                        </p>
                    </div>
                @endif
            </div>

        </div>
        <div class="w-9/12  gap-4 h-full  overflow-y-scroll">
            <div class="bg-white rounded-lg overflow-hidden !h-fit mb-4">
                <div class="w-full bg-orange-50 p-4 flex-none mb-3">
                    <p class="uppercase font-semibold text-sm text-gray-700">Data Riwayat Pemantauan</p>
                </div>
                <div class="p-4">
                    <div class="relative overflow-x-auto !h-fit rounded-lg">
                        @if ($dataPemantauans->count() > 0)
                            <table
                                class="w-full h-fit text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase whitespace-nowrap bg-orange-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Aksi
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Kegiatan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tanggal Kegiatan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Tahap Kegiatan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Waktu Kegiatan
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Jenis Kegiatan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataPemantauans as $dataPemantauan)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div wire:click="hapus({{ $dataPemantauan->id }})"
                                                    class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                                    <i
                                                        class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
                                                </div>
                                            </th>
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $dataPemantauan->kegiatan }}
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $dataPemantauan->tanggal_kegiatan }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $dataPemantauan->tahap_kegiatan }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $dataPemantauan->waktu_kegiatan }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $dataPemantauan->jenis_kegiatan }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="w-full p-4 flex items-center justify-center flex-col gap-2">
                                <i class="ph-bold ph-x text-2xl text-red-500 "></i>
                                <p class="font-medium text-sm text-gray-700">Data pemantauan belum tersedia</p>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
            <div class="bg-white rounded-lg h-fit overflow-hidden">
                <div class="w-full bg-orange-50 p-4 flex-none">
                    <p class="uppercase font-semibold text-sm text-gray-700">Form Tambah Riwayat Pemantauan</p>
                </div>
                <form wire:submit="save" class="p-4 grid grid-cols-2 gap-6">
                    @csrf
                    <div>
                        <label for="tglKegiatan"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">
                            Tanggal Kegiatan</label>
                        <input type="date" name="tglKegiatan" id="tglKegiatan" required wire:model='tglKegiatan'
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    </div>


                    <div>
                        <label for="tahapKegiatan"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">Tahap
                            kegiatan</label>
                        <select id="tahapKegiatan" name="tahapKegiatan" required wire:model='tahapKegiatan'
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option selected value="">Pilih</option>
                            <option value="intensif">intensif</option>
                            <option value="Lanjutan">Lanjutan</option>
                        </select>
                    </div>
                    <div>
                        <label for="waktuKegiatan"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">Waktu
                            Kegiatan</label>
                        <select id="waktuKegiatan" name="waktuKegiatan" required wire:model='waktuKegiatan'
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option selected value="">Pilih</option>
                            <option value="Minggu I">Minggu I</option>
                            <option value="Minggu II">Minggu II</option>
                            <option value="Minggu III">Minggu III</option>
                            <option value="Minggu IV">Minggu IV</option>
                            <option value="Minggu V">Minggu V</option>
                            <option value="MInggu VI">MInggu VI</option>
                            <option value="Minggu VII">Minggu VII</option>
                            <option value="Minggu VIII">Minggu VIII</option>
                            <option value="Bulan III">Bulan III</option>
                            <option value="Bulan IV">Bulan IV</option>
                            <option value="Bulan V">Bulan V</option>
                            <option value="Bulan VI">Bulan VI</option>
                            <option value="Bulan VII">Bulan VII</option>
                            <option value="Bulan VIII">Bulan VIII</option>
                            <option value="Bulan IX">Bulan IX</option>
                            <option value="Bulan X">Bulan X</option>
                        </select>
                    </div>
                    <div>
                        <label for="jenisKegiatan"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">Jenis
                            Kegiatan</label>
                        <select id="jenisKegiatan" name="jenisKegiatan" required wire:model='jenisKegiatan'
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option selected value="">Pilih</option>
                            <option value="Kunjungan">Kunjungan</option>
                            <option value="SMS">SMS</option>
                            <option value="Telepon">Telepon</option>

                        </select>
                    </div>
                    <div>
                        <label for="Kegiatan"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">Kegiatan</label>
                        <select id="Kegiatan" name="Kegiatan" required wire:model='kegiatan'
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option selected value="">Pilih</option>
                            <option value="Edukasi penyakit TBC">Edukasi penyakit TBC</option>
                            <option value="Edukasi pentingnya minum obat">Edukasi pentingnya minum obat</option>
                            <option value="Edukasi kesehatan lingkungan">Edukasi kesehatan lingkungan</option>
                            <option value="Edukasi PHBS (Perilaku Hidup Bersih dan Sehat)">Edukasi PHBS (Perilaku Hidup
                                Bersih dan Sehat)</option>
                            <option value="Edukasi HIV">Edukasi HIV</option>
                            <option value="Edukasi PMO">Edukasi PMO</option>
                            <option value="Pendampingan pasien TBC-Covid 19">Pendampingan pasien TBC-Covid 19</option>
                            <option value="Edukasi TPT">Edukasi TPT</option>
                            <option value="Pemantauan TPT kontak serumah">Pemantauan TPT kontak serumah</option>
                        </select>
                    </div>



                    <div class=" w-full flex items-end col-span-2">
                        <button type="submit"
                            class="text-white bg-orange-500  hover:bg-orange-600 transition-all focus:ring-4 !p-2.5 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @script
        <script>
            $wire.on('sukses', ({
                message
            }) => {
                tampilSukses(message)
            });
            $wire.on('hapusPemantauan', () => {
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
</div>
