<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kader extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nik',
        'nomor_telepon',
        'umur',
        'jenis_kelamin',
        'provinsi',
        'kota/kabupaten',
        'kecamatan',
        'sr',
        'ssr',
        'jenis',
        'status',
    ];
}
