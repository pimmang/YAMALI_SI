<div class="w-full h-full absolute z-50 top-0 left-0 flex items-center justify-center px-40 py-20 ">
    <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

    </div>

    <div class="bg-white w-full h-full rounded-xl p-8 z-20  ">
        <div class="bg-white w-full h-full overflow-y-scroll">


            <form action="/edit-fasyankes/{{ $edits->id }}" method="POST">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="namaKader" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                            Fasyankes
                        </label>
                        <input type="text" id="kodeFasyankes" name="kodeFasyankes"
                            value="{{ $edits->kode_fasyankes }}"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                            placeholder="Kode Fasyankes" required />
                    </div>
                    <div>
                        <label for="namaFasyankes"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            Fasyankes
                        </label>
                        <input type="text" id="namaFasyankes" name="namaFasyankes"
                            value="{{ $edits->nama_fasyankes }}"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                            placeholder="Nama Fasyankes" required />
                    </div>

                    <div>
                        <label for="jenis"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                        <select id="jenis" name="jenis"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option selected>{{ $edits->jenis }}</option>
                            <option value="Pemerintah">Pemerintah</option>
                            <option value="Swasta">Swasta</option>
                        </select>
                    </div>

                    <div>
                        <label for="pmdt"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PMDT</label>
                        <select id="pmdt" name="pmdt"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option selected>{{ $edits->pmdt }}</option>
                            <option value="PMDT">PMDT</option>
                            <option value="NON-PMDT">NON-PMDT</option>
                        </select>
                    </div>

                    <div>
                        <label for="provinsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                        <select id="provinsi" name="provinsi"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option value = '73'>Sulawesi Selatan</option>
                        </select>
                    </div>

                    <div>
                        <label for="kabupaten"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                        <select id="kabupaten" wire:model.change="kabupaten_id" name="kabupaten"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                           
                            @foreach ($kabupaten as $kab)
                                <option value={{ $kab->id }}
                                    {{ $edits->regency_id == $kab->id ? 'selected' : '' }}>
                                    {{ ucwords(strtolower($kab->name)) }}
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
                                        <option value='{{ $kec->id }}'
                                            {{ $edits->district_id == $kec->id ? 'selected' : '' }}>
                                            {{ ucwords(strtolower($kec->name)) }}
                                        </option>
                                    @endforeach
                                @endif
                        </select>
                    </div>

                    <div>
                        <label for="alamat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                            Fasyankes
                        </label>
                        <input type="text" id="alamat" name="alamat" value="{{ $edits->alamat }}"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                            placeholder="Alamat" required />
                    </div>

                    <div>
                        <label for="sr"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SR</label>
                        <select id="sr" name="sr"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                        </select>
                    </div>

                    <div>
                        <label for="ssr"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                        <select id="ssr" name="ssr"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            @foreach ($ssrs as $ssr)
                                    <option value="{{ $ssr->id }}"
                                        {{ $edits->ssr_id == $ssr->id ? 'selected' : '' }}>{{ $ssr->nama }}
                                    </option>
                                @endforeach
                        </select>
                    </div>


                </div>

                <button type="submit"
                    class="text-white !bg-orange-600 !hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </form>
        </div>

    </div>
</div>
