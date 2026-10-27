<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // [READ] Tampilkan form tambah + tabel data pasien
    public function index()
    {
        $pasiens = Pasien::orderBy('rekam_medis')->get();

        return view('pasien.index', [
            'pasiens'    => $pasiens,
            'pasienEdit' => null,
        ]);
    }

    // [CREATE] Simpan data pasien baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'rekam_medis'    => 'required|string|max:50|unique:pasiens,rekam_medis',
            'nama_pasien'    => 'required|string|max:255',
            'domisili'       => 'required|string',
            'kontak_darurat' => 'required|string|max:50',
        ]);

        Pasien::create($data);

        return redirect()->route('pasien.index')
            ->with('sukses', 'Data pasien berhasil disimpan ke database!');
    }

    // [UPDATE - tahap 1] Tampilkan halaman yang sama dengan form berisi data yang diedit
    public function edit(Pasien $pasien)
    {
        $pasiens = Pasien::orderBy('rekam_medis')->get();

        return view('pasien.index', [
            'pasiens'    => $pasiens,
            'pasienEdit' => $pasien,
        ]);
    }

    // [UPDATE - tahap 2] Simpan perubahan
    public function update(Request $request, Pasien $pasien)
    {
        $data = $request->validate([
            'rekam_medis'    => 'required|string|max:50|unique:pasiens,rekam_medis,' . $pasien->id,
            'nama_pasien'    => 'required|string|max:255',
            'domisili'       => 'required|string',
            'kontak_darurat' => 'required|string|max:50',
        ]);

        $pasien->update($data);

        return redirect()->route('pasien.index')
            ->with('sukses', 'Data pasien berhasil diperbarui!');
    }

    // [DELETE] Hapus data pasien
    public function destroy(Pasien $pasien)
    {
        $pasien->delete();

        return redirect()->route('pasien.index')
            ->with('sukses', 'Data pasien berhasil dihapus!');
    }
}
