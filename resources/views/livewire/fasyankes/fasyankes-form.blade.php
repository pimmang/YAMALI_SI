<div class="h-fit w-full pb-20">
    <div class="h-fit w-full bg-white rounded-lg overflow-clip">
        <div class="bg-orange-100 p-4 text-sm font-semibold uppercase text-gray-700 flex items-center">
            <p class="text-xs font-bold ">Form Tambah Fasyankes</p>
        </div>
        <form action="/tambah-fasyankes" method="POST" class="p-4 h-fit">
            @csrf
            <div class="grid gap-4 mb-6 md:grid-cols-2">
                <div>
                    <div class="flex mb-2  gap-3 items-center">
                        <label for="namaKader" class="block  text-sm font-medium text-gray-900 dark:text-white">Kode
                            Fasyankes
                        </label>
                        @if ($message)
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @endif
                    </div>
                    <input type="text" id="kodeFasyankes" name="kodeFasyankes" wire:model.blur='kodeFasyankes'
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Kode Fasyankes" required />
                </div>
                <div>
                    <label for="namaFasyankes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Fasyankes
                    </label>
                    <input type="text" id="namaFasyankes" name="namaFasyankes"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Nama Fasyankes" required />
                </div>

                <div>
                    <label for="jenis"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                    <select id="jenis" name="jenis"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="Pemerintah">Pemerintah</option>
                        <option value="Swasta">Swasta</option>
                    </select>
                </div>

                <div>
                    <label for="pmdt"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PMDT</label>
                    <select id="pmdt" name="pmdt"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>Pilih</option>
                        <option value="PMDT">PMDT</option>
                        <option value="NON-PMDT">NON-PMDT</option>
                    </select>
                </div>

                {{-- <div>
                    <label for="provinsi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                    <select id="provinsi" name="provinsi"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value = '73'>Sulawesi Selatan</option>
                    </select>
                </div> --}}

                <div>
                    <label for="kabupaten"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                    <select id="kabupaten" wire:model.change="kabupaten_id" name="kabupaten"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>Pilih</option>
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
                        <option selected>Pilih</option>
                        @if ($kecamatan)
                            @foreach ($kecamatan as $kec)
                                <option value={{ $kec->id }}>{{ ucwords(strtolower($kec->name)) }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div>
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                        Fasyankes
                    </label>
                    <input type="text" id="alamat" name="alamat"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Alamat" required />
                </div>

                {{-- <div>
                    <label for="sr"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SR</label>
                    <select id="sr" name="sr"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                    </select>
                </div> --}}

                <div>
                    <label for="ssr"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                    <select id="ssr" name="ssr"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>Pilih</option>
                        @if (Auth::user()->hasRole('sr'))
                            <option value='' selected>Pilih</option>
                            @foreach ($ssrs as $ssr)
                                <option value="{{ $ssr->id }}">{{ $ssr->nama }}
                                </option>
                            @endforeach
                        @elseif(Auth::user()->hasRole('ssr'))
                            <option value="{{ Auth::user()->ssr->id }}">
                                {{ Auth::user()->ssr->nama }}</option>
                        @endif
                    </select>
                </div>


            </div>
            <div class="flex justify-end">
                <button type="submit" {{ $message ? 'disabled' : '' }}
                    class="text-white  hover:bg-orange-400  {{ $message ? '!bg-orange-200' : 'bg-orange-500' }} focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </div>
        </form>

    </div>
</div>
