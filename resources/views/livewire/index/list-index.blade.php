<div class="w-full flex flex-col items-start justify-start gap-6 text-slate-900 mt-2">

    <x-toast-component :status="$statusPage" class="z-50" />
    <livewire:component.toast-gagal />
    <livewire:component.toast-sukses />
    <livewire:component.toast-hapus />
    <div class="flex w-full justify-between">

        <div>
            <h1 class="font-bold text-gray-900 text-2xl">Index</h1>
            <div class="flex items-center text-xs gap-1 font-semibold text-gray-500 ">
                <i class="ph-fill ph-house-line"></i>
                <i class="ph ph-caret-right text-sm font-bold"></i>
                <p>Index</p>
            </div>
        </div>
        <div>
            @if ($status == 'list')
                <x-primary-button class="w-fit gap-2" wire:click='list'>
                    <i class="ph ph-table text-lg"></i> List
                </x-primary-button>
                <x-secondary-button class="w-fit gap-2" wire:click='form'>
                    <i class="ph ph-waveform text-lg"></i> Form
                </x-secondary-button>
            @elseif($status == 'form')
                <x-secondary-button class="w-fit gap-2" wire:click='list'>
                    <i class="ph ph-table text-lg"></i> List
                </x-secondary-button>
                <x-primary-button class="w-fit gap-2" wire:click='form'>
                    <i class="ph ph-waveform text-lg"></i> Form
                </x-primary-button>
            @endif

        </div>
    </div>

    {{-- @if ($status == 'list') --}}
    <div class="w-full flex flex-col gap-5 h-full {{ $status == 'list' ? '' : 'hidden' }}">
        <div class="w-full flex h-fit  gap-6 mb-6">
            <div
                class="w-1/2 flex-grow flex flex-col justify-between text-sm font-medium bg-white shadow  p-4 rounded-lg">
                <div class="flex items-top justify-between">
                    <p>Summary</p>
                    <i class="ph-bold ph-building text-lg text-yellow-300"></i>
                </div>
                <div id="belumIK"></div>
            </div>
            <div class="w-1/2 grid grid-cols-2 gap-6  h-fit text-sm font-medium">
                <div class="w-full bg-white shadow h-fit p-4 rounded-lg">
                    <div class="flex items-top justify-between">
                        <p>IK-RT</p>
                        <i class="ph-bold ph-buildings  text-lg text-lime-400"></i>
                    </div>
                    <div id="jumlahIKRT"></div>
                </div>
                <div class="w-full bg-white shadow h-fit p-4 rounded-lg">
                    <div class="flex items-top justify-between">
                        <p>IK-NRT</p>
                        <i class="ph-bold ph-building text-lg text-yellow-300"></i>
                    </div>
                    <div id="jumlahIKNRT"></div>
                </div>

            </div>
        </div>
        <livewire:component.filter-data>
            <div class="relative  shadow-md sm:rounded-lg overflow-clip flex ">
                <div class=" w-11/12 overflow-x-auto">
                    <table
                        class=" w-full overflow-x-auto text-sm text-left  rtl:text-right text-gray-500  dark:text-gray-400">
                        <thead
                            class="text-xs text-white  bg-orange-500 dark:bg-gray-700 dark:text-gray-400 whitespace-nowrap uppercase">
                            <tr>

                                <th scope="col" class="px-6 py-3">
                                    Tanggal Input
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    IK-RT
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    IK-NRT
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nik
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tgl Lahir
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jenis Kelamin
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Alamat
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fasyankes
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr class="odd:bg-white  even:bg-orange-50 border-b capitalize">

                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        <p class="">
                                            {{ \Carbon\Carbon::parse($data->created_at)->format('Y-m-d') }}</p>
                                    </td>
                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        {!! $data->iKRumahTangga ? '&#10003;' : '-' !!}
                                    </td>
                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        {!! $data->iKNRumahTangga->isNotEmpty() ? '&#10003;' : '-' !!}
                                    </td>

                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-700  whitespace-nowrap dark:text-white uppercase">
                                        <p class="">
                                            {{ $data->nama_pasien }}</p>
                                    </td>
                                    <td scope="row" class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <p class="">
                                            {{ $data->nik_index }}</p>
                                    </td>
                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        <p class="">
                                            {{ $data->tanggal_lahir }}</p>
                                    </td>
                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        <p class="">
                                            {{ $data->jenis_kelamin }}</p>
                                    </td>
                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        <p class="">
                                            {{ $data->alamat }}</p>
                                    </td>
                                    <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                        <p class="">
                                            {{ $data->fasyankes->nama_fasyankes }}</p>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <table class="w-1/12 mb-10  text-sm text-left  rtl:text-right text-gray-500  dark:text-gray-400">
                    <thead
                        class="text-xs text-white  bg-orange-500 dark:bg-gray-700 dark:text-gray-400 whitespace-nowrap uppercase">
                        <tr>
                            <th scope="col" class="text-center py-3 ">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr class="odd:bg-white  even:bg-orange-50 border-b capitalize">
                                <td scope="row" class="px-6 py-4  whitespace-nowrap dark:text-white">
                                    <div class="flex items-center justify-around text-lg capitalize text-center gap-3">
                                        <div wire:click="detail({{ $data->id }})"
                                            class="relative before:absolute before:content-['Detail'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8  hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">
                                            <i class=" text-xl hover:text-lg ph-bold ph-eye p-0 text-blue-500 cursor-pointer  transition-all"
                                                wire:click="detail({{ $data->id }})"></i>
                                        </div>
                                        <div wire:click="edit({{ $data->id }})"
                                            class="relative before:absolute before:content-['Edit'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8  hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                            <i
                                                class="text-xl hover:text-lg ph-bold ph-pencil-simple-line text-yellow-400 p-0 cursor-pointer transition-all"></i>
                                        </div>
                                        <div wire:click="hapus({{ $data->id }})"
                                            class="relative before:absolute before:content-['Hapus'] before:shadow-md before:bg-white before:top-0 before:scale-0 before:transition-all hover:before:-top-8 hover:before:scale-100 before:opacity-0 hover:before:opacity-100 before:text-xs before:px-3 before:py-1 before:rounded  before:text-black detail-simbol h-5 w-5 flex items-center justify-center">

                                            <i
                                                class="text-xl hover:text-lg ph-bold ph-trash text-red-500 p-0 cursor-pointer transition-all"></i>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="container my-6">
                {{ $datas->links() }}
            </div>
            @if ($state == 'details')
                <livewire:index.detail-index :data="$details" />
            @endif
            @if ($state == 'edit')
                <livewire:index.edit-index :data="$edits" />
            @endif
    </div>
    {{-- @elseif($status == 'form') --}}
    <div class="{{ $status == 'form' ? '' : 'hidden' }} w-full">
        @livewire('index.form-index')
    </div>
    {{-- @endif --}}

    @script
        <script>
            $wire.on('sukses', ({
                message
            }) => {
                tampilSukses(message)
            });
            $wire.on('hapusIndex', () => {
                tampilHapus();
            });
            $wire.on('gagal', ({
                message
            }) => {
                tampilGagal(message);
            });

            const optionsIKRT = {
                series: [{
                    data: [{{ $jumlahIKRT }}, {{ $jumlahIndex - $jumlahIKRT }}]

                }],
                chart: {
                    type: 'bar',
                    events: {
                        click: function(chart, w, e) {
                            // console.log(chart, w, e)
                        }
                    },
                    height: 150,
                    toolbar: {
                        show: false,
                    }
                },

                // colors: colors,
                colors: ['#84CC16', '#EF4444'],
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
                        'Sudah', 'Belum'
                    ],
                    labels: {
                        style: {
                            // colors: colors,
                            fontSize: '10px'
                        }
                    }
                },
                yaxis: {
                    max: {{ $jumlahIKRT > $jumlahIndex - $jumlahIKRT ? $jumlahIKRT + 1 : $jumlahIndex - $jumlahIKRT + 1 }}, // Membatasi nilai maksimum pada y-axis menjadi 5
                    labels: {
                        style: {
                            fontSize: '12px'
                        }
                    }
                }

            }

            const ikrt = new ApexCharts(document.querySelector("#jumlahIKRT"),
                optionsIKRT);
            ikrt.render();

            const optionsIKNRT = {
                series: [{
                    data: [{{ $jumlahIKNRT }}, {{ $jumlahIndex - $jumlahIKRT }}]

                }],
                chart: {
                    type: 'bar',
                    events: {
                        click: function(chart, w, e) {
                            // console.log(chart, w, e)
                        }
                    },
                    height: 150,
                    toolbar: {
                        show: false,
                    }
                },

                colors: ['#fbd563', '#EF4444'],
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
                        'Sudah', 'Belum'
                    ],
                    labels: {
                        style: {
                            // colors: colors,
                            fontSize: '10px'
                        }
                    }
                },
                yaxis: {
                    max: {{ $jumlahIKNRT > $jumlahIndex - $jumlahIKRT ? $jumlahIKRT + 1 : $jumlahIndex - $jumlahIKRT + 1 }}, // Membatasi nilai maksimum pada y-axis menjadi 5
                    labels: {
                        style: {
                            fontSize: '12px'
                        }
                    }
                }
            }

            const iknrt = new ApexCharts(document.querySelector("#jumlahIKNRT"),
                optionsIKNRT);
            iknrt.render();

            const optionsTidakIK = {
                chart: {
                    type: 'donut',
                    height: 150,
                },
                colors: ['#84CC16','#EF4444'],
                series: [{{ $jumlahIndex - $belumIK }},{{ $belumIK }}],
                labels: ['Sudah', 'Belum'],
                legend: {
                    style: {
                        // colors: colors,
                        fontSize: '20px'
                    }
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '45%',
                        }
                    }
                },
                dataLabels: {
                    enabled: true,
                }

            }

            const tidakIK = new ApexCharts(document.querySelector("#belumIK"),
                optionsTidakIK);
            tidakIK.render();
        </script>
    @endscript
    <style>
        .bg-blue-700 {
            background-color: rgb(255 90 31 / var(--tw-bg-opacity)) !important
        }
    </style>
    <script></script>
</div>
