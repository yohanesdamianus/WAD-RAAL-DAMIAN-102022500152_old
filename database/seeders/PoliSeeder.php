<?php

namespace Database\Seeders;

use App\Models\Poli;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Data contoh. Ganti dengan data ruangan poli dari proyek PHP lamamu (tabel ruangan_poli).
     */
    public function run(): void
    {
        $data = [
            [
                'kode_ruangan'    => 'POLI-001',
                'nama_poli'       => 'Poli Umum',
                'lokasi_gedung'   => 'Gedung A, Lantai 1',
                'inventaris_alat' => 'Stetoskop, Tensimeter, Termometer, Timbangan badan',
            ],
            [
                'kode_ruangan'    => 'POLI-002',
                'nama_poli'       => 'Poli Gigi',
                'lokasi_gedung'   => 'Gedung A, Lantai 2',
                'inventaris_alat' => 'Dental unit, Scaler, Kursi gigi, Lampu operasi',
            ],
            [
                'kode_ruangan'    => 'POLI-003',
                'nama_poli'       => 'Poli Anak',
                'lokasi_gedung'   => 'Gedung B, Lantai 1',
                'inventaris_alat' => 'Timbangan bayi, Stetoskop anak, Termometer digital',
            ],
        ];

        foreach ($data as $row) {
            Poli::updateOrCreate(['kode_ruangan' => $row['kode_ruangan']], $row);
        }
    }
}
