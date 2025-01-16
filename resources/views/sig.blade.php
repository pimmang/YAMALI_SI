@extends('layouts.main')
@push('leaflet')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endpush
@section('main')
    @if ($kosong)
        <div class="flex h-full w-full items-center justify-center flex-col text-red-600">
            <i class="ph ph-x-circle  text-5xl"></i>
            <p class="text-sm">Maaf, statistik belum dapat ditampilkan karena data Index kosong</p>
        </div>
    @else
        <div class="w-full gap-6 flex items-center justify-between mt-6">
            <p class="font-semibold text-lg text-gray-700">Peta Sebaran Kasus Tuberkulosis</p>
            <livewire:dashboard.dashboard :ssr="$ssrPilihan" :tahun="$tahun" :status="$status" />
        </div>


        <div id="map" class="w-full h-100 mt-8 rounded-lg shadow border-2 border-orange-500"></div>
        <script>
            var ternotifikasi = @json($ternotifikasi);
            // console.log(ternotifikasi);


            var map = L.map('map').setView([-2.301019, 120.377305], 6);


            var marker;
            ternotifikasi.forEach(function(item) {
                marker = L.marker([item.latitude, item.longitude]).addTo(map);
                marker.bindPopup(
                    'Nama : ' + item.nama + '<br>' +
                    'NIK : ' + item.nik_kontak + '<br>' +
                    'Alamat : ' + item.alamat + '<br>'
                    // 'SSR : ' + item.nama + '<br>' + 
                );
            });

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);



            // function onMapClick(e) {
            //     popup
            //         .setLatLng(e.latlng)
            //         .setContent("You clicked the map at " + e.latlng.toString())
            //         .openOn(map);
            // }

            // map.on('click', onMapClick);
        </script>
    @endif
@endsection
