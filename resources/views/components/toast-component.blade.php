<div id="toastSuccess"
    class="absolute translate-x-full right-0 z-50 top-16  overflow-hidden gap-4 trans flex items-center transition-all shadow-md justify-start w-fit bg-white border-solid rounded-md border-l-2 border-t-1 border-green-500 px-5 py-4 pe-10">
    <i class="ph ph-check-circle text-2xl text-green-600"></i>
    <i class="ph-bold ph-x absolute right-3 top-3 text-xs cursor-pointer " id="closeToast"></i>
    <div>
        <p class=" text-sm font-semibold">Sukses</p>
        @if (session($status))
            <p class="text-xs"> {{ session($status) }}</p>
        @endif
    </div>
    <div class="w-full border-b-2 border-solid left-0  animate-progress border-green-500 absolute bottom-0 "
        id="progress">
    </div>

    <script>
        const close = document.getElementById('closeToast');
        const toast = document.getElementById('toastSuccess');
        const progress = document.getElementById('progress');

        function tampil() {
            setTimeout(function() {
                toast.classList.remove('translate-x-full');
                toast.classList.remove('right-0');
                toast.classList.add('translate-x-0');
                toast.classList.add('right-10');
            }, 500);
            setTimeout(function() {
                toast.classList.add('translate-x-full');
                toast.classList.remove('right-10');
                toast.classList.add('right-0');

            }, 3000);


        };
        close.addEventListener("click", function() {
            toast.classList.add('translate-x-full');
            toast.classList.remove('right-10');
            toast.classList.add('right-0');
        });
    </script>
    @if (session($status))
        <script>
            tampil();
        </script>
    @endif
</div>
