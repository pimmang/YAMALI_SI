<div class="w-full flex flex-col gap-2 bg-white p-2 rounded-lg shadow-md">
    <div class=" bg-white flex-grow text-xs text-center flex flex-col gap-2">
        <div class="rounded-md overflow-hidden border border-solid ">
            <div class="text-xs grid grid-cols-9 gap-2 w-full  font-bold text-white bg-orange-300 py-2">
                <p>No</p>
                <p>Tanggal</p>
                <p>Nama</p>
                <p>Tgl Lahir</p>
                <p>Kelamin</p>
                <p>Alamat</p>
                <p>Rujukan</p>
                <p>Kunjungan</p>
                <p>Aksi</p>
            </div>
            @php
                $i = 1;
            @endphp
            <div class="text-xs grid grid-cols-9 gap-2 w-full py-2 ">
                @if ($kontaks->isEmpty())
                    <p class="col-span-9 text-black">data kontak belum ada</p>
                @else
                    @foreach ($kontaks as $kontak)
                        <p>{{ $i }}</p>
                        <p>{{ $kontak->tgl_kegiatan }}</p>
                        <p>{{ $kontak->nama }}</p>
                        <p>{{ $kontak->tgl_lahir }}</p>
                        <p>{{ $kontak->jenis_kelamin }}</p>
                        <p>{{ $kontak->alamat }}</p>
                        <p>dirujuk</p>
                        <p>dikunjungi</p>
                        <p>aksi</p>
                    @endforeach
                @endif

            </div>

        </div>
    </div>
    <div class="flex flex-grow justify-end">
        <button wire:click='tambah'
            class=" text-xs bg-white border-solid border active:scale-75 border-lime-500 rounded-md px-3 py-1 transition-all flex gap-1 items-center justify-center text-lime-500"><i
                class="ph-bold ph-plus"></i>
            <p>Tambah</p>
        </button>
    </div>

    @if ($state == 'tambah')
        <livewire:kontak.tambah-kontak :id="$idIndex" />
    @endif
</div>
