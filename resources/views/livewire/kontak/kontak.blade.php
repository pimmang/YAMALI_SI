<div class="w-full flex flex-col gap-2 bg-white p-2  shadow-md pb-4 mt-2">
    <div class=" bg-white flex-grow text-md text-center flex flex-col gap-2 mb-4">
        <div class="rounded-md overflow-hidden border border-solid ">
            {{-- <div class="text-sm grid grid-cols-9 gap-2 w-full text-start font-bold text-white bg-orange-500 py-3">
                <p class="text-center">No</p>
                <p class="bg-red-400">Tanggal</p>
                <p>Nama</p>
                <p>Tgl Lahir</p>
                <p>Kelamin</p>
                <p>Alamat</p>
                <p>Rujukan</p>
                <p>Kunjungan</p>
                <p class="text-center">Aksi</p>
            </div>
            @php
                $i = 1;
            @endphp
            <div class="text-sm grid grid-cols-9 gap-2 w-full py-2 items-center text-start">
                @if ($kontaks->isEmpty())
                    <p class="col-span-9 text-black">data kontak belum ada</p>
                @else
                    @foreach ($kontaks as $kontak)
                        <p class="text-center">{{ $i }}</p>
                        <livewire:kontak.list-kontak :kontak="$kontak" />
                        @php
                            $i++;
                        @endphp
                    @endforeach
                @endif
            </div> --}}



            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                @if (!$kontaks->isEmpty())
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

                        <thead class="text-xs text-gray-700  bg-orange-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="text-center py-3 ">
                                    Aksi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Bergejala
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Beresiko
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Tgl Lahir
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kelamin
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alamat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Rujukan
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kunjungan
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kontaks as $kontak)
                                <livewire:kontak.list-kontak key="{{ now() }}" :kontak="$kontak" />
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="w-full text-center p-6 text-sm text-gray-700 font-medium">Belum ada kontak untuk Index ini
                    </p>
                @endif

            </div>


        </div>
    </div>
    <div class="flex flex-grow justify-end">
        <button wire:click='tambah'
            class=" bg-yellow-300 text-xs border-solid border active:scale-75 border-yellow-300 rounded-md px-3 font-semibold py-2 transition-all flex gap-1 items-center justify-center text-yellow-850"><i
                class="ph-bold ph-plus"></i>
            <p>Tambah kontak</p>
        </button>
    </div>

    @if ($state == 'tambah')
        <livewire:kontak.tambah-kontak :id="$idIndex" :status="$status" />
    @endif
    @if ($state == 'edit')
        <livewire:kontak.edit-kontak :id="$editId" :status="$status" />
    @endif



    @script
        <script>
            $wire.on('gagal', ({
                message
            }) => {
                tampilGagal(message);
            });
            $wire.on('tampilHapus', ({
                message
            }) => {
                tampilHapus();
            });
            $wire.on('sukses', ({
                message
            }) => {
                tampilSukses(message)
            });
        </script>
    @endscript
</div>
