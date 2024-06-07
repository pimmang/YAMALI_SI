<div id="toastHapus"
    class="absolute translate-x-full right-0  z-50 top-16 overflow-hidden gap-4 trans flex items-center transition-all shadow-md justify-end w-fit bg-white border-solid rounded-md border-l-2  border-yellow-500 px-5 py-4">
    <i class="ph ph-check-circle text-2xl text-yellow-600"></i>
    {{-- <i class="ph-bold ph-x absolute right-3 top-3 text-xs cursor-pointer " id="closeToast"></i> --}}
    <div>
        <p class=" text-sm font-semibold">Warning</p>
        <p class=" text-xs">Yakin akan menghapus data?</p>

    </div>
    <div class="flex gap-2 justify-end">
        <button class="rounded border-solid bg-red-500 text-2xs px-2 py-1 text-white" wire:click="hapus">Hapus</button>
        <button class="rounded border border-solid border-red-500 text-2xs px-2 text-red-500"
            id="closeHapusToast">Batal</button>
    </div>
    <div class="w-full border-b-2 border-solid left-0  border-yellow-500 absolute  bottom-0 " id="progressHapus">
    </div>

    <script>
        const closeHapus = document.getElementById('closeHapusToast');
        const toastHapus = document.getElementById('toastHapus');
        const progressHapus = document.getElementById('progressHapus');

        function tampilHapus() {
            setTimeout(function() {
                toastHapus.classList.remove('translate-x-full');
                toastHapus.classList.remove('right-0');
                toastHapus.classList.add('translate-x-0');
                toastHapus.classList.add('right-10');
                progressHapus.classList.add('animate-progress');
            }, 500);
            setTimeout(function() {
                toastHapus.classList.add('translate-x-full');
                toastHapus.classList.remove('right-10');
                progressHapus.classList.remove('animate-progress');
                toastHapus.classList.add('right-0');
            }, 3500);


        };
        closeHapus.addEventListener("click", function() {
            toastHapus.classList.add('translate-x-full');
            toastHapus.classList.remove('right-10');
            progressHapus.classList.remove('animate-progress');
            toastHapus.classList.add('right-0');
        });
    </script>
    {{-- @script
        <script>
            function hapus($id) {
                $wire.dispatchSelf('hapus', id = );
            }
        </script>
    @endscript --}}
    {{-- @if (session($status))
        <script>
            tampil();
        </script>
    @endif --}}
</div>
