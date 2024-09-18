<div class="w-full h-full absolute z-50 top-0 left-0 flex items-center justify-center px-40 py-20 ">
    <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

    </div>
    <div class="bg-white w-full h-full rounded-xl p-8 z-20">
        <div class="bg-white w-full h-full overflow-y-scroll">
            <form class="grid gap-6 mb-6 md:grid-cols-2" action="/edit-index/{{ $details->id }}" method="post">
                @csrf
                <div>
                    <label for="sumberData" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber
                        Data</label>
                    <select id="sumberData" name="sumberData" required
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        {{-- <option selected>{{ $details->sumber_data }}</option> --}}
                        <option value="pmdt" {{ $details->sumber_data == 'pmdt' ? 'selected' : '' }}>PMDT</option>
                        <option value="fasyankes" {{ $details->sumber_data == 'fasyankes' ? 'selected' : '' }}>Fasyankes
                        </option>
                        <option value="dppm" {{ $details->sumber_data == 'dppm' ? 'selected' : '' }}>DPPM</option>
                    </select>
                </div>

                <div>
                    <label for="fasyankes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type
                        Fasyankes</label>
                    <select id="fasyankes" name="tipe_fasyankes" required
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        {{-- <option selected>{{ $details->type_fasyankes }}</option> --}}
                        <option value="puskesmas" {{ $details->type_fasyankes == 'puskesmas' ? 'selected' : '' }}>
                            Puskesmas</option>
                        <option value="klinik" {{ $details->type_fasyankes == 'klinik' ? 'selected' : '' }}>Klinik
                        </option>
                        <option value="rumah sakit" {{ $details->type_fasyankes == 'rumah sakit' ? 'selected' : '' }}>
                            Rumah Sakit</option>
                    </select>
                </div>

                <div>
                    <label for="tahunIndex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                        Index</label>
                    <select id="tahunIndex" name="tahunIndex" required
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        {{-- <option selected>{{ $details->tahun_index }}</option> --}}
                        @for ($i = 4; $i >= 0; $i--)
                            <option value="{{ $tahun - $i }}"
                                {{ $details->tahun_index == $tahun - $i ? 'selected' : '' }}> {{ $tahun - $i }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div>
                    <label for="semesterIndex"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">semester
                        Index</label>
                    <select id="semesterIndex" required name="semesterIndex"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        {{-- <option selected>{{ $details->semester_index }}</option> --}}
                        <option value="1" {{ $details->semester_index == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $details->semester_index == 2 ? 'selected' : '' }}>2</option>
                    </select>
                </div>


                {{-- <div>
                    <label for="nomorRegister" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                        Register
                        TBC.03/06 Indeks</label>
                    <input type="text" id="nomorRegister" name="nomorRegister"
                        value="{{ $details->nomor_register_tbc }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="No. Register TBC.03/06 Indeks" required />
                </div> --}}
                <div>
                    <label for="namaPasien" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Pasien</label>
                    <input type="text" id="namaPasien" name="namaPasien" value="{{ $details->nama_pasien }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Nama Pasien" required />
                </div>
                {{-- <div>
                    <label for="nomorTerduga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                        Terduga</label>
                    <input type="tel" id="nomorTerduga" name="nomorTerduga" value="{{ $details->no_terduga }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Nomor Terduga" required />
                </div> --}}
                <div>
                    <label for="nikIndex" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK
                        Index</label>
                    <input type="text" id="nikIndex" name="nikIndex" value="{{ $details->nik_index }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="NIK Index" required />
                </div>

                <div>
                    <label for="tanggalLahir"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Lahir</label>
                    <input type="date" name="tanggalLahir" id="tanggalLahir" value="{{ $details->tanggal_lahir }}"
                        required
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                </div>

                <div>
                    <label for="jenisKelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Kelamin</label>
                    <select id="jenisKelamin" name="jenisKelamin" required
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        {{-- <option selected>{{ $details->jenis_kelamin }}</option> --}}
                        <option value="laki-laki" {{ $details->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                            Laki-laki</option>
                        <option value="perempuan" {{ $details->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                </div>

                <div>
                    <label for="kabupaten"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                    <select id="kabupaten" wire:model.change="kabupaten_id" name="kabupaten"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="" selected>Pilih</option>
                        @foreach ($kabupaten as $kab)
                            <option value={{ $kab->id }}>
                                {{ ucwords(strtolower($kab->name)) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="kecamatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                    <select id="kecamatan" name="kecamatan" required wire:model.change='kecamatanPilihan'
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="" selected>Pilih</option>
                        @if ($kecamatan)
                            @foreach ($kecamatan as $kec)
                                <option value='{{ $kec->id }}'>{{ ucwords(strtolower($kec->name)) }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div>
                    <label for="alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ $details->alamat }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Alamat..." required />
                </div>

                <div>
                    <label for="fasyankes"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">fasyankes</label>
                    <select id="fasyankes" name="fasyankes" required
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="" selected>Pilih</option>
                        @if ($fasyankes)
                            @foreach ($fasyankes as $fasyan)
                                <option value='{{ $fasyan->id }}'
                                    {{ $fasyan->id == $details->fasyankes_id ? 'selected' : '' }}>
                                    {{ ucwords(strtolower($fasyan->nama_fasyankes)) }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div>
                    <label for="ssr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                    <select id="ssr" name="ssr" wire:model.live='ssrPilihan'
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value='' selected>Pilih</option>
                        @foreach ($ssrs as $ssr)
                            <option value="{{ $ssr->id }}" {{ $ssr->id == $details->ssr_id ? 'selected' : '' }}>{{ $ssr->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex w-full justify-end col-span-2">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>