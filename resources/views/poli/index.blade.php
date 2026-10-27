@extends('layouts.app')

@section('title', 'Pengecekan Ruang Poliklinik')

@push('styles')
<style>
    .container { padding: 20px; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
    th { background-color: #f2f2f2; }
    .badge { background-color: #e7f3fe; color: #31708f; padding: 5px 10px; border-radius: 5px; font-size: 14px; }
</style>
@endpush

@section('content')
    <div class="container">
        <h2>Katalog &amp; Pengecekan Ruang Poliklinik</h2>
        <p>Berikut adalah data master ruangan poli, lokasi gedung, dan inventaris alat medis yang tersedia.</p>

        <table>
            <thead>
                <tr>
                    <th>Kode Ruangan</th>
                    <th>Nama Poli</th>
                    <th>Lokasi Gedung / Lantai</th>
                    <th>Inventaris Alat Medis</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($polis as $poli)
                    <tr>
                        <td><strong>{{ $poli->kode_ruangan }}</strong></td>
                        <td><span class="badge">{{ $poli->nama_poli }}</span></td>
                        <td>{{ $poli->lokasi_gedung }}</td>
                        <td>{{ $poli->inventaris_alat }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" style="text-align: center;">Tidak ada data ruangan poliklinik ditemukan di database.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
