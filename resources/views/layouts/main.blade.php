<!DOCTYPE html>
<html lang="id" class=" font-body">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/img/yamali.svg">
    <title>Yamali TB</title>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script src="https://unpkg.com/@phosphor-icons/web"></script> --}}
    <script src="https://unpkg.com/@phosphor-icons/web@2.1.1"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    @livewireStyles
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />
    @stack('leaflet')
</head>

<body class="overflow-hidden h-screen w-screen relative">
    <div class="w-full bg-yellow-400 absolute top-0">
        @include('layouts.navigation')
    </div>
    <div class="w-screen h-full flex overflow-hidden !text-gray-900">
        <div class="sidebar pt-12 h-screen shadow-xl text-xs text-nowrap ">
            <div class="h-full w-full overflow-y-scroll p-3">
                <a href="/"
                    class="{{ $status == 'dashboard' ? 'bg-orange-100' : '' }} flex justify-between items-center w-full h-10 cursor-pointer  transition-all hover:bg-orange-200 px-3 rounded-md"
                    id="dashboard">
                    <div class="flex items-center justify-start  gap-2 ">
                        <i class="ph ph-house-line text-lg"></i>
                        <p>Dashboard</p>
                    </div>
                </a>
                <a href="/peta-sebaran-kasus"
                    class="{{ $status == 'sig' ? 'bg-orange-100' : '' }} flex justify-between items-center w-full h-10 cursor-pointer  transition-all hover:bg-orange-200 px-3 rounded-md"
                    id="sig">
                    <div class="flex items-center justify-start  gap-2 ">
                        <i class="ph ph-globe-hemisphere-west text-lg"></i>
                        <p>Peta Sebaran Kasus TB</p>
                    </div>
                </a>

                <a href="/profil"
                    class="{{ $status == 'profil' ? 'bg-orange-100' : '' }} flex justify-between items-center w-full h-10 cursor-pointer  transition-all hover:bg-orange-200 px-3 rounded-md"
                    id="profil">
                    <div class="flex items-center justify-start  gap-2 ">
                        <i class="ph ph-shield-plus text-lg"></i>
                        <p>Profil</p>
                    </div>
                </a>
                <a href="/index"
                    class="{{ $status == 'index' ? 'bg-orange-100' : '' }} flex justify-between items-center w-full h-10 cursor-pointer  transition-all hover:bg-orange-200 px-3 rounded-md"
                    id="index">
                    <div class="flex items-center justify-start  gap-2 ">
                        <i class="ph ph-file-plus text-lg"></i>
                        <p>Index</p>
                    </div>
                </a>


                {{-- menu investigasi kontak --}}
                <div class="  w-full {{ $status == 'rumah-tangga' || $status == 'non-rumah-tangga' || $status == 'tpt-balita' ? 'h-30' : 'h-10' }} overflow-hidden transition-all"
                    id="investigasiKontak">
                    <div class="flex justify-between items-center w-full h-10 cursor-pointer  transition-all hover:bg-orange-200 px-3 rounded-md "
                        id="investigasiKontakUtama">
                        <div class="flex items-center justify-start  gap-2 ">
                            <i class="ph ph-archive text-lg"></i>
                            <p>Investigasi Kontak</p>
                        </div>
                        <i class="ph ph-caret-right"></i>
                    </div>
                    <div class="ps-4">
                        <a href="/rumah-tangga"
                            class="flex w-full justify-start px-4 h-10 items-center hover:bg-orange-100 {{ $status == 'rumah-tangga' ? 'bg-orange-100' : '' }} gap-2 rounded-md"><i
                                class="ph ph-buildings text-lg"></i>
                            <p>Rumah Tangga</p>
                        </a>
                        <a href="/non-rumah-tangga"
                            class="flex justify-start w-full  px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'non-rumah-tangga' ? 'bg-orange-100' : '' }}"><i
                                class="ph ph-building text-lg"></i>
                            <p>Non Rumah Tangga</p>
                        </a>
                        {{-- <a href="/tpt-balita"
                            class="flex justify-start w-full px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'tpt-balita' ? 'bg-orange-100' : '' }}"><i
                                class="ph ph-baby-carriage text-lg"></i>
                            <p>TPT Balita</p>
                        </a> --}}
                    </div>
                </div>
                {{-- menu tbc so --}}
                <div class=" w-full {{ $status == 'terduga' || $status == 'ternotifikasi' ? 'h-30' : 'h-10' }} overflow-hidden transition-all"
                    id="tbc-so">
                    <div class="flex justify-between items-center w-full h-10 cursor-pointer  transition-all hover:bg-orange-200 px-3 rounded-md "
                        id="tbc-so-utama">
                        <div class="flex items-center justify-start  gap-2 ">
                            <i class="ph ph-plus-minus text-lg"></i>
                            <p>TBC-SO</p>
                        </div>
                        <i class="ph ph-caret-right "></i>
                    </div>
                    <div class="ps-4">
                        <a href="/terduga-tbc"
                            class="flex w-full justify-start px-4 h-10 items-center hover:bg-orange-100 {{ $status == 'terduga' ? 'bg-orange-100' : '' }} gap-2 rounded-md"><i
                                class="ph ph-file-minus text-lg"></i>
                            <p>Terduga TBC</p>
                        </a>
                        <a href="/ternotifikasi"
                            class="flex justify-start w-full  px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'ternotifikasi' ? 'bg-orange-100' : '' }}"><i
                                class="ph ph-file-plus text-lg"></i>
                            <p>Ternotifikasi</p>
                        </a>
                    </div>
                </div>
                {{-- menu laporan --}}
                {{-- <div class="text-gray-700 overflow-hidden {{ $status == 'lInvestigasiKontak' || $status == 'lTerdugaTbc' || $status == 'lTerdugaKasusEdukasiHiv' || $status == 'lTerdugaTbc' || $status == 'lTerdugaKasusEdukasiHiv' || $status == 'lTbRo' || $status == 'lIntervensiFasyankes' || $status == 'lCapaianIndikator' || $status == 'lHalamanMuka' || $status == 'lDataKader' || $status == 'lRekapKinerjaKader' || $status == 'lHasilPengobatan' || $status == 'lNarasiKegiatan' ? 'h-fit' : 'h-10' }} transition-all"
                    id="laporan">
                    <div class="flex justify-between items-center w-full h-10 px-3 cursor-pointer  transition-all hover:bg-orange-200 rounded-md "
                        id="laporanUtama">
                        <div class="flex w-full items-center justify-start  gap-2 ">
                            <i class="ph ph-newspaper-clipping text-lg"></i>
                            <p>Laporan</p>
                        </div>
                        <i class="ph ph-caret-right"></i>
                    </div>
                    <div class="ps-4 w-full">
                        <a href="/laporan/investigasi-kontak"
                            class="flex w-full justify-start px-4 h-10 items-center hover:bg-orange-100 {{ $status == 'lInvestigasiKontak' ? 'bg-orange-100' : '' }} gap-2 rounded-md"><i
                                class="ph ph-archive text-lg"></i>
                            <p>Investigasi Kontak</p>
                        </a>
                        <div class=" h-10 overflow-hidden items-center rounded-md transition-all " id="lTerdugaTbc">
                            <div id="lTerdugaTbcUtama"
                                class="flex items-center cursor-pointer px-4 rounded-lg h-10 justify-between hover:bg-orange-100 w-full {{ $status == 'lTerdugaTbc' ? 'bg-orange-100' : '' }} ">
                                <div class="flex items-center justify-start gap-2">
                                    <i class="ph ph-address-book text-lg"></i>
                                    <p>Terduga TBC</p>
                                </div>
                                <i class="ph ph-caret-right"></i>
                            </div>
                            <a href="/laporan/terduga TBC"
                                class="flex w-full justify-start pe-4 ps-8 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'lTbRo' ? 'bg-orange-100' : '' }}"><i
                                    class="ph ph-baby-carriage text-lg"></i>
                                <p>Rekap Capaian</p>
                            </a>
                            <a href="/laporan/tb-ro"
                                class="flex w-full justify-start pe-4 ps-8 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'lTbRo' ? 'bg-orange-100' : '' }}"><i
                                    class="ph ph-baby-carriage text-lg"></i>
                                <p>Spesimen Dahak</p>
                            </a>
                            <a href="/laporan/tb-ro"
                                class="flex w-full justify-start pe-4 h-10 ps-8 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'lTbRo' ? 'bg-orange-100' : '' }}"><i
                                    class="ph ph-baby-carriage text-lg"></i>
                                <p>OAT</p>
                            </a>
                            <a href="/laporan/tb-ro"
                                class="flex w-full justify-start pe-4 h-10 ps-8 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'lTbRo' ? 'bg-orange-100' : '' }}"><i
                                    class="ph ph-baby-carriage text-lg"></i>
                                <p>Pendamping SO</p>
                            </a>
                        </div>
                        <a href="/laporan/terduga-kasus-edukasi-hiv"
                            class="flex w-full justify-start px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'lTerdugaKasusEdukasiHiv' ? 'bg-orange-100' : '' }}"><i
                                class="ph ph-baby-carriage text-lg"></i>
                            <p>Terduga Kasus Edukasi HIV</p>
                        </a>
                        <a href="/laporan/tb-ro"
                            class="flex w-full justify-start px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'lTbRo' ? 'bg-orange-100' : '' }}"><i
                                class="ph ph-baby-carriage text-lg"></i>
                            <p>TB RO</p>
                        </a>
                        <a href="/laporan/intervensi-fasyankes"
                            class="flex w-full justify-start px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'lIntervensiFasyankes' ? 'bg-orange-100' : '' }}"><i
                                class="ph ph-baby-carriage text-lg"></i>
                            <p>Intervensi Fasyankes</p>
                        </a>
                        <a href="/laporan/capaian-indikator"
                            class="flex w-full justify-start px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'lCapaianIndikator' ? 'bg-orange-100' : '' }}"><i
                                class="ph ph-baby-carriage text-lg"></i>
                            <p>Capaian Indikator</p>
                        </a>
                        <a href="/laporan/halaman-muka"
                            class="flex w-full justify-start px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'lHalamanMuka' ? 'bg-orange-100' : '' }}"><i
                                class="ph ph-baby-carriage text-lg"></i>
                            <p>Halaman Muka</p>
                        </a>
                        <a href="/laporan/data-kader"
                            class="flex w-full justify-start px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'lDataKader' ? 'bg-orange-100' : '' }}"><i
                                class="ph ph-baby-carriage text-lg"></i>
                            <p>Data Kader</p>
                        </a>
                        <a href="/laporan/rekap-kinerja-kader"
                            class="flex w-full justify-start px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'lRekapKinerjaKader' ? 'bg-orange-100' : '' }}"><i
                                class="ph ph-baby-carriage text-lg"></i>
                            <p>Rekap Kinerja Kader</p>
                        </a>
                        <a href="/laporan/hasil-pengobatan"
                            class="flex w-full justify-start px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'lHasilPengobatan' ? 'bg-orange-100' : '' }}"><i
                                class="ph ph-baby-carriage text-lg"></i>
                            <p>Hasil Pengobatan</p>
                        </a>
                        <a href="/laporan/narasi-kegiatan"
                            class="flex w-full justify-start px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'lNarasiKegiatan' ? 'bg-orange-100' : '' }}"><i
                                class="ph ph-baby-carriage text-lg"></i>
                            <p>Laporan Narasi Kegiatan</p>
                        </a>
                    </div>
                </div> --}}

                {{-- menu Tambah --}}
                <div class="  w-full {{ $status == 'kader' || $status == 'fasyankes' || $status == 'ssr' ? 'h-40' : 'h-10' }} overflow-hidden transition-all"
                    id="tambah">
                    <div class="flex justify-between items-center w-full h-10 cursor-pointer  transition-all hover:bg-orange-200 px-3 rounded-md "
                        id="tambahUtama">
                        <div class="flex items-center justify-start  gap-2 ">
                            <i class="ph ph-folder-plus text-lg"></i>
                            <p>Tambah Data</p>
                        </div>
                        <i class="ph ph-caret-right "></i>
                    </div>
                    <div class="ps-4">
                        <a href="/kader"
                            class="flex w-full justify-start px-4 h-10 items-center hover:bg-orange-100 {{ $status == 'kader' ? 'bg-orange-100' : '' }} gap-2 rounded-md"><i
                                class="ph ph-person-arms-spread text-lg"></i>
                            <p>Kader</p>
                        </a>
                        <a href="/fasyankes"
                            class="flex justify-start w-full  px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'fasyankes' ? 'bg-orange-100' : '' }}"><i
                                class="ph ph-hospital text-lg"></i>
                            <p>Fasyankes</p>
                        </a>
                        @if (Auth::user()->hasRole('sr'))
                            <a href="/ssr"
                                class="flex justify-start w-full  px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'ssr' ? 'bg-orange-100' : '' }}"><i
                                    class="ph ph-git-branch text-lg"></i>
                                <p>SSR</p>
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        <div class="right w-full !h-full bg-gray-100 mt-12 overflow-y-scroll overflow-x-hidden !pb-16 p-6 !pt-2 ">
            @yield('main')

        </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/leaflet-geosearch@latest/dist/bundle.min.js"></script>
    <style>
        ::-webkit-scrollbar {
            width: 7px;
            height: 7px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: transparent;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #fb923c;
            border-radius: 5px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #fdba74;
            cursor: grab;
        }

        
    </style>
</body>

<script>
    const investigasiKontak = document.getElementById('investigasiKontak');

    // var tinggiKonten = document.getElementById('laporan').scrollHeight;
    // console.log("Jumlah tinggi konten adalah: " + tinggiKonten + "px");

    const investigasiKontakUtama = document.getElementById('investigasiKontakUtama');
    investigasiKontakUtama.addEventListener('click', function() {
        if (investigasiKontak.classList.contains('h-10')) {
            investigasiKontak.classList.add('h-30');
            investigasiKontak.classList.remove('h-10');
        } else if (investigasiKontak.classList.contains('h-30')) {
            investigasiKontak.classList.remove('h-30');
            investigasiKontak.classList.add('h-10');
        }
    })

    // const laporan = document.getElementById('laporan');
    // const laporanUtama = document.getElementById('laporanUtama');

    // laporanUtama.addEventListener('click', function() {
    //     if (laporan.classList.contains('h-10')) {
    //         laporan.classList.add('h-120');
    //         laporan.classList.remove('h-10');
    //     } else if (laporan.classList.contains('h-120')) {
    //         laporan.classList.add('h-10');
    //         laporan.classList.remove('h-120');
    //     }
    // })

    // const lTerdugaTbc = document.getElementById('lTerdugaTbc');
    // const lTerdugaTbcUtama = document.getElementById('lTerdugaTbcUtama');

    // lTerdugaTbcUtama.addEventListener('click', function() {
    //     if (lTerdugaTbc.classList.contains('h-10')) {
    //         lTerdugaTbc.classList.add('h-40');
    //         lTerdugaTbc.classList.remove('h-10');
    //         laporan.classList.remove('h-120');
    //         laporan.classList.add('h-fit');
    //     } else if (lTerdugaTbc.classList.contains('h-40')) {
    //         lTerdugaTbc.classList.add('h-10');
    //         lTerdugaTbc.classList.remove('h-40');
    //         laporan.classList.remove('h-fit');
    //         laporan.classList.add('h-120');
    //     }
    // })

    const tambah = document.getElementById('tambah');
    const tambahUtama = document.getElementById('tambahUtama');

    tambahUtama.addEventListener('click', function() {
        if (tambah.classList.contains('h-10')) {
            tambah.classList.add('h-40');
            tambah.classList.remove('h-10');
        } else if (tambah.classList.contains('h-40')) {
            tambah.classList.add('h-10');
            tambah.classList.remove('h-40');
        }
    })

    const tbcSo = document.getElementById('tbc-so');
    const tbcSoUtama = document.getElementById('tbc-so-utama');

    tbcSoUtama.addEventListener('click', function() {
        if (tbcSo.classList.contains('h-10')) {
            tbcSo.classList.add('h-30');
            tbcSo.classList.remove('h-10');
        } else if (tbcSo.classList.contains('h-30')) {
            tbcSo.classList.add('h-10');
            tbcSo.classList.remove('h-30');
        }
    })

    // console.log(laporan.style.height == `${tinggiKonten}`)
</script>

{{-- <script src="resources/js/app.js"></script> --}}
@stack('scripts')


</html>
