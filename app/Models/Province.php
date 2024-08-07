<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\ProvinceTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Province Model.
 */
class Province extends Model
{
    use ProvinceTrait;
    /**
     * Table name.
     *
     * @var string
     */
    protected $table = 'provinces';

    /**
     * Province has many regencies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }

    public function kaders(): HasMany
    {
        return $this->hasMany(Kader::class);
    }

    public function fasyankes(): HasMany
    {
        return $this->hasMany(fasyankes::class);
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
}
