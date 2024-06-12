<div id="toastSukses"
    class="absolute translate-x-full right-0 z-50 top-16  overflow-hidden gap-4 trans flex items-center transition-all shadow justify-start w-fit bg-white border-solid rounded-md border-l-2 border-t-1 border-lime-500 px-5 py-4 pe-10">
    <i class="ph ph-check-circle text-2xl text-lime-600"></i>
    <i class="ph-bold ph-x absolute right-3 top-3 text-xs cursor-pointer " id="closeToastSukses"></i>
    <div>

        <p class=" text-sm font-semibold text-lime-500">Sukses</p>
        <p class="text-xs messageSukses"></p>

    </div>
    <div class="w-full border-b-2 border-solid left-0  border-lime-500 absolute bottom-0 "
        id="progressSukses">
    </div>

    <script>
        const closeSukses = document.getElementById('closeToastSukses');
        const toastSukses = document.getElementById('toastSukses');
        const progressSukses = document.getElementById('progressSukses');
        let messageSukses = document.querySelector('.messageSukses');

        function tampilSukses($value) {
            console.log($value);
            messageSukses.textContent = $value;
            setTimeout(function() {
                toastSukses.classList.remove('translate-x-full');
                toastSukses.classList.remove('right-0');
                toastSukses.classList.add('translate-x-0');
                toastSukses.classList.add('right-10');
                progressSukses.classList.add('animate-progress');
            }, 500);
            setTimeout(function() {
                toastSukses.classList.add('translate-x-full');
                toastSukses.classList.remove('right-10');
                toastSukses.classList.add('right-0');
                progressSukses.classList.remove('animate-progress');
            }, 3500);


        };
        closeSukses.addEventListener("click", function() {
            toastSukses.classList.add('translate-x-full');
            toastSukses.classList.remove('right-10');
            toastSukses.classList.add('right-0');
            progressSukses.classList.remove('animate-progress');
        });
    </script>
</div>
