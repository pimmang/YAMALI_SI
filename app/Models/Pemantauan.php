<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemantauan extends Model
{
    use HasFactory;

    public function ternotifikasi(): BelongsTo
    {
        return $this->belongsTo(Ternotifikasi::class);
    }
}
