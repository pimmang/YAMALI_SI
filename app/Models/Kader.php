<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kader extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nik',
        'nomor_telepon',
        'umur',
        'jenis_kelamin',
        'province_id',
        'regency_id',
        'district_id',
        'sr',
        'ssr_id',
        'jenis',
        'status',
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function ssr()
    {
        return $this->belongsTo(Ssr::class);
    }
    public function ikrumahtangga(): HasMany
    {
        return $this->hasMany(IKRumahTangga::class);
    }
    public function kontak(): HasMany
    {
        return $this->hasMany(Kontak::class);
    }
}
