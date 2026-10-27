@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- Bagian Konten Utama Beranda -->
    <div class="main-content">
        <h2>Selamat Datang di Beranda Rumah Sakit Semua Bisa</h2>
        <p>Data pasien berhasil disimpan (jika Anda dialihkan dari halaman form).</p>

        <div class="panduan-box">
            <h3>Panduan Penggunaan</h3>
            <p>Gunakan menu navigasi di atas untuk mengelola Data Pasien, melihat Jadwal Dokter, atau mengecek Stok Farmasi.</p>
        </div>
    </div>

    <!-- Bagian Footer / Info Kontak -->
    <div class="footer-kontak">
        <h3>Informasi Kontak Klinik</h3>
        <p><strong>Alamat:</strong> Jl. Telekomunikasi No. 1, Bojongsoang, Kab. Bandung, Jawa Barat</p>
        <p><strong>Telepon / IGD:</strong> (022) 1234567</p>
        <p><strong>Layanan WhatsApp:</strong> 0812-3456-7890</p>
    </div>
@endsection
