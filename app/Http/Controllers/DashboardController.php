<?php

namespace App\Http\Controllers;

use App\Models\Fasyankes;
use App\Models\HasilPengobatan;
use App\Models\IKRumahTangga;
use App\Models\Index;
use App\Models\Kader;
use App\Models\Kontak;
use App\Models\Ssr;
use App\Models\Terduga;
use Carbon\Carbon;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->hasRole("ssr")) {
            $url = route('filterDashboard', [
                'ssr' => Auth::user()->name,
                'tahun' => 'semua',
            ]);
            return redirect($url);
        }
        $ssrPilihan = 'semua';
        $tahun = 'semua';
        $status = 'dashboard';
        $jumlahTerduga = Terduga::count();

        $jumlahPositif = Terduga::where(function ($query) {
            $query->where('tipe_pemeriksaan', 'BTA +')
                ->orwhere('tipe_pemeriksaan', 'CXR +')
                ->orwhere('tipe_pemeriksaan', 'Extra Paru')
                ->orwhere('tipe_pemeriksaan', 'Rontgen +')
                ->orwhere('tipe_pemeriksaan', 'TCM +');
        })->count();

        $jumlahNegatif = $jumlahTerduga - $jumlahPositif;
        $jumlahDiperiksaLaki = Terduga::whereHas('kontak', function ($query) {
            $query->where('jenis_kelamin', 'laki-laki');
        })->count();
        $jumlahDiperiksaPerempuan = $jumlahTerduga - $jumlahDiperiksaLaki;
        $jumlahBergejala = Kontak::where(function ($query) {
            $query->where('batuk', 1)
                ->orwhere('sesak_napas', 1)
                ->orwhere('keringat_malam', 1)
                ->orwhere('dm', 1);
        })->count();

        $jumlahDikunjungi = Kontak::where('kunjungan', 1)->count();
        $jumlahDirujuk = Kontak::where('rujukan', 1)->count();
        $jumlahKader = Kader::count();
        $jumlahFasyankes = Fasyankes::count();

        // status pengobatan
        $jumlahSembuh = HasilPengobatan::where('hasil_pengobatan', 'Sembuh')->count();
        $jumlahMeninggal = HasilPengobatan::where('hasil_pengobatan', 'Meninggal')->count();
        $jumlahPindah = HasilPengobatan::where('hasil_pengobatan', 'Pindah')->count();
        $jumlahLengkap = HasilPengobatan::where('hasil_pengobatan', 'Lengkap')->count();
        $jumlahGagal = HasilPengobatan::where('hasil_pengobatan', 'Gagal')->count();
        $jumlahBelumMulai = HasilPengobatan::where('hasil_pengobatan', 'Belum Mulai Pengobatan')->count();
        $jumlahProses = HasilPengobatan::where('hasil_pengobatan', 'Proses Pengobatan')->count();

        // kinerja fasyankes
        $ssrs = Ssr::get();
        $namaFasyankes = [];
        $jumlahRawat = [];
        $namaKader = [];
        // kinerja kader
        $jumlahDirujukKader = [];
        $jumlahPositifKader = [];
        // $jumlahDiperiksaKader = [];
        $jumlahSembuhKader = [];

        foreach ($ssrs as $ssr) {
            $namaFasyankes[] = $ssr->nama;
            $namaKader[] = $ssr->nama;

            $jumlahRawat[] = Kontak::where(function ($query) use ($ssr) {
                $query->whereHas('iKRumahTangga', function ($query) use ($ssr) {
                    $query->whereHas('index', function ($query) use ($ssr) {
                        $query->where('ssr_id', $ssr->id);
                    });
                })
                    ->orWhereHas('iKNRumahTangga', function ($query) use ($ssr) {
                        $query->whereHas('index', function ($query) use ($ssr) {
                            $query->where('ssr_id', $ssr->id);
                        });
                    });
            })->where('terduga', 1)->count();

            $jumlahDirujukKader[] = Kontak::where(function ($query) use ($ssr) {
                $query->whereHas('iKRumahTangga', function ($query) use ($ssr) {
                    $query->whereHas('index', function ($query) use ($ssr) {
                        $query->where('ssr_id', $ssr->id);
                    });
                })
                    ->orWhereHas('iKNRumahTangga', function ($query) use ($ssr) {
                        $query->whereHas('index', function ($query) use ($ssr) {
                            $query->where('ssr_id', $ssr->id);
                        });
                    });
            })->where('rujukan', 1)->count();

            $jumlahPositifKader[] = Kontak::where(function ($query) use ($ssr) {
                $query->whereHas('iKRumahTangga', function ($query) use ($ssr) {
                    $query->whereHas('index', function ($query) use ($ssr) {
                        $query->where('ssr_id', $ssr->id);
                    });
                })
                    ->orWhereHas('iKNRumahTangga', function ($query) use ($ssr) {
                        $query->whereHas('index', function ($query) use ($ssr) {
                            $query->where('ssr_id', $ssr->id);
                        });
                    });
            })->whereHas('terduga', function ($query) {
                $query->whereHas('ternotifikasi');
            })->count();

            $jumlahSembuhKader[] = Kontak::where(function ($query) use ($ssr) {
                $query->whereHas('iKRumahTangga', function ($query) use ($ssr) {
                    $query->whereHas('index', function ($query) use ($ssr) {
                        $query->where('ssr_id', $ssr->id);
                    });
                })
                    ->orWhereHas('iKNRumahTangga', function ($query) use ($ssr) {
                        $query->whereHas('index', function ($query) use ($ssr) {
                            $query->where('ssr_id', $ssr->id);
                        });
                    });
            })->whereHas('terduga', function ($query) {
                $query->whereHas('ternotifikasi', function ($query) {
                    $query->whereHas('hasilPengobatan', function ($query) {
                        $query->where('hasil_pengobatan', 'Sembuh');
                    });
                });
            })->count();
        }

        // $jumlahDiperiksaKader = $jumlahRawat;

        $jumlahIndex = Index::count();
        $jumlahIkrt = Index::whereHas('iKRumahTangga')->count();
        $jumlahIknrt = Index::whereHas('iKNRumahTangga')->count();
        $jumlahBelumIk = Index::doesntHave('iKRumahTangga')->doesntHave('iKNRumahTangga')->count();

        // temuan kasus perbulan

        for ($i = 1; $i <= 12; ++$i) {
            $temuanPositif[$i - 1] = Terduga::whereYear('created_at', date('Y'))->whereMonth('created_at', $i)->where(function ($query) {
                $query->where('tipe_pemeriksaan', 'BTA +')
                    ->orwhere('tipe_pemeriksaan', 'CXR +')
                    ->orwhere('tipe_pemeriksaan', 'Extra Paru')
                    ->orwhere('tipe_pemeriksaan', 'Rontgen +')
                    ->orwhere('tipe_pemeriksaan', 'TCM +');
            })->count();
            $temuanNegatif[$i - 1] = Terduga::whereYear('created_at', date('Y'))->whereMonth('created_at', $i)->where(function ($query) {
                $query->where('tipe_pemeriksaan', 'BTA -')
                    ->orwhere('tipe_pemeriksaan', 'CXR -')
                    // ->orwhere('tipe_pemeriksaan', 'Extra Paru')
                    ->orwhere('tipe_pemeriksaan', 'Rontgen -')
                    ->orwhere('tipe_pemeriksaan', 'TCM -');
            })->count();

            $temuanBergejala[$i - 1] = Kontak::whereYear('created_at', date('Y'))->whereMonth('created_at', $i)->where(function ($query) {
                $query->where('batuk', 1)->orwhere('sesak_napas', 1)->orwhere('keringat_malam', 1)->orwhere('dm', 1);
            })->count();
        }

        return view('dashboard', compact('status', 'tahun', 'jumlahFasyankes', 'temuanPositif', 'temuanNegatif', 'temuanBergejala', 'jumlahIndex', 'jumlahIkrt', 'jumlahIknrt', 'jumlahBelumIk', 'jumlahDirujukKader', 'jumlahPositifKader', 'jumlahSembuhKader', 'namaKader', 'namaFasyankes', 'jumlahRawat', 'ssrPilihan', 'jumlahTerduga', 'jumlahNegatif', 'jumlahPositif', 'jumlahDiperiksaLaki', 'jumlahDiperiksaPerempuan', 'jumlahBergejala', 'jumlahDikunjungi', 'jumlahDirujuk', 'jumlahKader', 'jumlahSembuh', 'jumlahMeninggal', 'jumlahPindah', 'jumlahGagal', 'jumlahLengkap', 'jumlahBelumMulai', 'jumlahProses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function filter(Request $request)
    {
        // dd($request);

    if (Auth::user()->name != $request->query('ssr')) {
            if (Auth::user()->hasRole('ssr')) {
                abort(403, 'Unauthorized action.');
            }
        }

        if ($request->query('ssr') != 'semua') {
            $ssr = Ssr::where('nama', $request->query('ssr'))->first();
            $ssrPilihan = $ssr->id;
        } else {
            $ssrPilihan = $request->query('ssr');
        }

        $tahun = $request->query('tahun');


        $status = 'dashboard';
        $jumlahTerduga = Terduga::whereHas('kontak', function ($query) use ($ssrPilihan) {
            $query->where(function ($query) use ($ssrPilihan) {
                $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                })->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                });
            });
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();

        $jumlahPositif = Terduga::whereHas('kontak', function ($query) use ($ssrPilihan) {
            $query->where(function ($query) use ($ssrPilihan) {
                $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                })->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                });
            });
        })->where(function ($query) {
            $query->where('tipe_pemeriksaan', 'BTA +')
                ->orwhere('tipe_pemeriksaan', 'CXR +')
                ->orwhere('tipe_pemeriksaan', 'Extra Paru')
                ->orwhere('tipe_pemeriksaan', 'Rontgen +')
                ->orwhere('tipe_pemeriksaan', 'TCM +');
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();

        $jumlahNegatif = $jumlahTerduga - $jumlahPositif;

        $jumlahDiperiksaLaki = Terduga::whereHas('kontak', function ($query) use ($ssrPilihan) {
            $query->where('jenis_kelamin', 'laki-laki')
                ->where(function ($query) use ($ssrPilihan) {
                    $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                        $query->whereHas('index', function ($query) use ($ssrPilihan) {
                            $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                                $query->where('ssr_id', $ssrPilihan);
                            });
                        });
                    })->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                        $query->whereHas('index', function ($query) use ($ssrPilihan) {
                            $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                                $query->where('ssr_id', $ssrPilihan);
                            });
                        });
                    });
                });
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();

        $jumlahDiperiksaPerempuan = $jumlahTerduga - $jumlahDiperiksaLaki;

        $jumlahBergejala = Kontak::where(function ($query) {
            $query->where('batuk', 1)->orwhere('sesak_napas', 1)->orwhere('keringat_malam', 1)->orwhere('dm', 1);
        })->where(function ($query) use ($ssrPilihan) {
            $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                $query->whereHas('index', function ($query) use ($ssrPilihan) {
                    $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                        $query->where('ssr_id', $ssrPilihan);
                    });
                });
            })
                ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                });
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();

        $jumlahDikunjungi = Kontak::where('kunjungan', 1)->where(function ($query) use ($ssrPilihan) {
            $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                $query->whereHas('index', function ($query) use ($ssrPilihan) {
                    $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                        $query->where('ssr_id', $ssrPilihan);
                    });
                });
            })
                ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                });
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();

        $jumlahDirujuk = Kontak::where('rujukan', 1)->where(function ($query) use ($ssrPilihan) {
            $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                $query->whereHas('index', function ($query) use ($ssrPilihan) {
                    $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                        $query->where('ssr_id', $ssrPilihan);
                    });
                });
            })
                ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                });
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();

        $jumlahKader = Kader::when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
            $query->where('ssr_id', $ssrPilihan);
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();

        $jumlahFasyankes = Fasyankes::when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
            $query->where('ssr_id', $ssrPilihan);
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();;

        // status pengobatan
        $jumlahSembuh = Kontak::where(function ($query) use ($ssrPilihan) {
            $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                $query->whereHas('index', function ($query) use ($ssrPilihan) {
                    $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                        $query->where('ssr_id', $ssrPilihan);
                    });
                });
            })
                ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                });
        })->whereHas('terduga', function ($query) {
            $query->whereHas('ternotifikasi', function ($query) {
                $query->whereHas('hasilPengobatan', function ($query) {
                    $query->where('hasil_pengobatan', 'Sembuh');
                });
            });
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();

        $jumlahMeninggal = Kontak::where(function ($query) use ($ssrPilihan) {
            $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                $query->whereHas('index', function ($query) use ($ssrPilihan) {
                    $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                        $query->where('ssr_id', $ssrPilihan);
                    });
                });
            })
                ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                });
        })->whereHas('terduga', function ($query) {
            $query->whereHas('ternotifikasi', function ($query) {
                $query->whereHas('hasilPengobatan', function ($query) {
                    $query->where('hasil_pengobatan', 'Meninggal');
                });
            });
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();
        $jumlahPindah = Kontak::where(function ($query) use ($ssrPilihan) {
            $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                $query->whereHas('index', function ($query) use ($ssrPilihan) {
                    $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                        $query->where('ssr_id', $ssrPilihan);
                    });
                });
            })
                ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                });
        })->whereHas('terduga', function ($query) {
            $query->whereHas('ternotifikasi', function ($query) {
                $query->whereHas('hasilPengobatan', function ($query) {
                    $query->where('hasil_pengobatan', 'Pindah');
                });
            });
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();
        $jumlahLengkap = Kontak::where(function ($query) use ($ssrPilihan) {
            $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                $query->whereHas('index', function ($query) use ($ssrPilihan) {
                    $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                        $query->where('ssr_id', $ssrPilihan);
                    });
                });
            })
                ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                });
        })->whereHas('terduga', function ($query) {
            $query->whereHas('ternotifikasi', function ($query) {
                $query->whereHas('hasilPengobatan', function ($query) {
                    $query->where('hasil_pengobatan', 'Lengkap');
                });
            });
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();
        $jumlahGagal = Kontak::where(function ($query) use ($ssrPilihan) {
            $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                $query->whereHas('index', function ($query) use ($ssrPilihan) {
                    $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                        $query->where('ssr_id', $ssrPilihan);
                    });
                });
            })
                ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                });
        })->whereHas('terduga', function ($query) {
            $query->whereHas('ternotifikasi', function ($query) {
                $query->whereHas('hasilPengobatan', function ($query) {
                    $query->where('hasil_pengobatan', 'Gagal');
                });
            });
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();
        $jumlahBelumMulai = Kontak::where(function ($query) use ($ssrPilihan) {
            $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                $query->whereHas('index', function ($query) use ($ssrPilihan) {
                    $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                        $query->where('ssr_id', $ssrPilihan);
                    });
                });
            })
                ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                });
        })->whereHas('terduga', function ($query) {
            $query->whereHas('ternotifikasi', function ($query) {
                $query->whereHas('hasilPengobatan', function ($query) {
                    $query->where('hasil_pengobatan', 'Belum Mulai Pengobatan');
                });
            });
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();
        $jumlahProses = Kontak::where(function ($query) use ($ssrPilihan) {
            $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                $query->whereHas('index', function ($query) use ($ssrPilihan) {
                    $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                        $query->where('ssr_id', $ssrPilihan);
                    });
                });
            })
                ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                });
        })->whereHas('terduga', function ($query) {
            $query->whereHas('ternotifikasi', function ($query) {
                $query->whereHas('hasilPengobatan', function ($query) {
                    $query->where('hasil_pengobatan', 'Proses Pengobatan');
                });
            });
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();

        $namaFasyankes = [];
        $jumlahRawat = [];

        $namaKader = [];

        $jumlahDirujukKader = [];
        $jumlahPositifKader = [];
        // $jumlahDiperiksaKader = [];
        $jumlahSembuhKader = [];

        if ($ssrPilihan == 'semua') {
            // kinerja fasyankes
            $ssrs = Ssr::get();
            foreach ($ssrs as $ssr) {
                $namaFasyankes[] = $ssr->nama;
                $namaKader[] = $ssr->nama;

                $jumlahRawat[] = Kontak::where(function ($query) use ($ssr) {
                    $query->whereHas('iKRumahTangga', function ($query) use ($ssr) {
                        $query->whereHas('index', function ($query) use ($ssr) {
                            $query->where('ssr_id', $ssr->id);
                        });
                    })
                        ->orWhereHas('iKNRumahTangga', function ($query) use ($ssr) {
                            $query->whereHas('index', function ($query) use ($ssr) {
                                $query->where('ssr_id', $ssr->id);
                            });
                        });
                })->where('terduga', 1)->when($tahun != 'semua', function ($query) use ($tahun) {
                    $query->whereYear('created_at', $tahun);
                })->count();

                $jumlahDirujukKader[] = Kontak::where(function ($query) use ($ssr) {
                    $query->whereHas('iKRumahTangga', function ($query) use ($ssr) {
                        $query->whereHas('index', function ($query) use ($ssr) {
                            $query->where('ssr_id', $ssr->id);
                        });
                    })
                        ->orWhereHas('iKNRumahTangga', function ($query) use ($ssr) {
                            $query->whereHas('index', function ($query) use ($ssr) {
                                $query->where('ssr_id', $ssr->id);
                            });
                        });
                })->where('rujukan', 1)->when($tahun != 'semua', function ($query) use ($tahun) {
                    $query->whereYear('created_at', $tahun);
                })->count();

                $jumlahPositifKader[] = Kontak::where(function ($query) use ($ssr) {
                    $query->whereHas('iKRumahTangga', function ($query) use ($ssr) {
                        $query->whereHas('index', function ($query) use ($ssr) {
                            $query->where('ssr_id', $ssr->id);
                        });
                    })
                        ->orWhereHas('iKNRumahTangga', function ($query) use ($ssr) {
                            $query->whereHas('index', function ($query) use ($ssr) {
                                $query->where('ssr_id', $ssr->id);
                            });
                        });
                })->whereHas('terduga', function ($query) {
                    $query->whereHas('ternotifikasi');
                })->when($tahun != 'semua', function ($query) use ($tahun) {
                    $query->whereYear('created_at', $tahun);
                })->count();

                $jumlahSembuhKader[] = Kontak::where(function ($query) use ($ssr) {
                    $query->whereHas('iKRumahTangga', function ($query) use ($ssr) {
                        $query->whereHas('index', function ($query) use ($ssr) {
                            $query->where('ssr_id', $ssr->id);
                        });
                    })
                        ->orWhereHas('iKNRumahTangga', function ($query) use ($ssr) {
                            $query->whereHas('index', function ($query) use ($ssr) {
                                $query->where('ssr_id', $ssr->id);
                            });
                        });
                })->whereHas('terduga', function ($query) {
                    $query->whereHas('ternotifikasi', function ($query) {
                        $query->whereHas('hasilPengobatan', function ($query) {
                            $query->where('hasil_pengobatan', 'Sembuh');
                        });
                    });
                })->when($tahun != 'semua', function ($query) use ($tahun) {
                    $query->whereYear('created_at', $tahun);
                })->count();
            }
            // $jumlahDiperiksaKader = $jumlahRawat;
        } else {

            $fasyankes = Fasyankes::where('ssr_id', $ssrPilihan)->get();
            foreach ($fasyankes as $fasyan) {
                $namaFasyankes[] = $fasyan->nama_fasyankes;
                $jumlahRawat[] = Kontak::where(function ($query) use ($ssrPilihan, $fasyan) {
                    $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan, $fasyan) {
                        $query->whereHas('index', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        })->where('fasyankes_id',  $fasyan->id);
                    })
                        ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan, $fasyan) {
                            $query->whereHas('index', function ($query) use ($ssrPilihan) {
                                $query->where('ssr_id', $ssrPilihan);
                            })->where('fasyankes_id',  $fasyan->id);
                        });
                })->where('terduga', 1)
                    ->when($tahun != 'semua', function ($query) use ($tahun) {
                        $query->whereYear('created_at', $tahun);
                    })->count();
            }
            $kaders = Kader::when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                $query->where('ssr_id', $ssrPilihan);
            })->get();

            foreach ($kaders as $kader) {
                $namaKader[] = $kader->nama;

                $jumlahDirujukKader[] = Kontak::where(function ($query) use ($ssrPilihan, $kader) {
                    $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan, $kader) {
                        $query->whereHas('index', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        })->where('kader_id', $kader->id);
                    })
                        ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan, $kader) {
                            $query->whereHas('index', function ($query) use ($ssrPilihan) {
                                $query->where('ssr_id', $ssrPilihan);
                            })->where('kader_id', $kader->id);
                        });
                })->where('rujukan', 1)
                    ->when($tahun != 'semua', function ($query) use ($tahun) {
                        $query->whereYear('created_at', $tahun);
                    })->count();
                $jumlahPositifKader[] = Kontak::where(function ($query) use ($ssrPilihan, $kader) {
                    $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan, $kader) {
                        $query->whereHas('index', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        })->where('kader_id', $kader->id);
                    })
                        ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan, $kader) {
                            $query->whereHas('index', function ($query) use ($ssrPilihan) {
                                $query->where('ssr_id', $ssrPilihan);
                            })->where('kader_id', $kader->id);
                        });
                })->whereHas('terduga', function ($query) {
                    $query->whereHas('ternotifikasi');
                })->when($tahun != 'semua', function ($query) use ($tahun) {
                    $query->whereYear('created_at', $tahun);
                })->count();

                // $jumlahDiperiksaKader[] = Kontak::where(function ($query) use ($ssrPilihan, $kader) {
                //     $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan, $kader) {
                //         $query->whereHas('index', function ($query) use ($ssrPilihan) {
                //             $query->where('ssr_id', $ssrPilihan);
                //         })->where('kader_id', $kader->id);
                //     })
                //         ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan, $kader) {
                //             $query->whereHas('index', function ($query) use ($ssrPilihan) {
                //                 $query->where('ssr_id', $ssrPilihan);
                //             })->where('kader_id', $kader->id);
                //         });
                // })->where('terduga', 1)
                //     ->when($tahun != 'semua', function ($query) use ($tahun) {
                //         $query->whereYear('created_at', $tahun);
                //     })->count();

                $jumlahSembuhKader[] = Kontak::where(function ($query) use ($ssrPilihan, $kader) {
                    $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan, $kader) {
                        $query->whereHas('index', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        })->where('kader_id', $kader->id);
                    })
                        ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan, $kader) {
                            $query->whereHas('index', function ($query) use ($ssrPilihan) {
                                $query->where('ssr_id', $ssrPilihan);
                            })->where('kader_id', $kader->id);
                        });
                })->whereHas('terduga', function ($query) {
                    $query->whereHas('ternotifikasi', function ($query) {
                        $query->whereHas('hasilPengobatan', function ($query) {
                            $query->where('hasil_pengobatan', 'Sembuh');
                        });
                    });
                })->when($tahun != 'semua', function ($query) use ($tahun) {
                    $query->whereYear('created_at', $tahun);
                })->count();
            }
        }





        $jumlahIndex = Index::when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
            $query->where('ssr_id', $ssrPilihan);
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->count();
        $jumlahIkrt = Index::when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
            $query->where('ssr_id', $ssrPilihan);
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->whereHas('iKRumahTangga')->count();
        $jumlahIknrt = Index::when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
            $query->where('ssr_id', $ssrPilihan);
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->whereHas('iKNRumahTangga')->count();
        $jumlahBelumIk = Index::when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
            $query->where('ssr_id', $ssrPilihan);
        })->when($tahun != 'semua', function ($query) use ($tahun) {
            $query->whereYear('created_at', $tahun);
        })->doesntHave('iKRumahTangga')->doesntHave('iKNRumahTangga')->count();

        // temuan kasus perbulan

        for ($i = 1; $i <= 12; ++$i) {
            $temuanPositif[$i - 1] = Terduga::whereHas('kontak', function ($query) use ($ssrPilihan) {
                $query->where(function ($query) use ($ssrPilihan) {
                    $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                        $query->whereHas('index', function ($query) use ($ssrPilihan) {
                            $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                                $query->where('ssr_id', $ssrPilihan);
                            });
                        });
                    })
                        ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                            $query->whereHas('index', function ($query) use ($ssrPilihan) {
                                $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                                    $query->where('ssr_id', $ssrPilihan);
                                });
                            });
                        });
                });
            })->whereYear('created_at', date('Y'))->whereMonth('created_at', $i)->where(function ($query) {
                $query->where('tipe_pemeriksaan', 'BTA +')
                    ->orwhere('tipe_pemeriksaan', 'CXR +')
                    ->orwhere('tipe_pemeriksaan', 'Extra Paru')
                    ->orwhere('tipe_pemeriksaan', 'Rontgen +')
                    ->orwhere('tipe_pemeriksaan', 'TCM +');
            })->when($tahun != 'semua', function ($query) use ($tahun) {
                $query->whereYear('created_at', $tahun);
            })->count();
            $temuanNegatif[$i - 1] = Terduga::whereHas('kontak', function ($query) use ($ssrPilihan) {
                $query->where(function ($query) use ($ssrPilihan) {
                    $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                        $query->whereHas('index', function ($query) use ($ssrPilihan) {
                            $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                                $query->where('ssr_id', $ssrPilihan);
                            });
                        });
                    })
                        ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                            $query->whereHas('index', function ($query) use ($ssrPilihan) {
                                $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                                    $query->where('ssr_id', $ssrPilihan);
                                });
                            });
                        });
                });
            })->whereYear('created_at', date('Y'))->whereMonth('created_at', $i)->where(function ($query) {
                $query->where('tipe_pemeriksaan', 'BTA -')
                    ->orwhere('tipe_pemeriksaan', 'CXR -')
                    // ->orwhere('tipe_pemeriksaan', 'Extra Paru')
                    ->orwhere('tipe_pemeriksaan', 'Rontgen -')
                    ->orwhere('tipe_pemeriksaan', 'TCM -');
            })->when($tahun != 'semua', function ($query) use ($tahun) {
                $query->whereYear('created_at', $tahun);
            })->count();

            $temuanBergejala[$i - 1] = Kontak::where(function ($query) use ($ssrPilihan) {
                $query->whereHas('iKRumahTangga', function ($query) use ($ssrPilihan) {
                    $query->whereHas('index', function ($query) use ($ssrPilihan) {
                        $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                            $query->where('ssr_id', $ssrPilihan);
                        });
                    });
                })
                    ->orWhereHas('iKNRumahTangga', function ($query) use ($ssrPilihan) {
                        $query->whereHas('index', function ($query) use ($ssrPilihan) {
                            $query->when($ssrPilihan != 'semua', function ($query) use ($ssrPilihan) {
                                $query->where('ssr_id', $ssrPilihan);
                            });
                        });
                    });
            })->whereYear('created_at', date('Y'))->whereMonth('created_at', $i)->where(function ($query) {
                $query->where('batuk', 1)->orwhere('sesak_napas', 1)->orwhere('keringat_malam', 1)->orwhere('dm', 1);
            })->when($tahun != 'semua', function ($query) use ($tahun) {
                $query->whereYear('created_at', $tahun);
            })->count();
        }

        return view('dashboard', compact('status', 'tahun', 'jumlahFasyankes', 'temuanPositif', 'temuanNegatif', 'temuanBergejala', 'jumlahIndex', 'jumlahIkrt', 'jumlahIknrt', 'jumlahBelumIk', 'jumlahDirujukKader', 'jumlahPositifKader', 'jumlahSembuhKader',  'namaKader', 'namaFasyankes', 'jumlahRawat', 'ssrPilihan', 'jumlahTerduga', 'jumlahNegatif', 'jumlahPositif', 'jumlahDiperiksaLaki', 'jumlahDiperiksaPerempuan', 'jumlahBergejala', 'jumlahDikunjungi', 'jumlahDirujuk', 'jumlahKader', 'jumlahSembuh', 'jumlahMeninggal', 'jumlahPindah', 'jumlahGagal', 'jumlahLengkap', 'jumlahBelumMulai', 'jumlahProses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
