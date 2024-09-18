<div class="flex items-center gap-4">
    <p class="font-semibold">SSR</p>
    <select wire:model.change='ssrPilihan' {{ Auth::user()->hasRole('sr') ? '' : 'disabled' }}
        class="bg-white border border-white text-gray-900 text-xs rounded-lg shadow focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">

        @if (Auth::user()->hasRole('sr'))
            <option value="semua">Semua</option>
            @foreach ($ssrs as $ssr)
                <option value="{{ $ssr->id }}">{{ $ssr->nama }}</option>
            @endforeach
        @else
            <option value="semua">{{ Auth::user()->name }}</option>
        @endif
    </select>
    <p class="font-semibold">Tahun</p>
    <select wire:model.change='tahun'
        class="bg-white border border-white text-gray-900 text-xs rounded-lg shadow focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
        <option value="semua">Semua</option>
        {{-- @if ($tahun != 'semua')
        @endif --}}
        <option value="{{ date('Y') }}">{{ date('Y') }}</option>
        @for ($i = date('Y') - 1; $i >= $tahunTerkecil; $i--)
            <option value="{{ $i }}"> {{ $i }}</option>
        @endfor
    </select>
</div>
