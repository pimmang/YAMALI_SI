<div class="w-full h-fit  flex flex-col items-start justify-start gap-6 text-slate-900 my-8 ">
    <x-toast-component :status="$statusPage" />
    <livewire:component.toast-hapus />
    <livewire:component.toast-confirm />
    <livewire:component.toast-gagal />
    <livewire:component.toast-sukses />
    <div class="w-full flex items-start justify-between mb-10">
        <div class="flex flex-col gap-2">
            <h1 class="font-bold text-gray-900 text-2xl">SSR</h1>
            <div class="flex items-center text-xs gap-1 font-semibold text-gray-500 ">
                <i class="ph-fill ph-house-line"></i>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                @if ($status == 'list')
                    <p>SSR</p>
                @elseif($status == 'form')
                    <p>Tambah SSR</p>
                @endif
                {{-- <i class="ph ph-caret-right text-sm font-bold"></i> --}}
            </div>
        </div>

    </div>

    @if ($status == 'list')
        <div class="w-full flex flex-col gap-5 h-full">
            <div class="flex flex-col gap-3 mb-10">
                <div class="relative  rounded-lg overflow-hidden">
                    <div class="flex">
                        <table
                            class="w-full overflow-x-auto text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-white uppercase bg-orange-500 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Verifikasi
                                    </th>
                            </thead>
                            <tbody>
                                @foreach ($ssrs as $ssr)
                                    <livewire:ssr.list-ssr key="{{ now() }}" :ssr="$ssr" />
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    @elseif($status == 'form')
        @livewire('fasyankes.fasyankes-form')
    @endif

    @script
        <script>
            $wire.on('confirm', () => {
                tampilConfirm();
            });
            $wire.on('verifikasi', ({
                message
            }) => {
                tampilConfirm(message);
            });
            $wire.on('sukses', ({
                message
            }) => {
                tampilSukses(message);
            });
        </script>
    @endscript

</div>
