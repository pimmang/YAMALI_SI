<div class="flex items-center gap-4">
    <p class="font-semibold">SSR</p>
    <select wire:model.change='ssrPilihan'
        class="bg-white border border-white text-gray-900 text-xs rounded-lg shadow focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
        <option value="semua">Semua</option>
        @foreach ($ssrs as $ssr)
            <option value="{{ $ssr->id }}">{{ $ssr->nama }}</option>
        @endforeach
    </select>
</div>
