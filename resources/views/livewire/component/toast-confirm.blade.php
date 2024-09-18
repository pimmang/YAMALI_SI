<div id="toastConfirm"
    class="absolute translate-x-full right-0 z-50 top-16 overflow-hidden gap-4 trans flex items-center transition-all shadow justify-end w-fit bg-white border-solid rounded-md border-l-2  border-yellow-500 px-5 py-4">
    <i class="ph ph-check-circle text-2xl text-yellow-600"></i>
    {{-- <i class="ph-bold ph-x absolute right-3 top-3 text-xs cursor-pointer " id="closeToast"></i> --}}
    <div>
        <p class=" text-sm font-semibold">Warning</p>
        <p class=" text-xs">{{ $message }}</p>

    </div>
    <div class="flex gap-2 justify-end">
        <button class="rounded border border-solid border-lime-500 text-2xs px-2 text-lime-500"
            id="closeConfirmToast">Batal</button>
        <button class="rounded border-solid bg-lime-500 text-2xs px-2 py-1 text-white"
            wire:click="verifikasi">Yakin</button>

    </div>
    <div class="w-full border-b-2 border-solid left-0  border-yellow-500 absolute  bottom-0 " id="progressConfirm">
    </div>

    <script>
        const closeConfirm = document.getElementById('closeConfirmToast');
        const toastConfirm = document.getElementById('toastConfirm');
        const progressConfirm = document.getElementById('progressConfirm');

        function tampilConfirm() {
            setTimeout(function() {
                toastConfirm.classList.remove('translate-x-full');
                toastConfirm.classList.remove('right-0');
                toastConfirm.classList.add('translate-x-0');
                toastConfirm.classList.add('right-10');
                progressConfirm.classList.add('animate-progress');
            }, 500);
            setTimeout(function() {
                toastConfirm.classList.add('translate-x-full');
                toastConfirm.classList.remove('right-10');
                progressConfirm.classList.remove('animate-progress');
                toastConfirm.classList.add('right-0');
            }, 3500);


        };
        closeConfirm.addEventListener("click", function() {
            toastConfirm.classList.add('translate-x-full');
            toastConfirm.classList.remove('right-10');
            progressConfirm.classList.remove('animate-progress');
            toastConfirm.classList.add('right-0');
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
