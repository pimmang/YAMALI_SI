<div class="w-full h-full absolute z-50 top-0 left-0  flex items-center justify-center px-10 py-10  ">
    <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

    </div>

    <div class="w-fit h-fit bg-white rounded-lg z-20 overflow-hidden">
        <div class="w-full bg-orange-50 p-4 flex-none ">
            <p class="uppercase font-semibold text-sm text-gray-700">Hasil Pengobatan</p>
        </div>
        @if ($dataHasilPengobatan)
            @if ($state == 'edit')
                <form action="/ubah-hasil-pengobatan/{{ $dataHasilPengobatan->id }}" method="POST"
                    class="p-4 grid grid-cols-2 gap-6">
                    @csrf
                    <div>
                        <label for="tglMulaiPendampingan"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">
                            Tanggal Mulai Pendampingan</label>
                        <input type="date" name="tglMulaiPendampingan" id="tglMulaiPendampingan" required
                            value="{{ $dataHasilPengobatan->tanggal_mulai_pendampingan }}"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    </div>
                    <div>
                        <label for="tanggalMulaiPengobatan"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">
                            Tanggal Mulai Pengobatan</label>
                        <input type="date" name="tanggalMulaiPengobatan" id="tanggalMulaiPengobatan" 
                            value="{{ $dataHasilPengobatan->tanggal_mulai_pengobatan }}"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    </div>
                    {{-- <div>
                        <label for="bulanLaporHasilPengobatan"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">
                            Bulan Lapor Hasil Pengobatan</label>
                        <input type="date" name="bulanLaporHasilPengobatan" id="bulanLaporHasilPengobatan" required
                            value="{{ $dataHasilPengobatan->bulan_lapor_hasil_pengobatan }}"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    </div> --}}
                    <div>
                        <label for="tglHasilPengobatan"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">
                            Tanggal Hasil Pengobatan</label>
                        <input type="date" name="tglHasilPengobatan" id="tglHasilPengobatan"
                            wire:model.live='tglHasilPengobatan' 
                            value="{{ $dataHasilPengobatan->tanggal_hasil_pengobatan }}"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    </div>

                    <div>
                        <label for="hasilPemeriksaan"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">Tipe
                            Hasil Pengobatan</label>
                        <select id="hasilPemeriksaan" name="hasilPemeriksaan" required
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option selected value="">Pilih</option>
                            <option
                                value="Sembuh"{{ $dataHasilPengobatan->hasil_pengobatan == 'Sembuh' ? 'selected' : '' }}>
                                Sembuh</option>
                            {{-- <option
                                value="Lengkap"{{ $dataHasilPengobatan->hasil_pengobatan == 'Lengkap' ? 'selected' : '' }}>
                                Lengkap</option> --}}
                            <option
                                value="Meninggal"{{ $dataHasilPengobatan->hasil_pengobatan == 'Meninggal' ? 'selected' : '' }}>
                                Meninggal</option>
                            <option
                                value="Pindah"{{ $dataHasilPengobatan->hasil_pengobatan == 'Pindah' ? 'selected' : '' }}>
                                Pindah</option>
                            {{-- <option
                                value="Default"{{ $dataHasilPengobatan->hasil_pengobatan == 'Default' ? 'selected' : '' }}>
                                Default</option> --}}
                            <option
                                value="Gagal"{{ $dataHasilPengobatan->hasil_pengobatan == 'Gagal' ? 'selected' : '' }}>
                                Gagal</option>
                            <option
                                value="Belum Mulai Pengobatan"{{ $dataHasilPengobatan->hasil_pengobatan == 'Belum Mulai Pengobatan' ? 'selected' : '' }}>
                                Belum Mulai Pengobatan</option>
                            <option
                                value="Proses Pengobatan"{{ $dataHasilPengobatan->hasil_pengobatan == 'Proses Pengobatan' ? 'selected' : '' }}>
                                Proses Pengobatan</option>
                        </select>
                    </div>

                    <div class=" w-full flex items-end col-span-2 gap-4">
                        <button wire:click="batal" type="reset"
                            class="text-orange-500 bg-white  border border-orange-500 transition-all focus:ring-4 !p-2.5 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Batal</button>
                        <button type="submit"
                            class="text-white bg-orange-500  hover:bg-orange-600 transition-all focus:ring-4 !p-2.5 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>

                    </div>
                </form>
            @else
                <div class="p-4 grid grid-cols-2 gap-6">
                    @csrf
                    <div>
                        <label for="tglMulaiPendampingan"
                            class="block mb-2 text-sm required font-medium text-gray-900 dark:text-white">
                            Tanggal Mulai Pendampingan</label>
                        <input type="date" name="tglMulaiPendampingan" id="tglMulaiPendampingan" disabled
                            value="{{ $dataHasilPengobatan->tanggal_mulai_pendampingan }}"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    </div>
                    <div>
                        <label for="tanggalMulaiPengobatan"
                            class="block mb-2 text-sm disabled font-medium text-gray-900 dark:text-white">
                            Tanggal Mulai Pengobatan</label>
                        <input type="date" name="tanggalMulaiPengobatan" id="tanggalMulaiPengobatan" disabled
                            value="{{ $dataHasilPengobatan->tanggal_mulai_pengobatan }}"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    </div>
                    {{-- <div>
                        <label for="bulanLaporHasilPengobatan"
                            class="block mb-2 text-sm disabled font-medium text-gray-900 dark:text-white">
                            Bulan Lapor Hasil Pengobatan</label>
                        <input type="date" name="bulanLaporHasilPengobatan" id="bulanLaporHasilPengobatan" disabled
                            value="{{ $dataHasilPengobatan->bulan_lapor_hasil_pengobatan }}"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    </div> --}}
                    <div>
                        <label for="tglHasilPengobatan"
                            class="block mb-2 text-sm disabled font-medium text-gray-900 dark:text-white">
                            Tanggal Hasil Pengobatan</label>
                        <input type="date" name="tglHasilPengobatan" id="tglHasilPengobatan"
                            wire:model.live='tglHasilPengobatan' disabled
                            value="{{ $dataHasilPengobatan->tanggal_hasil_pengobatan }}"
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    </div>

                    <div>
                        <label for="hasilPemeriksaan"
                            class="block mb-2 text-sm disabled font-medium text-gray-900 dark:text-white">Tipe
                            Hasil Pengobatan</label>
                        <select id="hasilPemeriksaan" name="hasilPemeriksaan" disabled
                            class="bg-white border !border-orange-400 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                            <option selected value="">Pilih</option>
                            <option
                                value="Sembuh"{{ $dataHasilPengobatan->hasil_pengobatan == 'Sembuh' ? 'selected' : '' }}>
                                Sembuh</option>
                            {{-- <option
                                value="Lengkap"{{ $dataHasilPengobatan->hasil_pengobatan == 'Lengkap' ? 'selected' : '' }}>
                                Lengkap</option> --}}
                            <option
                                value="Meninggal"{{ $dataHasilPengobatan->hasil_pengobatan == 'Meninggal' ? 'selected' : '' }}>
                                Meninggal</option>
                            <option
                                value="Pindah"{{ $dataHasilPengobatan->hasil_pengobatan == 'Pindah' ? 'selected' : '' }}>
                                Pindah</option>
                            {{-- <option
                                value="Default"{{ $dataHasilPengobatan->hasil_pengobatan == 'Default' ? 'selected' : '' }}>
                                Default</option> --}}
                            <option
                                value="Gagal"{{ $dataHasilPengobatan->hasil_pengobatan == 'Gagal' ? 'selected' : '' }}>
                                Gagal</option>
                            <option
                                value="Belum Mulai Pengobatan"{{ $dataHasilPengobatan->hasil_pengobatan == 'Belum Mulai Pengobatan' ? 'selected' : '' }}>
                                Belum Mulai Pengobatan</option>
                            <option
                                value="Proses Pengobatan"{{ $dataHasilPengobatan->hasil_pengobatan == 'Proses Pengobatan' ? 'selected' : '' }}>
                                Proses Pengobatan</option>
                        </select>
                    </div>

                    <div class=" w-full flex items-end col-span-2 ">
                        <button wire:click="edit"
                            class="text-white bg-lime-500  hover:bg-lime-600 transition-all focus:ring-4 !p-2.5 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>
