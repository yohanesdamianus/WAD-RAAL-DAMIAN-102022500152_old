<?php

use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
use Illuminate\Support\Facades\Route;

// Beranda (view statis)
Route::view('/', 'beranda')->name('beranda');

// Manajemen Pasien (CRUD: index, store, edit, update, destroy)
Route::resource('pasien', PasienController::class)->except(['create', 'show']);

// Ruang Poliklinik (menampilkan data)
Route::get('/poli-klinik', [PoliController::class, 'index'])->name('poli.index');
