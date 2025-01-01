<div class="w-full h-full absolute z-50 top-0 left-0 flex items-center justify-center px-20 py-20 ">
    <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

    </div>
    <div class="flex w-full h-fit z-20 gap-6 ">
        <div class="bg-white rounded-xl overflow-hidden h-fit">
            <div class="w-full bg-orange-100">
                <p class="uppercase font-semibold text-gray-700 p-4">Data Index</p>
            </div>
            <div class="grid grid-cols-2 gap-4 overflow-y-auto p-4 items-start">
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
                    <p class="text-xs text-gray-400">Fasyankes Index</p>
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

        <div class="bg-white w-4/12 rounded-xl overflow-hidden z-20 flex-grow">
            <div class="bg-white w-full  overflow-y-auto">
                <div class="flex justify-between items-top bg-orange-100 p-4">
                    <h1 class="font-medium text-gray-700 uppercase ">Detail Investigasi Kontak</h1>
                    <i class="text-lg p-4 ph-bold cursor-pointer transition-all ph-x text-gray-700 active:scale-90"
                        wire:click='close'></i>
                </div>
                <div class="grid gap-4 md:grid-cols-1 p-4">
                    <div>
                        <label for="kegiatan IK"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kegiatan IK</label>
                        <select id="kegiatanIk" name="kegiatanIk" disabled
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option value="">Pilih</option>
                            <option value='Revisit' {{ $details->kegiatan_ik == 'Revisit' ? 'selected' : '' }}>Revisit
                            </option>
                            <option value='Re-IK' {{ $details->kegiatan_ik == 'Re-IK' ? 'selected' : '' }}>Re-IK
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="fasyankes"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                        <select id="fasyankes" name="fasyankes" disabled
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option selected>{{ $details->fasyankes->nama_fasyankes }}</option>
                            {{-- <option value="Makassar">Makassar</option>
                            <option value="Gowa">Gowa</option>
                            <option value="Wajo">Wajo</option>
                            <option value="Pinrang">Pinrang</option>
                            <option value="Bulukumba">Bulukumba</option>
                            <option value="Jeneponto">Jeneponto</option>
                            <option value="Maros">Maros</option>
                            <option value="Bone">Bone</option>
                            <option value="Sidrap">Sidrap</option> --}}
                        </select>
                    </div>
                    <div>
                        <label for="kader"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kader</label>
                        <input type="text" id="kader" name="kader" value="{{ $details->kader->nama }}"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                            placeholder="nama Kader" disabled />
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
