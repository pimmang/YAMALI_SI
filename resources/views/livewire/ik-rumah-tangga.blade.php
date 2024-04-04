<div class="w-full h-full flex flex-col items-start justify-start gap-6 text-slate-900 mt-8">
    <h1 class="font-bold text-gray-900 text-2xl">Rumah Tangga</h1>

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
        <x-list-ik-rumah-tangga />
    @elseif($status == 'form')
        @livewire('ik-rumah-tangga-form')
    @endif

    <style>
        .bg-blue-700 {
            background-color: rgb(255 90 31 / var(--tw-bg-opacity)) !important
        }
    </style>
</div>
