<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Index extends Model
{
    use HasFactory;

    public function iKRumahTangga(): HasOne
    {
        return $this->hasOne(IKRumahTangga::class);
    }
    
    public function iKNRumahTangga(): HasMany
    {
        return $this->hasMany(IKNRumahTangga::class);
    }
    public function fasyankes()
    {
        return $this->belongsTo(Fasyankes::class);
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
}
