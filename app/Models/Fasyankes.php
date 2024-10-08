<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fasyankes extends Model
{
    use HasFactory;

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
    public function iKRumahTangga(): HasMany
    {
        return $this->hasMany(IKRumahTangga::class);
    }
    public function iKNRumahTangga(): HasMany
    {
        return $this->hasMany(IKNRumahTangga::class);
    }
    public function kontak(): HasMany
    {
        return $this->hasMany(Kontak::class);
    }

    public function index(): HasMany
    {
        return $this->hasMany(Index::class);
    }
}
