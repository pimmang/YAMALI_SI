<div class="w-full h-full absolute z-50 top-0 left-0 flex items-center justify-center p-10 ">
    <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

    </div>
    <div class="w-full h-full flex items-top gap-5 z-20">
        <div class="w-3/12 h-full flex flex-col bg-white mb-10 overflow-hidden rounded-lg shadow">
            <div class="w-full bg-orange-50 p-4 flex-none">
                <p class="uppercase font-semibold text-sm text-gray-700">Data IK RT</p>
            </div>
            <div class="w-full flex flex-grow flex-col p-4 justify-around text-sm font-medium text-gray-700">
                <p class="underline text-xs">Nama Index</p>
                <p class="uppercase font-bold">{{ $details->iKRumahTangga->nama_pasien }}</p>
                <p class="underline text-xs">NIK</p>
                <p class="uppercase font-bold">{{ $details->iKRumahTangga->nik_index }}</p>
                <p class="underline text-xs">Tanggal Lahir</p>
                <p class="uppercase font-bold">
                    {{ $details->iKRumahTangga->tanggal_lahir }}
                </p>
                <p class="underline text-xs">Jenis Kelamin</p>
                <p class="uppercase font-bold">{{ $details->iKRumahTangga->jenis_kelamin }}</p>
                <p class="underline text-xs">Alamat</p>
                <p class="uppercase font-bold">{{ $details->iKRumahTangga->alamat }}</p>
            </div>

        </div>
        <div class="bg-white flex-grow rounded-xl p-8 ">
            <form action="/edit-iknrt/{{ $details->id }}" method="POST"
                class="bg-white rounded-lg p-6 h-full overflow-y-scroll">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="lokasi-penyuluhan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                            Penyuluhan</label>
                        <select id="lokasi-penyuluhan" required name="lokasiPenyuluhan"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option value="">Pilih</option>
                            <option value="Balai Desa/warga"
                                {{ $details->lokasi_penyuluhan == 'Balai Desa/warga' ? 'selected' : '' }}>Balai
                                Desa/Warga</option>
                            <option value="Pertemuan RT/RW/Kel/Kec"
                                {{ $details->lokasi_penyuluhan == 'Pertemuan RT/RW/Kel/Kec' ? 'selected' : '' }}>
                                Pertemuan RT/RW/Kel/Kec</option>
                            <option value="Lingkungan Sekitar Tempat Tinggal"
                                {{ $details->lokasi_penyuluhan == 'Lingkungan Sekitar Tempat Tinggal' ? 'selected' : '' }}>
                                Lingkungan Sekitar Tempat Tinggal </option>
                            <option value="Pertemuan PKK/Posyandu/Arisan"
                                {{ $details->lokasi_penyuluhan == 'Pertemuan PKK/Posyandu/Arisan' ? 'selected' : '' }}>
                                Pertemuan PKK/Posyandu/Arisan </option>
                            <option value="Lingkungan Kupat-kumis"
                                {{ $details->lokasi_penyuluhan == 'Lingkungan Kupat-kumis' ? 'selected' : '' }}>
                                Lingkungan Kupat-kumis</option>
                            <option value="Pengungsian"
                                {{ $details->lokasi_penyuluhan == 'Pengungsian' ? 'selected' : '' }}>Pengungsian
                            </option>
                            <option value="Bantaran Kali"
                                {{ $details->lokasi_penyuluhan == 'Bantaran Kali' ? 'selected' : '' }}>Bantaran Kali
                            </option>
                            <option value="Sekolah (SD/SMP/SMA)"
                                {{ $details->lokasi_penyuluhan == 'Sekolah (SD/SMP/SMA)' ? 'selected' : '' }}>Sekolah
                                (SD/SMP/SMA)</option>
                            <option value="Perguruan Tinggi"
                                {{ $details->lokasi_penyuluhan == 'Perguruan Tinggi' ? 'selected' : '' }}>Perguruan
                                Tinggi</option>
                            <option value="Tempat Kerja(Perkantoran/pabrik/dll)"
                                {{ $details->lokasi_penyuluhan == 'Tempat Kerja(Perkantoran/pabrik/dll)' ? 'selected' : '' }}>
                                Tempat Kerja(Perkantoran/pabrik/dll)
                            </option>
                            <option value="Rutan/Lapas"
                                {{ $details->lokasi_penyuluhan == 'Rutan/Lapas' ? 'selected' : '' }}>Rutan/Lapas
                            </option>
                            <option value="Pondok Pesantren"
                                {{ $details->lokasi_penyuluhan == 'Pondok Pesantren' ? 'selected' : '' }}>Pondok
                                Pesantren</option>
                            <option value="Panti Asuhan"
                                {{ $details->lokasi_penyuluhan == 'Panti Asuhan' ? 'selected' : '' }}>Panti Asuhan
                            </option>
                            <option value="Panti Jompo"
                                {{ $details->lokasi_penyuluhan == 'Panti Jompo' ? 'selected' : '' }}>Panti Jompo
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="tanggal-penyuluhan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Penyuluhan</label>

                        <input id="tanggal-penyuluhan" name="tglPenyuluhan" type="date" required
                            value="{{ $details->tgl_penyuluhan }}"
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
                            <option value="pagi" {{ $details->waktu_penyuluhan == 'pagi' ? 'selected' : '' }}>Pagi
                            </option>
                            <option value="siang" {{ $details->waktu_penyuluhan == 'siang' ? 'selected' : '' }}>Siang
                            </option>
                            <option value="malam"{{ $details->waktu_penyuluhan == 'malam' ? 'selected' : '' }}>Malam
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="jenis-penyuluhan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Penyuluhan</label>
                        <select id="jenis-penyuluhan" required name="jenisPenyuluhan"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option selected value="">Pilih</option>
                            <option value="Budget" {{ $details->jenis_penyuluhan == 'Budget' ? 'selected' : '' }}>Budget</option>
                            <option value="Non-Budget"{{ $details->jenis_penyuluhan == 'Non-Budget' ? 'selected' : '' }}>Non-Budget</option>
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
                                    <option value='{{ $kec->id }}' {{ $kec->id == $details->district_id ? 'selected' : '' }}>{{ ucwords(strtolower($kec->name)) }}
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
                                    {{ $ssr->id == $details->ssr_id ? 'selected' : '' }}>
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
                                        {{ $fasyan->id == $details->fasyankes_id ? 'selected' : '' }}>
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
                                        {{ $kader->id == $details->kader_id ? 'selected' : '' }}>
                                        {{ $kader->nama . '(' . $kader->nik . ')' }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>


                </div>

                <button type="submit"
                    class="relative text-white bg-orange-500 hover:bg-orange-300 focus:ring-4  focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center   before:text-black ">Update</button>
            </form>
        </div>
    </div>

</div>
