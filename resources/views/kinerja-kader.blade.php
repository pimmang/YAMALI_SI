<!DOCTYPE html>
<html lang="en" class=" font-body">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/img/yamali.svg">
    <title>Yamali TB</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />
</head>

<body class="overflow-hidden h-screen w-screen text-sm font-body flex text-slate-700">

    @if ($kader)
        <div class="w-3/12  p-4 shadow-xl flex flex-col justify-between gap-3">
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 bg-orange-200 p-2 rounded-lg">
                    <i class="ph ph-user-circle text-2xl"></i>
                    <p class="text-sm">Informasi Kader</p>
                </div>
                <p class="bg-orange-500 text-white text-xs mt-3 px-2 py-1 w-fit rounded-md">Biodata</p>
                <div class="w-full text-sm px-3 flex flex-col gap-1">
                    <p class="text-xs text-gray-500 ">Nama</p>
                    <p class="font-semibold capitalize ">{{ $kader->nama }}</p>
                </div>
                <div class="w-full text-sm px-3 flex flex-col gap-1">
                    <p class="text-xs text-gray-500 ">NIK</p>
                    <p class="font-semibold w-full ">{{ $kader->nik }}</p>
                </div>
            </div>
            <div class="w-full bg-white h-fit  rounded-lg">
                <div class="flex items-center justify-between text-sm">
                    <p class="bg-orange-500 text-white text-xs mt-3 px-2 py-1 w-fit rounded-md">Pasien</p>
                    <p class="font-bold text-5xl">{{ $jumlahPasien }}</p>
                </div>

                <div id="pasien" class="mt-2"></div>
            </div>
        </div>

        <div class="w-9/12 p-4 overflow-y-scroll">
            <div class="flex items-center gap-4 justify-between">
                <div class="flex gap-2 items-center ">
                    <p class="font-bold text-lg">Kinerja Kader</p>
                </div>
                <form class="flex items-center gap-4 w-1/2" action="/cek-kinerja-kader" method="post">
                    @csrf
                    <p class="font-semibold">Tahun</p>
                    <select required name="tahun"
                        class="bg-white border border-white text-gray-900 text-xs rounded-lg shadow focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
                     
                        @for ($i = $tahunTerlama; $i <= date('Y'); $i++)
                            <option {{ $i == $tahunSekarang ? 'selected' : '' }} value="{{ $i }}">
                                {{ $i }}</option>
                        @endfor
                        
                    </select>
                    <p class="font-semibold">Bulan</p>
                    <select required name="bulan"
                        class="bg-white border border-white text-gray-900 text-xs rounded-lg shadow focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 ">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ $i == $bulanSekarang ? 'selected' : '' }}>
                                {{ $namaBulan[$i] }}
                            </option>
                        @endfor
                    </select>
                    <input type="text" hidden name="nik" value="{{ $kader->nik }}">
                    <button type="submit"
                        class="px-3 py-2 shadow bg-orange-500 text-white rounded-md hover:bg-orange-400">Filter</button>
                </form>
            </div>
            <div class="grid grid-cols-4 gap-4">
                <div class="col-span-1 h-20 mt-6 bg-white rounded-lg shadow p-4" id="tahap"></div>
                <div class="col-span-3 h-20 mt-6 bg-white rounded-lg shadow p-4" id="pendampingan"></div>
            </div>
            <div class="col-span-3 h-20 mt-6 bg-white rounded-lg shadow p-4" id="temuanKasus"></div>


        </div>



        <script>
            const optionsPasien = {
                series: [{{ $jumlahPositif }}, {{ $sembuh }}],
                chart: {
                    type: 'donut',
                    redrawOnParentResize: true,
                    redrawOnWindowResize: true,
                },
                // dataLabels: {
                //     enabled: false,
                // },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '45%',

                        }
                    }
                },
                labels: ['Positif', 'Sembuh'],
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

            const chartPasien = new ApexCharts(document.querySelector("#pasien"), optionsPasien);
            chartPasien.render();

            const optionsTemuanKasus = {
                series: [{
                        name: "Positif",
                        data: @json($positif)
                    },
                    {
                        name: "Negatif",
                        data: @json($negatif)
                    },
                    {
                        name: "Bergejala",
                        data: @json($bergejala)
                    },



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
                colors: ['#FE6077', '#008FFB', '#FEBC3B'],
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
                    categories: @json($tanggal),
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




            const optionsPendampingan = {
                series: [{
                    name: 'pendampingan',
                    data: @json($jumlahPendampingan)
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
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

                xaxis: {
                    categories: ["Minggu I", "Minggu II", "Minggu III", "Minggu IV", "Minggu V", "Minggu VI", "Minggu VII",
                        "Minggu VIII", "Bulan II", "Bulan III", "Bulan IV", "Bulan V", "Bulan VI", "Bulan VII",
                        "Bulan VIII", "Bulan IX", "Bulan X"
                    ],
                    position: 'bottom',
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    crosshairs: {
                        fill: {
                            type: 'gradient',
                            gradient: {
                                colorFrom: '#D8E3F0',
                                colorTo: '#BED1E6',
                                stops: [0, 100],
                                opacityFrom: 0.4,
                                opacityTo: 0.5,
                            }
                        }
                    },
                    style: {
                        fontSize: '5px',
                        colors: ["#304758"]
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                yaxis: {
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false,
                    },
                    labels: {
                        show: false,
                        formatter: function(val) {
                            return val + "Kontak";
                        }
                    }

                },
                title: {
                    text: 'Pendampingan',
                    style: {
                        fontSize: '12px',
                        fontWeight: '550',
                        fontFamily: 'Poppins, sans-serif',
                        color: '#374151'
                    }
                },
            };

            var chartPendampingan = new ApexCharts(document.querySelector("#pendampingan"), optionsPendampingan);
            chartPendampingan.render();

            var optionsTahap = {
                series: [{
                    data: [{{ $pendampinganIntensif }}, {{ $pendampinganLanjutan }}]
                }],
                chart: {
                    height: 350,
                    type: 'bar',
                    events: {
                        click: function(chart, w, e) {
                            // console.log(chart, w, e)
                        }
                    }
                },
                plotOptions: {
                    bar: {
                        columnWidth: '45%',
                        distributed: true,
                        borderRadius: 4,
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
                    categories: ['Intensif', 'Lanjutan'],
                    labels: {
                        style: {
                            fontSize: '12px'
                        }
                    }
                },
                title: {
                    text: 'Tahap Pendampingan',
                    style: {
                        fontSize: '12px',
                        fontWeight: '550',
                        fontFamily: 'Poppins, sans-serif',
                        color: '#374151'
                    }
                },
            };

            var chartTahap = new ApexCharts(document.querySelector("#tahap"), optionsTahap);
            chartTahap.render();
        </script>
    @else
        <div class="flex h-full w-full items-center justify-center flex-col text-red-600">
            <i class="ph ph-x-circle  text-5xl"></i>
            <p class="text-sm">Maaf, Kader Tidak Ditemukan</p>
        </div>

        <script>
            setTimeout(function() {
                window.location.href = "{{ route('login') }}";
            }, 2000);
        </script>
    @endif

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/leaflet-geosearch@latest/dist/bundle.min.js"></script>
</body>








</html>
