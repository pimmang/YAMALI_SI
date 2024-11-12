<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=" font-body">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-body text-gray-900 antialiased overflow-hidden  bg-orange-500">
    <div class="h-screen w-screen flex items-center   bg-transparent">
        <div class="w-3/6 h-full relative p-8">
            <h1 class="text-white font-black text-4xl text-center mt-2">Selamat Datang Di Sistem Informasi Lembaga
                Yamali TB
                Sulawesi Selatan</h1>
            <img src="/img/login.png" alt="" class="absolute bottom-0  left-1/2 -translate-x-1/2 w-3/4">
        </div>

        <div
            class="w-4/6 h-full px-6 py-4 relative bg-white  overflow-hidden flex justify-center  flex-col shadow-2xl items-center rounded-l-3xl">


            <!-- Modal toggle -->
            <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                class="absolute top-5 right-5 text-gray-700 font-medium text-sm border hover:text-orange-500 hover:scale-105 transition-all border-slate-700 hover:border-orange-500 rounded-md px-2 flex gap-2 items-center  "
                type="button">
                <i class="ph-bold text-lg ph-address-book-tabs"></i>
                <p>Cek Kinerja Kader</p>
            </button>

            <!-- Main modal -->
            <livewire:kader.form-cek-kinerja-kader />

            <div class="w-1/2 ">

                {{ $slot }}
            </div>

        </div>
    </div>
</body>

</html>
