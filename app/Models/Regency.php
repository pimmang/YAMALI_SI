<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\RegencyTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Regency Model.
 */
class Regency extends Model
{
    use RegencyTrait;

    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'regencies';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'province_id'
    ];

    /**
     * Regency belongs to Province.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Regency has many districts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function kaders(): HasMany
    {
        return $this->hasMany(Kader::class);
    }
    public function fasyankes(): HasMany
    {
        return $this->hasMany(fasyankes::class);
    }

    public function IKRumahTangga(): HasMany
    {
        return $this->hasMany(IKRumahTangga::class);
    }
    public function IKNRumahTangga(): HasMany
    {
        return $this->hasMany(IKNRumahTangga::class);
    }
    public function kontak(): HasMany
    {
        return $this->hasMany(Kontak::class);
    }
}
