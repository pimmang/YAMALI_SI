<!DOCTYPE html>
<html lang="en" class=" font-body">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/img/yamali.svg">
    <title>Yamali TB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    @livewireStyles
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</head>

<body class="overflow-hidden h-screen w-screen relative">
    <div class="w-full h-14 z-20 bg-yellow-400 absolute top-0">
        @include('layouts.navigation')
    </div>
    <div class="w-screen h-full flex overflow-hidden ">
        <div class="sidebar w-fit pt-20 h-screen px-3 pe-5 shadow-xl text-xs text-nowrap">

            <a href="/"
                class="{{ $status == 'dashboard' ? 'bg-orange-100' : '' }} flex justify-between items-center w-full h-10 cursor-pointer  transition-all hover:bg-orange-200 px-3 rounded-md"
                id="dashboard">
                <div class="flex items-center justify-start  gap-2 ">
                    <i class="ph ph-house-line text-lg"></i>
                    <p>Dashboard</p>
                </div>
            </a>
            <div class="text-gray-700 {{ $status == 'rumah-tangga' || $status == 'non-rumah-tangga' || $status == 'tpt-balita' ? 'h-40' : 'h-10' }} overflow-hidden transition-all"
                id="dropdownMenu">
                <div class="flex justify-between items-center w-full h-10 cursor-pointer  transition-all hover:bg-orange-200 px-3 rounded-md "
                    id="dropdownMenuUtama">
                    <div class="flex items-center justify-start  gap-2 ">
                        <i class="ph ph-archive text-lg"></i>
                        <p>Investigasi Kontak</p>
                    </div>
                    <i class="ph ph-caret-right"></i>
                </div>
                <div class="ps-4">
                    <a href="/rumah-tangga"
                        class="flex justify-start px-4 h-10 items-center hover:bg-orange-100 {{ $status == 'rumah-tangga' ? 'bg-orange-100' : '' }} gap-2 rounded-md"><i
                            class="ph ph-buildings text-lg"></i>
                        <p>Rumah Tangga</p>
                    </a>
                    <a href="/non-rumah-tangga"
                        class="flex justify-start px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'non-rumah-tangga' ? 'bg-orange-100' : '' }}"><i
                            class="ph ph-building text-lg"></i>
                        <p>Non Rumah Tangga</p>
                    </a>
                    <a href="/tpt-balita"
                        class="flex justify-start px-4 h-10 items-center hover:bg-orange-100 gap-2 rounded-md {{ $status == 'tpt-balita' ? 'bg-orange-100' : '' }}"><i
                            class="ph ph-baby-carriage text-lg"></i>
                        <p>TPT Balita</p>
                    </a>
                </div>
            </div>
        </div>

        <div class="z-10 right w-full !h-full bg-gray-100 pt-20 overflow-y-scroll overflow-x-hidden p-6">
            @yield('main')
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    @livewireScripts
</body>

<script>
    const dropdownMenu = document.getElementById('dropdownMenu');
    const dropdownMenuUtama = document.getElementById('dropdownMenuUtama');
    dropdownMenuUtama.addEventListener('click', function() {
        if (dropdownMenu.classList.contains('h-10')) {
            console.log('10')
            dropdownMenu.classList.add('h-40');
            dropdownMenu.classList.remove('h-10');
        } else if (dropdownMenu.classList.contains('h-40')) {
            console.log('40')
            dropdownMenu.classList.remove('h-40');
            dropdownMenu.classList.add('h-10');
        }
    })
</script>


</html>
