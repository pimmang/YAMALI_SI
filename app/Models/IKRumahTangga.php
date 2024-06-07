<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IKRumahTangga extends Model
{
    
    use HasFactory;

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    public function kader()
    {
        return $this->belongsTo(Kader::class);
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
