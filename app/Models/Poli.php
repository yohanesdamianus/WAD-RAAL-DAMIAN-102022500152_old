<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $fillable = [
        'kode_ruangan',
        'nama_poli',
        'lokasi_gedung',
        'inventaris_alat',
    ];
}
