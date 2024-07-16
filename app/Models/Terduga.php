<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Terduga extends Model
{
    use HasFactory;
    public function kontak() : BelongsTo
    {
        return $this->belongsTo(Kontak::class);
    }

    public function ternotifikasi(): HasOne
    {
        return $this->hasOne(Ternotifikasi::class);
    }
}
