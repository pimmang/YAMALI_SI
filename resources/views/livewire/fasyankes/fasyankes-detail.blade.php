<div class="w-full h-full absolute z-50 top-0 left-0 flex items-center justify-center px-40 py-20 ">
    <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

    </div>

    <div class="bg-white w-full h-full rounded-xl  overflow-hidden z-20 pb-8">
        <div class="w-full bg-orange-100 flex justify-between items-center ">
            <p class="uppercase font-semibold text-gray-700 p-4">Detail Fasyankes</p>
            <i class="text-lg p-4 ph-bold cursor-pointer transition-all ph-x text-gray-700 active:scale-90"
                wire:click='close'></i>
        </div>

        <div class="bg-white w-full h-full overflow-y-scroll p-8 ">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="namaKader" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                        Fasyankes
                    </label>
                    <input type="text" value="{{ $details->kode_fasyankes }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Kode Fasyankes" disabled />
                </div>
                <div>
                    <label for="namaFasyankes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Fasyankes
                    </label>
                    <input type="text" value="{{ $details->nama_fasyankes }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Kode Fasyankes" disabled />
                </div>

                <div>
                    <label for="jenis"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
                    <input type="text" value="{{ $details->jenis }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Kode Fasyankes" disabled />
                </div>

                <div>
                    <label for="pmdt"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PMDT</label>
                    <input type="text" value="{{ $details->pmdt }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Kode Fasyankes" disabled />
                </div>

                {{-- <div>
                    <label for="provinsi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                    <input type="text" value="{{ ucwords(strtolower($details->province->name)) }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Kode Fasyankes" disabled />
                </div> --}}

                <div>
                    <label for="kabupaten"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                    <input type="text" value="{{ ucwords(strtolower($details->regency->name)) }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Kode Fasyankes" disabled />
                </div>

                <div>
                    <label for="kecamatan"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                    <input type="text" value="{{ ucwords(strtolower($details->district->name)) }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Kode Fasyankes" disabled />
                </div>

                <div>
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                        Fasyankes
                    </label>
                    <input type="text" value="{{ $details->alamat }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Kode Fasyankes" disabled />
                </div>

                {{-- <div>
                    <label for="sr"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SR</label>
                    <input type="text" value="{{ $details->sr }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Kode Fasyankes" disabled />
                </div> --}}

                <div>
                    <label for="ssr"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                    <input type="text" value="{{ ucwords(strtolower($details->ssr->nama)) }}"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Kode Fasyankes" disabled />
                </div>
            </div>
        </div>

    </div>
</div>
