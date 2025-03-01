@extends('layouts.main')

@section('main')
    @if ($kosong)
        <div class="flex h-full w-full items-center justify-center flex-col text-red-600">
            <i class="ph ph-x-circle  text-5xl"></i>
            <p class="text-sm">Maaf, statistik belum dapat ditampilkan karena data Index kosong</p>
        </div>
    @else
        <div class="w-full mt-4 text-gray-700">

            <div class="w-full gap-6 flex items-center justify-between">
                <p class="font-semibold text-lg text-gray-700">Dashboard</p>
                <livewire:dashboard.dashboard :ssr="$ssrPilihan" :tahun="$tahun" :status="$status" />
            </div>

            <div class="grid grid-cols-2 w-full mt-8 gap-4">
                <div class="grid grid-cols-2 flex-grow gap-4">

                    <div class="bg-white shadow col-span-2 rounded-lg p-2 flex flex-col justify-start gap-3">
                        <div class="flex-col gap-4 p-2 grid grid-cols-2">
                            <div class="col-span-2 flex justify-between">
                                <p class="font-semibold text-sm">Kontak Diperiksa</p>
                                <div class="flex items-center gap-2">
                                    <p class="font-bold text-xl">{{ $jumlahTerduga }}</p>
                                    <p class="text-2xs font-medium bg-orange-500 rounded-xl px-2 py-1 text-white">Kasus</p>
                                </div>
                            </div>
                            <div id="kontakDiperiksaChart" class="mt-2"></div>
                            <div id="jenisKelamin" class="mt-2"></div>
                        </div>
                    </div>

                </div>
                <div class="grid grid-cols-2 gap-4 w-full text-xs font-semibold">
                    <div class="w-full bg-white shadow h-24 p-4 rounded-lg">
                        <div class="flex items-top justify-between">
                            <p>Kontak Bergejala</p>
                            <i class="ph-bold ph-address-book text-lg text-yellow-300"></i>
                        </div>
                        <p class="font-bold text-xl">{{ $jumlahBergejala }}</p>
                    </div>
                    <div class="w-full bg-white shadow h-24 p-4 rounded-lg">
                        <div class="flex items-top justify-between">
                            <p>Kontak Dikunjungi</p>
                            <i class="ph-bold ph-car-profile text-lg text-blue-500"></i>
                        </div>
                        <p class="font-bold text-xl">{{ $jumlahDikunjungi }}</p>
                    </div>
                    <div class="w-full bg-white shadow h-24 p-4 rounded-lg">
                        <div class="flex items-top justify-between">
                            <p>Kontak Dirujuk</p>
                            <i class="ph-bold ph-hospital text-lg text-lime-400"></i>
                        </div>
                        <p class="font-bold text-xl">{{ $jumlahDirujuk }}</p>
                    </div>
                    <div class="w-full grid grid-cols-2 gap-2">
                        <div class="w-full bg-white shadow h-24 p-4 rounded-lg">
                            <div class="flex items-top justify-between">
                                <p>Kader</p>
                                <i class="ph-bold ph-stethoscope text-lg text-red-500"></i>
                            </div>
                            <p class="font-bold text-xl">{{ $jumlahKader }}</p>
                        </div>
                        <div class="w-full bg-white shadow h-24 p-4 rounded-lg">
                            <div class="flex items-top justify-between">
                                <p>Fasyankes</p>
                                <i class="ph-bold ph-stethoscope text-lg text-red-500"></i>
                            </div>
                            <p class="font-bold text-xl">{{ $jumlahFasyankes }}</p>
                        </div>

                    </div>

                </div>
                <div class="col-span-2">
                    <div class="w-full grid grid-cols-4 gap-4">
                        <div class="bg-white shadow rounded-lg p-2 flex flex-col justify-start gap-3" id="indexChart">
                            <div class="flex flex-col p-2 gap-2">
                                <p class="font-semibold text-xs">Index</p>
                                <div class="flex items-center gap-2">
                                    <p class="font-bold text-xl">{{ $jumlahIndex }}</p>
                                    <p class="text-2xs font-medium bg-orange-500 rounded-xl px-2 py-1 text-white">Index</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-3 h-20 bg-white rounded-lg shadow p-4" id="temuanKasus"></div>

                    </div>
                </div>
                <div class="w-full p-4 bg-white rounded-lg shadow" id="hasilPengobatan">

                </div>

                <div class="w-full p-4 bg-white rounded-lg shadow" id="kinerjaFasyankes">
                    <div class="flex items-center justify-between w-full ">

                    </div>

                </div>



            </div>






            <script>
                const optionsTemuanKasus = {
                    series: [{
                            name: "Positif",
                            data: @json($temuanPositif)
                        },
                        {
                            name: "Negatif",
                            data: @json($temuanNegatif)
                        },
                        {
                            name: "Bergejala",
                            data: @json($temuanBergejala)
                        }


                    ],
                    chart: {
                        height: 350,
                        type: 'line',
                        zoom: {
                            enabled: false
                        },
                        toolbar: {
                            show: false
                        }
                    },
                    colors: ['#FE6077', '#26E7A6', '#FEBC3B'],
                    dataLabels: {
                        enabled: true,
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    title: {
                        text: 'Temuan Kasus Investigasi Kontak',
                        style: {
                            fontSize: '12px',
                            fontWeight: '550',
                            fontFamily: 'Poppins, sans-serif',
                            color: '#374151'
                        }
                    },
                    grid: {
                        borderColor: '#e7e7e7',
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                            opacity: 0.5
                        },
                    },
                    markers: {
                        size: 1
                    },
                    xaxis: {
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                    },

                    legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        floating: true,
                        offsetY: -25,
                        offsetX: -5
                    }
                };

                const chartTemuanKasus = new ApexCharts(document.querySelector("#temuanKasus"), optionsTemuanKasus);
                chartTemuanKasus.render();





                const optionsJenisKelamin = {
                    series: [@json($jumlahDiperiksaLaki), @json($jumlahDiperiksaPerempuan)],
                    chart: {
                        type: 'donut',
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '45%',

                            }
                        }
                    },
                    labels: ['Pria', 'Wanita'],
                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }]
                };

                const chartJenisKelamin = new ApexCharts(document.querySelector("#jenisKelamin"), optionsJenisKelamin);
                chartJenisKelamin.render();






                const optionsKinerjaFasyankes = {
                    series: [{
                        data: @json($jumlahRawat)
                    }],
                    chart: {
                        type: 'bar',
                        events: {
                            click: function(chart, w, e) {
                                // console.log(chart, w, e)
                            }
                        }
                    },
                    title: {
                        text: 'Kinerja Fasyankes',
                        style: {
                            fontSize: '12px',
                            fontWeight: '550',
                            fontFamily: 'Poppins, sans-serif',
                            color: '#374151'
                        }
                    },

                    // colors: colors,
                    plotOptions: {
                        bar: {
                            columnWidth: '45%',
                            distributed: true,
                            borderRadius: 5,
                            borderRadiusApplication: 'end',
                            dataLabels: {
                                position: 'top', // top, center, bottom
                            },
                            horizontal: true,

                        }
                    },
                    dataLabels: {
                        enabled: true,
                        offsetX: 20,
                        style: {
                            fontSize: '12px',
                            colors: ["#304758"]
                        }
                    },
                    legend: {
                        show: false
                    },
                    xaxis: {
                        categories: @json($namaFasyankes),
                        labels: {
                            style: {
                                // colors: colors,
                                fontSize: '10px'
                            }
                        }
                    },


                };

                const chartKinerjaFasyankes = new ApexCharts(document.querySelector("#kinerjaFasyankes"),
                    optionsKinerjaFasyankes);
                chartKinerjaFasyankes.render();
                const optionsHasilPengobatan = {
                    series: [{
                        data: [{{ $jumlahSembuh }}, {{ $jumlahMeninggal }}, {{ $jumlahPindah }}, {{ $jumlahLengkap }},
                            {{ $jumlahGagal }}, {{ $jumlahBelumMulai }}, {{ $jumlahProses }}
                        ]
                    }],
                    chart: {
                        type: 'bar',
                        events: {
                            click: function(chart, w, e) {
                                // console.log(chart, w, e)
                            }
                        }
                    },
                    title: {
                        text: 'Status Pengobatan  Pasien',
                        style: {
                            fontSize: '12px',
                            fontWeight: '550',
                            fontFamily: 'Poppins, sans-serif',
                            color: '#374151',
                        }
                    },
                    // colors: colors,
                    plotOptions: {
                        bar: {
                            columnWidth: '45%',
                            distributed: true,
                            borderRadius: 5,
                            borderRadiusApplication: 'end',
                            dataLabels: {
                                position: 'top', // top, center, bottom
                            },

                        }
                    },
                    dataLabels: {
                        enabled: true,
                        offsetY: -20,
                        style: {
                            fontSize: '12px',
                            colors: ["#304758"]
                        }
                    },
                    legend: {
                        show: false
                    },
                    xaxis: {
                        categories: [
                            'Sembuh', 'Meninggal', 'Pindah', 'Lengkap', 'Gagal', ['Belum', 'Mulai'], 'Proses'
                        ],
                        labels: {
                            style: {
                                // colors: colors,
                                fontSize: '10px'
                            }
                        }
                    },


                };

                const hasilPengobatanChart = new ApexCharts(document.querySelector("#hasilPengobatan"),
                    optionsHasilPengobatan);
                hasilPengobatanChart.render();



                const optionsDiperiksa = {
                    chart: {
                        type: 'donut',
                        height: 100,
                    },
                    colors: ['#EF4444', '#84CC16'],
                    series: [{{ $jumlahPositif }}, {{ $jumlahNegatif }}],
                    labels: ['Positif', 'Negatif'],

                    plotOptions: {
                        pie: {
                            donut: {
                                size: '45%',
                            }
                        }
                    },
                    dataLabels: {
                        enabled: false,
                    }

                }

                const kontakDiperiksaChart = new ApexCharts(document.querySelector("#kontakDiperiksaChart"),
                    optionsDiperiksa);

                kontakDiperiksaChart.render();

                const optionsIndex = {
                    series: [{
                        data: [{{ $jumlahIkrt }}, {{ $jumlahIknrt }}, {{ $jumlahBelumIk }}]
                    }],
                    chart: {
                        type: 'bar',
                        events: {
                            click: function(chart, w, e) {
                                // console.log(chart, w, e)
                            }
                        },
                        height: 250,
                        toolbar: {
                            show: false,
                        }
                    },

                    // colors: colors,
                    plotOptions: {
                        bar: {
                            columnWidth: '45%',
                            distributed: true,
                            borderRadius: 5,
                            borderRadiusApplication: 'end',
                            dataLabels: {
                                position: 'top', // top, center, bottom
                            },

                        }
                    },
                    dataLabels: {
                        enabled: true,
                        offsetY: -20,
                        style: {
                            fontSize: '12px',
                            colors: ["#304758"]
                        }
                    },
                    legend: {
                        show: false
                    },
                    xaxis: {
                        categories: [
                            'IK-RT', 'IK-NRT', 'Belum-IK'
                        ],
                        labels: {
                            style: {
                                // colors: colors,
                                fontSize: '10px'
                            }
                        }
                    },



                }

                const index = new ApexCharts(document.querySelector("#indexChart"),
                    optionsIndex);

                index.render();
            </script>

        </div>
    @endif
@endsection
