<?php

namespace App\Http\Controllers;

use App\Models\Poli;

class PoliController extends Controller
{
    // [READ] Tampilkan data ruangan poliklinik
    public function index()
    {
        $polis = Poli::orderBy('kode_ruangan')->get();

        return view('poli.index', compact('polis'));
    }
}
