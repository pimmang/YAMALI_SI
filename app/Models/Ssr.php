<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ssr extends Model
{
    use HasFactory;
    public function kaders(): HasMany
    {
        return $this->hasMany(Kader::class);
    }
    public function ikrumahtangga(): HasMany
    {
        return $this->hasMany(IKRumahTangga::class);
    }
    public function fasyankes(): HasMany
    {
        return $this->hasMany(fasyankes::class);
    }
}
