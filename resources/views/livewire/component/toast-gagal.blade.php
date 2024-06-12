<div id="toastGagal"
    class="absolute translate-x-full right-0 z-50 top-16  overflow-hidden gap-4 trans flex items-center transition-all shadow justify-start w-fit bg-white border-solid rounded-md border-l-2 border-t-1 border-red-500 px-5 py-4 pe-10">
    <i class="ph ph-check-circle text-2xl text-red-600"></i>
    <i class="ph-bold ph-x absolute right-3 top-3 text-xs cursor-pointer " id="closeToastGagal"></i>
    <div>

        <p class=" text-sm font-semibold text-red-500">Gagal</p>
        <p class="text-xs message"></p>

    </div>
    <div class="w-full border-b-2 border-solid left-0  border-red-500 absolute bottom-0 "
        id="progressGagal">
    </div>

    <script>
        const closeGagal = document.getElementById('closeToastGagal');
        const toastGagal = document.getElementById('toastGagal');
        const progressGagal = document.getElementById('progressGagal');
        let message = document.querySelector('.message');

        function tampilGagal($value) {
            console.log($value);
            message.textContent = $value;
            setTimeout(function() {
                toastGagal.classList.remove('translate-x-full');
                toastGagal.classList.remove('right-0');
                toastGagal.classList.add('translate-x-0');
                toastGagal.classList.add('right-10');
                progressGagal.classList.add('animate-progress');
            }, 500);
            setTimeout(function() {
                toastGagal.classList.add('translate-x-full');
                toastGagal.classList.remove('right-10');
                toastGagal.classList.add('right-0');
                progressGagal.classList.remove('animate-progress');
            }, 3500);


        };
        closeGagal.addEventListener("click", function() {
            toastGagal.classList.add('translate-x-full');
            toastGagal.classList.remove('right-10');
            toastGagal.classList.add('right-0');
            progressGagal.classList.remove('animate-progress');
        });
    </script>
</div>
