<div class="w-full flex flex-col items-start justify-start gap-6 text-slate-900 mt-8">
    <h1 class="font-bold text-gray-900 text-2xl">Rumah Tangga</h1>
    <x-toast-component :status="$statusPage" class="z-50" />
    <livewire:component.toast-hapus />
    <div class="flex items-center text-xs gap-1 font-semibold text-gray-500 ">
        <i class="ph-fill ph-house-line"></i>
        <i class="ph ph-caret-right text-sm font-bold"></i>
        <p>Investigasi kontak</p>
        <i class="ph ph-caret-right text-sm font-bold"></i>
        <p>Rumah tangga</p>
    </div>

    <div>
        @if ($status == 'list')
            <x-primary-button class="w-fit gap-2" wire:click='list'>
                <i class="ph ph-table text-lg"></i> List
            </x-primary-button>
            <x-secondary-button class="w-fit gap-2" wire:click='form'>
                <i class="ph ph-waveform text-lg"></i> Form
            </x-secondary-button>
        @elseif($status == 'form')
            <x-secondary-button class="w-fit gap-2" wire:click='list'>
                <i class="ph ph-table text-lg"></i> List
            </x-secondary-button>
            <x-primary-button class="w-fit gap-2" wire:click='form'>
                <i class="ph ph-waveform text-lg"></i> Form
            </x-primary-button>
        @endif

    </div>


    @if ($status == 'list')
        <div class="w-full flex flex-col gap-5 h-full">
            <div class="flex items-center text-sm font-semibold gap-4 mt-10 justify-between !w-full">
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <p>Show</p>
                        <select id="show" wire:model.live='show'
                            class="bg-gray-50 border border-white text-gray-900 text-sm rounded-lg shadow-md focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
                            <option selected class="bg-orange-500">10</option>
                            <option value="10" class="hover:bg-orange-500">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            <option value="all">all</option>
                        </select>
                    </div>

                    <div class="relative max-w-sm  " id="date-filter">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input datepicker datepicker-autohide type="text"
                            class="bg-gray-50 shadow-md border border-white text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:!border-orange-500 block w-full ps-10 p-2.5 "
                            placeholder="Select date">
                    </div>
                </div>


                <div class="relative w-1/2">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full ps-10 p-2.5 text-sm border-white text-gray-900 border shadow-md rounded-lg bg-gray-50 focus:ring-orange-500 focus:!border-orange-500"
                        placeholder="Cari data..." required />
                </div>
            </div>
            <div class="flex flex-col gap-3 mb-10">
                <div
                    class="rounded-lg text-xs shadow-md font-bold text-center text-white bg-orange-400 w-full grid grid-cols-5 gap-2 px-3 py-4">
                    <p>Nama</p>
                    <p>Tanggal Lahir</p>
                    <p>Umur</p>
                    <p>SSR</p>
                    <p>Aksi</p>
                </div>
                @foreach ($datas as $data)
                    
                @endforeach

                @if ($state == 'details')
                    <livewire:ik-rumah-tangga.ik-rumah-tangga-details :data="$details" />
                @endif

                @if ($state == 'edit')
                    <livewire:ik-rumah-tangga.ik-rumah-tangga-edit :data="$edits" />
                @endif

            </div>
        </div>
    @elseif($status == 'form')
        @livewire('ik-rumah-tangga.ik-rumah-tangga-form')
    @endif

    <style>
        .bg-blue-700 {
            background-color: rgb(255 90 31 / var(--tw-bg-opacity)) !important
        }
    </style>
</div>
