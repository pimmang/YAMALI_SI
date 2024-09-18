<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="flex flex-col gap-4">
        <p class="text-4xl font-bold text-lime-500 ">Terima Kasih</p>
        <p class="text-sm ">Akun anda sedang diverifikasi, silahkan konfimasi ke admin</p>
    </div>

    <script>
        setTimeout(function() {
            window.location.href = "{{ route('login') }}";
        }, 5000);
    </script>

</x-guest-layout>
