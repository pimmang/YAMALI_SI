<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ternotifikasi extends Model
{
    use HasFactory;
    public function terduga(): BelongsTo
    {
        return $this->belongsTo(Terduga::class);
    }
    public function kader(): BelongsTo
    {
        return $this->belongsTo(Kader::class);
    }
    public function hasilPengobatan(): HasOne
    {
        return $this->hasone(HasilPengobatan::class);
    }
}
