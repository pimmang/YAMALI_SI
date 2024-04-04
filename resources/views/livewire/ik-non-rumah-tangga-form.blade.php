<div class="h-fit w-full  pb-20">
    <form>
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            {{-- <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sumber
                    Data</label>
                <select id="countries"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Pilih</option>
                    <option value="pmdt">PMDT</option>
                    <option value="fasyankes">Fasyankes</option>
                    <option value="dppm">DPPM</option>
                </select>
            </div> --}}

            {{-- <div>
                <label for="countries"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                <select id="countries"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Pilih</option>
                    <option value="puskesmas">Puskesmas</option>
                    <option value="klinik">Klinik</option>
                    <option value="rumah sakit">Rumah Sakit</option>
                </select>
            </div> --}}

            {{-- <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tahun
                    Index</label>
                <select id="countries"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Pilih</option>
                    <option value="US">2021</option>
                    <option value="CA">2022</option>
                    <option value="FR">2023</option>
                    <option value="DE">2024</option>
                </select>
            </div> --}}

            {{-- <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">semester
                    Index</label>
                <select id="countries"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Pilih</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                </select>
            </div> --}}
            {{-- <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kegiatan
                    IK</label>
                <select id="countries"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Pilih</option>
                    <option value="re-visit">Re-visit</option>
                    <option value="re-ik">Re-IK (IK Ulang)</option>
                </select>
            </div> --}}

            {{-- <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID
                    Pasien</label>
                <input type="text" id="disabled-input" placeholder="ID Pasien"
                    class="bg-gray-100 border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 cursor-not-allowed"
                    value="" disabled>
            </div> --}}

            <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                </label>
                <input type="text" id="nama"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                    placeholder="Nama Pasien" required />
            </div>

            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No.
                    Registrasi</label>
                <input type="text" id="last_name"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                    placeholder="No. Register TBC.03/06 Indeks" required />
            </div>
            {{-- <div>
                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                    Terduga</label>
                <input type="tel" id="phone"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                    placeholder="Nomor Terduga" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required />
            </div> --}}
            {{-- <div>
                <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK
                    Index</label>
                <input type="text" id="website"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                    placeholder="NIK Index" required />
            </div> --}}

            {{-- <div>
                <label for="tanggal-lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Lahir</label>
                <div class="relative w-full " id="date-filter">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <input datepicker datepicker-autohide type="text" id="tanggal-lahir"
                        class="bg-white border border-white text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:!border-orange-500 block w-full ps-10 p-2.5 "
                        placeholder="Select date">
                </div>
            </div> --}}

            <div>
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                    Kelamin</label>
                <select id="countries"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Pilih</option>
                    <option value="re-visit">Laki-laki</option>
                    <option value="re-ik">Perempuan</option>
                </select>
            </div>

            <div>
                <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                <div class="relative flex overflow-hidden rounded-lg">
                    <input type="url" id="website"
                        class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                        placeholder="Umur" required />
                    <div
                        class="absolute right-0 flex items-center justify-center h-full w-1/5 px-4 bg-orange-300 text-gray-500">
                        <label class=" text-sm font-medium w-fit text-white">Tahun</label>
                    </div>
                </div>
            </div>



            {{-- <div>
                <label for="provinsi"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                <select id="provinsi"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option value = 'sulawesi selatan'>Sulawesi Selatan</option>
                </select>
            </div> --}}

            {{-- <div>
                <label for="kabupaten"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota/kabupaten</label>
                <select id="kabupaten" wire:model.change="kabupaten_id"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    @foreach ($kabupaten as $kab)
                        <option value={{ $kab->id }}>{{ ucwords(strtolower($kab->name)) }}
                        </option>
                    @endforeach
                </select>
            </div> --}}

            {{-- <div>
                <label for="kecamatan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                <select id="kecamatan"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option selected>Pilih</option>
                    @if ($kecamatan)
                        @foreach ($kecamatan as $kec)
                            <option value={{ ucwords(strtolower($kec->name)) }}>{{ ucwords(strtolower($kec->name)) }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div> --}}

            <div class="col-span-2">
                <label for="message"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <textarea id="message" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border !border-orange-200 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                    placeholder="Alamat"></textarea>
            </div>

            {{-- <div>
                <label for="Sr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SR</label>
                <select id="Sr"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option value="sulawesi selatan">Sulawesi Selatan</option>
                </select>
            </div> --}}

            {{-- <div>
                <label for="Ssr" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SSR</label>
                <select id="Ssr"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                    <option value="Bulukumba">Bulukumba</option>
                </select>
            </div> --}}

            {{-- <div>
                <label for="fasyankes"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                <input type="text" id="fasyankes"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                    placeholder="NIK Index" required />
            </div> --}}

            {{-- <div>
                <label for="kader"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kader</label>
                <input type="text" id="kader"
                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                    placeholder="NIK Index" required />
            </div> --}}

        </div>

        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>

</div>
