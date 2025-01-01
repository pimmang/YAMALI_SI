<?php

namespace App\Livewire\Index;

use App\Models\IKRumahTangga;
use App\Models\Index;
use App\Models\Kontak;
use Livewire\Component;
use Livewire\Attributes\On;

use function PHPUnit\Framework\isEmpty;

class HubunganKontak extends Component
{

    public $nodes;
    public $links;

    #[On('hubungan')]
    public function cek($id)
    {
        // this->nodes = ''

        $nodeUtama = Index::where('id', $id)->first();
        // Ambil data pasien (index) sebagai nodes
        $KoleksiNodeUtama = Index::where('id', $id)
            ->get()
            ->map(function ($index) {
                return [
                    'id' => $index->nik_index,
                    'label' => $index->nama_pasien,
                    'type' => 'indexUtama', // Menandakan bahwa ini adalah node untuk pasien
                ];
            });

        $this->nodes = $KoleksiNodeUtama;



        // dd($indexSebelumnya);
        $this->links = Kontak::where(function ($query) use ($nodeUtama) {
            $query->whereHas('iKRumahTangga.index', function ($query) use ($nodeUtama) {
                $query->where('id', $nodeUtama->id); // Filter berdasarkan index_id
            })
                ->orWhereHas('iKNRumahTangga.index', function ($query) use ($nodeUtama) {
                    $query->where('id',  $nodeUtama->id); // Filter berdasarkan index_id
                });
        })
            ->get()
            ->map(function ($kontak) {
                // Ambil source dari index yang terkait
                $source = null;

                // Jika iKRumahTangga ada, ambil source dari index yang terkait
                if ($kontak->iKRumahTangga) {
                    $source = $kontak->iKRumahTangga->index->nik_index; // Ambil id dari index yang terkait
                }
                // Jika iKNRumahTangga ada, ambil source dari index yang terkait
                elseif ($kontak->iKNRumahTangga) {
                    $source = $kontak->iKNRumahTangga->index->nik_index; // Ambil id dari index yang terkait
                }

                return [
                    'source' => $source, // source diambil dari index
                    'target' => $kontak->nik_kontak // Kontak menjadi target
                ];
            });




        // Ambil data kontak sebagai nodes dan hubungkan dengan pasien
        $kontaks = Kontak::where(function ($query) use ($nodeUtama) {
            $query->whereHas('iKRumahTangga.index', function ($query)  use ($nodeUtama) {
                $query->where('id', $nodeUtama->id); // Filter berdasarkan index_id
            })
                ->orWhereHas('iKNRumahTangga.index', function ($query)  use ($nodeUtama) {
                    $query->where('id', $nodeUtama->id); // Filter berdasarkan index_id
                });
        })
            ->get()
            ->map(function ($kontak) {
                return [
                    'id' => $kontak->nik_kontak, // Kontak menjadi node
                    'label' => $kontak->nama,
                    'type' => 'kontak', // Menandakan bahwa ini adalah node untuk kontak
                ];
            });

        // Gabungkan nodes pasien dan kontak
        $this->nodes = $this->nodes->merge($kontaks);
        // dd($indexSebelumnya);


        for ($i = 0; $i < 5; $i++) {
            $indexSebelumnya = Kontak::whereIn('nik_kontak', $KoleksiNodeUtama->pluck('id')) // Ambil kontak berdasarkan nik_kontak
                ->get()
                ->map(function ($kontak) {
                    $indexId = null;
                    if ($kontak->iKNRumahTangga && $kontak->iKNRumahTangga->index) {
                        // Ambil ID dari index yang terkait dengan iKNRumahTangga
                        $indexId = $kontak->iKNRumahTangga->index->nik_index;
                        $indexNama = $kontak->iKNRumahTangga->index->nama_pasien;
                    }
                    if ($kontak->iKRumahTangga && $kontak->iKRumahTangga->index) {
                        // Ambil ID dari index yang terkait dengan iKNRumahTangga
                        $indexId = $kontak->iKRumahTangga->index->nik_index;
                        $indexNama = $kontak->iKRumahTangga->index->nama_pasien;
                    }


                    return [
                        'id' => $indexId,
                        'label' => $indexNama,
                        'type' => 'index', // Menandakan bahwa ini adalah node untuk kontak
                    ];
                });
            // dd($indexSebelumnya);
            $indexSebelumnya->each(function ($node) {
                if (!$this->nodes->contains('id', $node['id'])) {
                    $this->nodes->push($node); // Tambahkan node ke $this->nodes jika belum ada
                }
            });

            $linkIndexSebelumnya = $indexSebelumnya->map(function ($index) use ($nodeUtama) {
                return [
                    'source' => $nodeUtama->nik_index, // Menghubungkan dengan node utama (index)
                    'target' => $index['id'],  // Menghubungkan ke kontak
                ];
            });

            $this->links = $this->links->merge($linkIndexSebelumnya);
            $indexIdSebelumnya = null;
            if (!$indexSebelumnya->isEmpty()) {
                foreach ($indexSebelumnya as $index) {
                    $indexIdSebelumnya = $index['id']; // Akses id dari setiap item
                    // Lakukan operasi lainnya di sini
                }
                $kontaksIndexSebelumnya = Kontak::where(function ($query) use ($indexIdSebelumnya) {
                    $query->whereHas('iKRumahTangga.index', function ($query) use ($indexIdSebelumnya) {
                        $query->where('nik_index', $indexIdSebelumnya); // Filter berdasarkan index_id
                    })
                        ->orWhereHas('iKNRumahTangga.index', function ($query) use ($indexIdSebelumnya) {
                            $query->where('nik_index', $indexIdSebelumnya); // Filter berdasarkan index_id
                        });
                })
                    ->get()
                    ->map(function ($kontak) use ($nodeUtama) {
                        if ($kontak->nik_kontak != $nodeUtama->nik_index) {
                            return [
                                'id' => $kontak->nik_kontak, // Kontak menjadi node
                                'label' => $kontak->nama,
                                'type' => 'kontak', // Menandakan bahwa ini adalah node untuk kontak
                            ];
                        }
                        return null;
                    })->filter();
                $this->nodes = $this->nodes->merge($kontaksIndexSebelumnya);
                $linksKontakSebelumnnya = Kontak::where(function ($query) use ($indexIdSebelumnya) {
                    $query->whereHas('iKRumahTangga.index', function ($query) use ($indexIdSebelumnya) {
                        $query->where('nik_index', $indexIdSebelumnya); // Filter berdasarkan index_id
                    })
                        ->orWhereHas('iKNRumahTangga.index', function ($query) use ($indexIdSebelumnya) {
                            $query->where('nik_index',  $indexIdSebelumnya); // Filter berdasarkan index_id
                        });
                })
                    ->get()
                    ->map(function ($kontak) {
                        // Ambil source dari index yang terkait
                        $source = null;

                        // Jika iKRumahTangga ada, ambil source dari index yang terkait
                        if ($kontak->iKRumahTangga) {
                            $source = $kontak->iKRumahTangga->index->nik_index; // Ambil id dari index yang terkait
                        }
                        // Jika iKNRumahTangga ada, ambil source dari index yang terkait
                        elseif ($kontak->iKNRumahTangga) {
                            $source = $kontak->iKNRumahTangga->index->nik_index; // Ambil id dari index yang terkait
                        }

                        return [
                            'source' => $source, // source diambil dari index
                            'target' => $kontak->nik_kontak // Kontak menjadi target
                        ];
                    });

                $this->links = $this->links->merge($linksKontakSebelumnnya);
            }
            $nodeUtama = Index::where('nik_index', $indexIdSebelumnya)->first();
            // Ambil data pasien (index) sebagai nodes
            $KoleksiNodeUtama = Index::where('nik_index', $indexIdSebelumnya)
                ->get()
                ->map(function ($index) {
                    return [
                        'id' => $index->nik_index,
                        'label' => $index->nama_pasien,
                        'type' => 'indexUtama', // Menandakan bahwa ini adalah node untuk pasien
                    ];
                });
            // dd($nodeUtama);
        }

        // Pastikan nodes adalah koleksi
        // $this->nodes = collect($this->nodes);

        // // Hapus duplikasi berdasarkan ID
        // $this->nodes = $this->nodes->unique('id');

        // // Filter nodes dengan koneksi
        // $this->nodes = $this->nodes->filter(function ($node) {
        //     $isConnected = $this->links->contains('source', $node['id']) ||
        //         $this->links->contains('target', $node['id']);
        //     return $isConnected;
        // });

        // // Jika diperlukan sebagai array
        // // $this->nodes = $this->nodes->toArray();
        // dd($this->nodes);
        // $nodeBaru = $this->nodes->unique('id');
        // dd($this->nodes, $nodeBaru);
        // dd($this->nodes);
        $this->dispatch('tampilGrafik', nodes: $this->nodes, links: $this->links);
        // $this->dispatch('sukses', message: 'Data Index berhasil dihapus');
    }
    public function close()
    {
        // dd('tutup');
        $this->dispatch('close')->to(ListIndex::class);
    }
    public function render()
    {
        return view('livewire.index.hubungan-kontak');
    }
}
