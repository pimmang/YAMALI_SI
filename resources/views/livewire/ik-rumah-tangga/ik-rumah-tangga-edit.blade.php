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
                <div class="flex justify-between items-top bg-orange-100 p-4 items-center">
                    <h1 class="font-medium text-gray-700 uppercase ">Detail Investigasi Kontak</h1>
                    <i class="text-lg  ph-bold cursor-pointer transition-all ph-x text-gray-700 active:scale-90"
                        wire:click='close'></i>
                </div>
                <form action="/edit-ikrt/{{ $details->id }}" method="post" class="grid gap-4 md:grid-cols-1 p-4">
                    @csrf
                    <div>
                        <label for="kegiatan IK"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kegiatan IK</label>
                        <select id="kegiatanIk" name="kegiatanIk"
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
                        <select id="fasyankes" name="fasyankes"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option value='' selected>Pilih</option>
                            @foreach ($fasyankes as $fasyankes)
                                <option value="{{ $fasyankes->id }} "
                                    {{ $fasyankes->id == $details->fasyankes_id ? 'selected' : '' }}>
                                    {{ $fasyankes->nama_fasyankes }}
                                </option>
                            @endforeach
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
                    <button type="submit"
                        class="relative text-white bg-orange-500 hover:bg-orange-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center   before:text-black ">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
