<div class="h-fit w-full pb-20">
    <div class="h-fit w-full bg-white rounded-lg overflow-clip">
        <div class="bg-orange-100 p-4 text-sm font-semibold uppercase text-gray-700 flex items-center">
            <p class="text-xs font-bold ">Form Tambah Kader</p>
        </div>
        <form action="/tambah-kader" method="POST" class="p-4">
            @csrf
            <div class="grid gap-4 mb-6 md:grid-cols-2">
                <div>
                    <label for="namaKader" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    </label>
                    <input type="text" id="namaKader" name="namaKader"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Nama kader" required />
                </div>
                <div>
                    <div class="flex mb-2  gap-3 items-center">
                        <label for="nikKader" class="block text-sm font-medium text-gray-900 dark:text-white">NIK
                        </label>
                        @if ($message)
                            <p class="text-xs text-red-500">{{ $message }}</p>
                        @endif
                    </div>
                    <input  type="text" pattern="\d*" maxlength="16" minlength="16"  id="nikKader" name="nikKader" wire:model.blur="nik" maxlength="16"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Nik Kader" required />
                </div>
                <div>
                    <label for="nomorTelepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                        Telepon</label>
                    <input type="text" id="nomorTelepon" name="nomorTelepon"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Nomor Telepon" required />
                </div>
                <div>
                    <label for="umur"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                    <input type="text" id="umur" name="umur"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Umur Kader" required />
                </div>
                <div>
                    <label for="jenisKelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                        Kelamin</label>
                    <select id="jenisKelamin" name="jenisKelamin"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>Pilih</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
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
                    <select id="ssr" name="ssr" required
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value='' selected>Pilih</option>

                        {{-- @foreach ($ssrs as $ssr)
                            <option value="{{ $ssr->id }}">{{ $ssr->nama }}</option>
                        @endforeach --}}
                        @if (Auth::user()->hasRole('sr'))
                            <option value='' selected>Pilih</option>
                            @foreach ($ssrs as $ssr)
                                <option value="{{ $ssr->id }}">{{ $ssr->nama }}</option>
                            @endforeach
                        @elseif(Auth::user()->hasRole('ssr'))
                            <option value="{{ Auth::user()->ssr->id }}">{{ Auth::user()->ssr->nama }}</option>
                        @endif
                    </select>
                </div>

                <div>
                    <label for="jenis"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                    <select id="jenis" name="jenis"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option selected>Pilih</option>
                        <option value="kader">Kader</option>
                        <option value="Patient Suporter">Patient Suporter</option>
                        <option value="Kader + PS">Kader + PS</option>
                        <option value="TB Army">TB Army</option>
                        <option value="TB Army + PS">TB Army + PS</option>
                    </select>
                </div>

                <div>
                    <label for="status"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select id="status" name="status"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
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
