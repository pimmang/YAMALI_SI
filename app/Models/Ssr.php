<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ssr extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'user_id',
    ];

    // public function setNameAttribute($value)
    // {
    //     // Capitalize setiap kata dalam nama
    //     $this->attributes['nama'] = ucwords(strtolower($value));
    // }
    public function kaders(): HasMany
    {
        return $this->hasMany(Kader::class);
    }
    public function iKRumahTangga(): HasMany
    {
        return $this->hasMany(IKRumahTangga::class);
    }
    public function iKNRumahTangga(): HasMany
    {
        return $this->hasMany(IKNRumahTangga::class);
    }
    public function fasyankes(): HasMany
    {
        return $this->hasMany(fasyankes::class);
    }
    public function kontak(): HasMany
    {
        return $this->hasMany(Kontak::class);
    }
    public function index(): HasMany
    {
        return $this->hasMany(Index::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
