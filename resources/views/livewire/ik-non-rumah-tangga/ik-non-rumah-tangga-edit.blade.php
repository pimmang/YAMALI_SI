<div class="w-full h-full absolute z-50 top-0 left-0 flex items-center justify-center px-20 py-20 ">
    <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

    </div>
    <div class="flex w-full h-fit z-20 gap-6 ">
        <div class="bg-white rounded-xl overflow-hidden h-fit">
            <div class="w-full bg-orange-100">
                <p class="uppercase font-semibold text-gray-700 p-4">Data Index</p>
            </div>
            <div class="grid grid-cols-1 gap-2 overflow-y-auto p-4 items-start">
                <div class="w-full flex  flex-col justify-around text-sm  font-medium text-gray-700 ">
                    <p class="text-xs text-gray-400">Sumber Data</p>
                    <p class="capitalize font-bold">{{ $details->index->sumber_data }}</p>
                </div>
                <div class="w-full flex  flex-col justify-around text-sm font-medium  text-gray-700">
                    <p class="text-xs text-gray-400">Tipe Fasyankes</p>
                    <p class="capitalize font-bold">{{ $details->index->type_fasyankes }}</p>
                </div>
                <div class="w-full flex  flex-col justify-around text-sm font-medium text-gray-700">
                    <p class="text-xs text-gray-400">Tahun Index</p>
                    <p class="capitalize font-bold">{{ $details->index->tahun_index }}</p>
                </div>
                <div class="w-full flex  flex-col justify-around text-sm font-medium text-gray-700">
                    <p class="text-xs text-gray-400">Semester</p>
                    <p class="capitalize font-bold">{{ $details->index->semester_index }}</p>
                </div>
                <div class="w-full flex  flex-col justify-around text-sm font-medium text-gray-700">
                    <p class="text-xs text-gray-400">Nama</p>
                    <p class="capitalize font-bold">{{ $details->index->nama_pasien }}</p>
                </div>
                <div class="w-full flex  flex-col justify-around text-sm font-medium text-gray-700">
                    <p class="text-xs text-gray-400">NIK</p>
                    <p class="capitalize font-bold">{{ $details->index->nik_index }}</p>
                </div>
                <div class="w-full flex  flex-col justify-around text-sm font-medium text-gray-700">
                    <p class="text-xs text-gray-400">Tanggal Lahir</p>
                    <p class="capitalize font-bold">{{ $details->index->tanggal_lahir }}</p>
                </div>
                <div class="w-full flex  flex-col justify-around text-sm font-medium text-gray-700">
                    <p class="text-xs text-gray-400">Jenis Kelamin</p>
                    <p class="capitalize font-bold">{{ $details->index->jenis_kelamin }}</p>
                </div>

                <div class="w-full flex  flex-col justify-around text-sm font-medium text-gray-700">
                    <p class="text-xs text-gray-400">Fasyankes</p>
                    <p class="capitalize font-bold">{{ $details->index->fasyankes->nama_fasyankes }}</p>
                </div>
                <div class="w-full flex  flex-col justify-around text-sm font-medium text-gray-700">
                    <p class="text-xs text-gray-400">Alamat</p>
                    <p class="capitalize font-bold">
                        {{ ucwords(strtolower($details->index->alamat . ', ' . $details->index->district->name . ', ' . $details->index->regency->name)) }}
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg w-full overflow-hidden">
            <div class="bg-orange-100 p-4 px-6 text-sm font-semibold uppercase text-gray-700">
                <p>Detail IK Non Rumah Tangga</p>
                <i class="text-lg p-4 ph-bold cursor-pointer transition-all ph-x text-gray-700 active:scale-90"
                    wire:click='close'></i>
            </div>
            <form action="/edit-iknrt/{{ $details->id }}" method="POST" class="bg-white rounded-lg p-6">
                @csrf
                <div class="grid gap-4 mb-6 md:grid-cols-2">
                    <div>
                        <label for="lokasi-penyuluhan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                            Penyuluhan</label>
                        <select id="lokasi-penyuluhan" required name="lokasiPenyuluhan"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            {{-- <option value="">{{ $details->lokasi_penyuluhan }}</option> --}}
                            <option value="Balai Desa/warga"
                                {{ $details->lokasi_penyuluhan == 'Balai Desa/warga' ? 'selected' : '' }}>Balai
                                Desa/Warga</option>
                            <option value="Pertemuan RT/RW/Kel/Kec"
                                {{ $details->lokasi_penyuluhan == 'Pertemuan RT/RW/Kel/Kec' ? 'selected' : '' }}>
                                Pertemuan RT/RW/Kel/Kec</option>
                            <option value="Lingkungan Sekitar Tempat Tinggal"
                                {{ $details->lokasi_penyuluhan == 'Lingkungan Sekitar Tempat Tinggal' ? 'selected' : '' }}>
                                Lingkungan Sekitar Tempat Tinggal
                            </option>
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
                        <label for="tglPenyuluhan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Penyuluhan</label>

                        <input id="tglPenyuluhan" name="tglPenyuluhan" type="date"
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
                            {{-- <option value="">{{ $details->waktu_penyuluhan }}</option> --}}
                            <option value="pagi" {{ $details->waktu_penyuluhan == 'pagi' ? 'selected' : '' }}>Pagi
                            </option>
                            <option value="siang" {{ $details->waktu_penyuluhan == 'siang' ? 'selected' : '' }}>Siang
                            </option>
                            <option value="malam" {{ $details->waktu_penyuluhan == 'malam' ? 'selected' : '' }}>Malam
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="jenis-penyuluhan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Penyuluhan</label>
                        <select id="jenis-penyuluhan" required name="jenisPenyuluhan"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            {{-- <option value="">{{ $details->jenis_penyuluhan }}</option> --}}
                            <option value="Budget" {{ $details->jenis_penyuluhan == 'Budget' ? 'selected' : '' }}>
                                Budget
                            </option>
                            <option value="Non-Budget"
                                {{ $details->jenis_penyuluhan == 'Non-Budget' ? 'selected' : '' }}>Non-Budget</option>
                        </select>
                    </div>
                    <div>
                        <label for="kabupaten"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                        <select id="kabupaten" wire:model.change="kabupaten_id" required name="kabupaten"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            @foreach ($kabupaten as $kab)
                                <option value={{ $kab->id }}
                                    {{ $kab->id == $details->regency_id ? 'selected' : '' }}>
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
                            {{-- <option value="">{{ ucwords(strtolower($details->district->name)) }}</option> --}}
                            @if ($kecamatan)
                                @foreach ($kecamatan as $kec)
                                    <option value='{{ $kec->id }}'
                                        {{ $kec->id == $details->district_id ? 'selected' : '' }}>
                                        {{ ucwords(strtolower($kec->name)) }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div>
                        <label for="alamatPenyuluhan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                            Penyuluhan</label>

                        <input id="alamatPenyuluhan" name="alamatPenyuluhan" type="text" required
                            value="{{ $details->alamat_penyuluhan }}"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:!border-orange-500 block w-full p-2.5 "
                            placeholder="Alamat penyuluhan...">

                    </div>
                    <div>
                        <label for="ssr"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                        <select id="ssr" name="ssr" wire:model.live='ssrPilihan' required
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option value='' selected>pilih</option>
                            @foreach ($ssrs as $ssr)
                                <option value="{{ $ssr->id }}">
                                    {{ $ssr->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="kader"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kader</label>
                        <select id="kader" name="kader" required
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            {{-- <option value='' selected>{{ $details->kader->nama }}</option> --}}
                            @if ($kaders)
                                @foreach ($kaders as $kader)
                                    <option value="{{ $kader->id }} "
                                        {{ $details->kader_id == $kader->id ? 'selected' : '' }}>
                                        {{ $kader->nama . '(' . $kader->nik . ')' }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div>
                        <label for="fasyankes"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                        <select id="fasyankes" name="fasyankes" required
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option value='' selected>Pilih</option>
                            @if ($fasyankes)
                                @foreach ($fasyankes as $fasyankes)
                                    <option value="{{ $fasyankes->id }}"
                                        {{ $details->fasyankes_id == $fasyankes->id ? 'selected' : '' }}>
                                        {{ $fasyankes->nama_fasyankes }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                </div>
                <div class="col-span-2 flex justify-end">
                    <button type="submit"
                        class="relative text-white bg-orange-500 hover:bg-orange-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center   before:text-black ">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
