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
            <form class="bg-white rounded-lg p-6 overflow-y-scroll h-full">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="lokasi-penyuluhan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lokasi
                            Penyuluhan</label>
                        <select id="lokasi-penyuluhan" disabled name="lokasiPenyuluhan" disabled
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option value="">{{ $details->lokasi_penyuluhan }}</option>
                        </select>
                    </div>
                    <div>
                        <label for="tanggal-penyuluhan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                            Penyuluhan</label>

                        <input id="tanggal-penyuluhan" name="tglPenyuluhan" type="date" disabled
                            value="{{ $details->tgl_penyuluhan }}"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:!border-orange-500 block w-full p-2.5 "
                            placeholder="Select date">

                    </div>

                    <div>
                        <label for="waktu-penyuluhan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu
                            Penyuluhan</label>
                        <select id="waktu-penyuluhan" disabled name="waktuPenyuluhan"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option selected value="">{{ $details->waktu_penyuluhan }}</option>
                            <option value="pagi">Pagi</option>
                            <option value="siang">Siang</option>
                            <option value="malam">Malam</option>
                        </select>
                    </div>
                    <div>
                        <label for="jenis-penyuluhan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                            Penyuluhan</label>
                        <select id="jenis-penyuluhan" disabled name="jenisPenyuluhan"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option selected value="">{{ $details->jenis_penyuluhan }}</option>
                            <option value="Budget">Budget</option>
                            <option value="Non-Budget">Non-Budget</option>
                        </select>
                    </div>
                    <div>
                        <label for="provinsi"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                        <select id="provinsi" disabled name="provinsi"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option value = '73'>Sulawesi Selatan</option>
                        </select>
                    </div>
                    <div>
                        <label for="kabupaten"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                        <select id="kabupaten" wire:model.change="kabupaten_form" disabled name="kabupaten"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option>
                                {{ ucwords(strtolower($details->regency->name)) }}
                            </option>

                        </select>
                    </div>
                    <div>
                        <label for="kecamatan"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                        <select id="kecamatan" name="kecamatan" disabled
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option value="">Pilih</option>
                            <option>
                                {{ ucwords(strtolower($details->district->name)) }}
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="Sr"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SR</label>
                        <select id="Sr" disabled name="sr"
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option value="sulawesi selatan">Sulawesi Selatan</option>
                        </select>
                    </div>

                    <div>
                        <label for="ssr"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                        <select id="ssr" name="ssr" wire:model.live='ssrPilihan' disabled
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option>
                                {{ ucwords(strtolower($details->ssr->nama)) }}
                            </option>
                        </select>
                    </div>
                    <div>
                        <label for="namaFasyankes"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                        <select id="namaFasyankes" name="namaFasyankes" disabled
                            class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option>
                                {{ ucwords(strtolower($details->fasyankes->nama_fasyankes)) }}
                            </option>
                        </select>
                    </div>

                    <div>
                        <label for="kader"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kader</label>
                        <select id="kader" name="kader" disabled
                            class="bg-white border !border-orange-200 capitalize text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                           
                            <option>
                                {{ ucwords(strtolower($details->kader->nama .' (' . $details->kader->nik .')')) }}
                            </option>
                        </select>
                    </div>


                </div>


            </form>
        </div>
    </div>

</div>
