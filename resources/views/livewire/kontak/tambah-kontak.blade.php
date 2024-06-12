<div class="w-full h-full absolute z-50 top-0 left-0 flex items-center justify-center px-40 py-20 ">
    <div class="bg-black bg-opacity-55 w-full absolute z-10 h-full" wire:click='close'>

    </div>
    <div class="bg-white w-full h-full rounded-xl p-8 z-20">
        <div class="bg-white w-full h-full overflow-y-scroll">
            <div class="flex justify-between items-top">
                <h1 class="font-bold text-black text-xl mb-8">Tambah Kontak</h1>
                {{-- <div class="flex items-top gap-5 pe-10">
                <div
                    class="relative before:absolute before:z-50 before:content-['Edit'] before:shadow-md before:bg-white before:bottom-0 before:scale-0 before:transition-all hover:before:-bottom-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                    <i
                        class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
                </div>
                <div
                    class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:bottom-0 before:scale-0 before:transition-all hover:before:-bottom-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                    <i
                        class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
                </div>
            </div> --}}
            </div>
            <div>
                <form action="/tambah-kontak/{{ $idIndex }}" method="POST">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="tanggalKegiatan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Kegiatan</label>
                            <input type="date" name="tanggalKegiatan" id="tanggalKegiatan" 
                                required
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        </div>
                        <div>
                            <label for="nikKontak"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIK Kontak
                            </label>
                            <input type="text" id="nikKontak" name="nikKontak"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="Nik Kontak" required />
                        </div>
                        <div>
                            <label for="namaKontak"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                            </label>
                            <input type="text" id="namaKontak" name="namaKontak"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="Nama kontak" required />
                        </div>
                        <div>
                            <label for="tanggalLahir"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Lahir</label>
                            <input type="date" name="tanggalLahir" id="tanggalLahir" wire:model.live='tglLahir'
                                required
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        </div>
                        <div>
                            <label for="jenisKelamin"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                Kelamin</label>
                            <select id="jenisKelamin" name="jenisKelamin" required
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option selected>pilih</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <label for="umur"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Umur</label>
                            <div class="relative flex overflow-hidden rounded-lg">
                                <input type="number" id="umur" name="umur" value="{{ $umur }}"
                                    class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                    placeholder="Umur" readonly />
                                <div
                                    class="absolute right-0 flex items-center justify-center h-full w-1/5 px-4 bg-orange-300 text-gray-500">
                                    <label class=" text-sm font-medium w-fit text-white">Tahun</label>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label for="nomorTelepon"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                                Telepon</label>
                            <input type="text" id="nomorTelepon" name="nomorTelepon"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="Nomor Telepon" required />
                        </div>


                        <div>
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Jenis IK
                            </h3>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li
                                    class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="jenisIk" type="radio" value="tatap muka" name="jenisIk"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="jenisIk"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tatap
                                            Muka </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-span-2">
                            <label for="alamat"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <textarea id="alamat" rows="4" name="alamat"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border !border-orange-200 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="Alamat"></textarea>
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
                            <select id="ssr" name="ssr" wire:model.live='ssrPilihan'
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option value='' selected>Pilih</option>
                                @foreach ($ssrs as $ssr)
                                    <option value="{{ $ssr->id }}">{{ $ssr->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kontak
                                Serumah</h3>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li
                                    class="w-full border-b border-orange-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="kontakSerumah1" type="radio" value="1"
                                            name="kontakSerumah"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="kontakSerumah1"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                    <div class="flex items-center ps-3">
                                        <input id="kontakSerumah2" type="radio" value="0"
                                            name="kontakSerumah"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="kontakSerumah2"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class=" col-span-2 flex gap-3 items-center">
                            <hr class="flex-grow border-dashed border border-orange-400">
                            <h1 class="text-lg font-medium">Gejala</h1>
                            <hr class="flex-grow border-dashed border border-orange-400">
                        </div>
                        <div>
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batuk</h3>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li
                                    class="w-full border-b border-orange-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="batuk1" type="radio" value="1" name="batuk"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="batuk1"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                    <div class="flex items-center ps-3">
                                        <input id="batuk2" type="radio" value="0" name="batuk"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="batuk2"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sesak
                                Napas</h3>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li
                                    class="w-full border-b border-orange-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="sesakNapas1" type="radio" value="1" name="sesakNapas"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="sesakNapas1"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                    <div class="flex items-center ps-3">
                                        <input id="SesakNapas2" type="radio" value="0" name="sesakNapas"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="SesakNapas2"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Berkeringat di malam hari tanpa sebab</h3>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li
                                    class="w-full border-b border-orange-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="berkeringat1" type="radio" value="1" name="berkeringat"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="berkeringat1"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                    <div class="flex items-center ps-3">
                                        <input id="berkeringat2" type="radio" value="0" name="berkeringat"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="berkeringat2"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Demam
                                Meriang lebih dari 1 bulan</h3>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li
                                    class="w-full border-b border-orange-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="demam1" type="radio" value="1" name="demam"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="demam1"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                    <div class="flex items-center ps-3">
                                        <input id="demam2" type="radio" value="0" name="demam"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="demam2"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class=" col-span-2 flex gap-3 items-center">
                            <hr class="flex-grow border-dashed border border-orange-400">
                        </div>
                        <div class=" col-span-2 flex gap-3 items-center">
                            <hr class="flex-grow border-dashed border border-orange-400">
                            <h1 class="text-lg font-medium">Faktor Resiko</h1>
                            <hr class="flex-grow border-dashed border border-orange-400">
                        </div>

                        <div>
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diabetes
                                Melitus</h3>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li
                                    class="w-full border-b border-orange-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="diabetesMelitus1" type="radio" value="1"
                                            name="diabetesMelitus"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="diabetesMelitus1"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                    <div class="flex items-center ps-3">
                                        <input id="diabetesMelitus2" type="radio" value="0"
                                            name="diabetesMelitus"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="diabetesMelitus2"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lansia
                                diatas 60 tahun</h3>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li
                                    class="w-full border-b border-orange-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="lansia1" type="radio" value="1" name="lansia"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="lansia1"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                    <div class="flex items-center ps-3">
                                        <input id="lansia2" type="radio" value="0" name="lansia"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="lansia2"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ibu Hamil
                            </h3>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li
                                    class="w-full border-b border-orange-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="ibuHamil1" type="radio" value="1" name="ibuHamil"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="ibuHamil1"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                    <div class="flex items-center ps-3">
                                        <input id="ibuHamil2" type="radio" value="0" name="ibuHamil"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="ibuHamil2"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Perokok
                            </h3>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li
                                    class="w-full border-b border-orange-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="perokok1" type="radio" value="1" name="perokok"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="perokok1"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                    <div class="flex items-center ps-3">
                                        <input id="perokok2" type="radio" value="0" name="perokok"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="perokok2"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pernah
                                berobat TBC tapi tidak tuntas</h3>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li
                                    class="w-full border-b border-orange-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="pernahBerobat1" type="radio" value="1"
                                            name="pernahBerobat"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="pernahBerobat1"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ya
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                    <div class="flex items-center ps-3">
                                        <input id="pernahBerobat2" type="radio" value="0"
                                            name="pernahBerobat"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="pernahBerobat2"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class=" col-span-2 flex gap-3 items-center">
                            <hr class="flex-grow border-dashed border border-orange-400">
                        </div>

                        <div>
                            <label for="fasyankes"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fasyankes</label>
                            <select id="fasyankes" name="fasyankes"
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                                <option value='' selected>Pilih</option>
                                @if ($fasyankes)
                                    @foreach ($fasyankes as $fasyan)
                                        <option value="{{ $fasyan->id }}">{{ $fasyan->nama_fasyankes }}</option>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                        <div>
                            <h3 class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hasil Pemeriksaan
                            </h3>
                            <ul
                                class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-orange-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                <li
                                    class="w-full border-b border-orange-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="hasilPemeriksaan1" type="radio" value="Sakit"
                                            name="hasilPemeriksaan"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="hasilPemeriksaan1"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sakit
                                        </label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                    <div class="flex items-center ps-3">
                                        <input id="hasilPemeriksaan2" type="radio" value="Tidak"
                                            name="hasilPemeriksaan"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="hasilPemeriksaan2"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak</label>
                                    </div>
                                </li>
                                <li class="w-full border-b border-gray-200 sm:border-b-0 ">
                                    <div class="flex items-center ps-3">
                                        <input id="hasilPemeriksaan3" type="radio" value="Tidak ada"
                                            name="hasilPemeriksaan"
                                            class="w-4 h-4 text-orange-500 bg-gray-100 border-orange-300 focus:ring-orange-500   ">
                                        <label for="hasilPemeriksaan3"
                                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tidak
                                            Ada</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <label for="tanggalRevisit"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                Re-visit</label>
                            <input type="date" name="tanggalRevisit" id="tanggalRevisit"
                                wire:model.live='tglLahir' required
                                class="bg-white border !border-orange-200 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500">
                        </div>
                        <div>
                            <label for="keterangan"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                            <textarea id="keterangan" rows="4" name="keterangan"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border !border-orange-200 focus:ring-orange-500 focus:border-orange-500 dark:bg-gray-700 dark:border-orange-300 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="keterangan"></textarea>
                        </div>

                        <input type="hidden" name="status" value="ikrt">
                    </div>

                    <button type="submit"
                        class="text-white !bg-orange-500 !hover:bg-orange-800 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
