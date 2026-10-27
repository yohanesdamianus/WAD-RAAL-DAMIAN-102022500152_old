<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'rekam_medis',
        'nama_pasien',
        'domisili',
        'kontak_darurat',
    ];
}
