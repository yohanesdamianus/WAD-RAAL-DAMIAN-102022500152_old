@extends('layouts.app')

@section('title', 'Manajemen Pasien')

@push('styles')
<style>
    /* Tambahan CSS seperlunya agar tabel rapi */
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
    th { background-color: #f2f2f2; }
    .btn-edit { background-color: #4CAF50; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; }
    .btn-delete { background-color: #f44336; color: white; padding: 5px 10px; text-decoration: none; border-radius: 3px; border: none; cursor: pointer; font-size: inherit; font-family: inherit; }
    .form-hapus { display: inline; }
</style>
@endpush

@section('content')
    <h2>{{ $pasienEdit ? 'Form Edit Data Pasien' : 'Formulir Tambah Data Pasien' }}</h2>

    {{-- Menampilkan pesan sukses / error validasi --}}
    @if (session('sukses'))
        <p style="color: green; font-weight: bold;">{{ session('sukses') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ $pasienEdit ? route('pasien.update', $pasienEdit) : route('pasien.store') }}">
        @csrf
        @if ($pasienEdit)
            @method('PUT')
        @endif

        <label for="rekam_medis">Nomor Rekam Medis Dasar:</label><br>
        <input type="text" id="rekam_medis" name="rekam_medis" placeholder="Contoh: RM-001" value="{{ old('rekam_medis', $pasienEdit?->rekam_medis) }}" required><br><br>

        <label for="nama_pasien">Profil Pasien (Nama Lengkap):</label><br>
        <input type="text" id="nama_pasien" name="nama_pasien" placeholder="Masukkan nama lengkap pasien" value="{{ old('nama_pasien', $pasienEdit?->nama_pasien) }}" required><br><br>

        <label for="domisili">Domisili:</label><br>
        <textarea name="domisili" id="domisili" cols="50" rows="3" placeholder="Masukkan alamat lengkap domisili" required>{{ old('domisili', $pasienEdit?->domisili) }}</textarea><br><br>

        <label for="kontak_darurat">Kontak Darurat:</label><br>
        <input type="text" id="kontak_darurat" name="kontak_darurat" placeholder="Nomor Telepon/HP Darurat" value="{{ old('kontak_darurat', $pasienEdit?->kontak_darurat) }}" required><br><br>

        <input type="submit" value="{{ $pasienEdit ? 'Update Data' : 'Simpan Data' }}">
        @if ($pasienEdit)
            <a href="{{ route('pasien.index') }}"><button type="button">Batal Edit</button></a>
        @endif
    </form>

    <hr>

    <!-- [READ] Bagian Tabel Data Dinamis -->
    <h2>Direktori Pasien (Data dari Database)</h2>
    <table>
        <thead>
            <tr>
                <th>No. Rekam Medis</th>
                <th>Profil Pasien</th>
                <th>Domisili</th>
                <th>Kontak Darurat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pasiens as $pasien)
                <tr>
                    <td>{{ $pasien->rekam_medis }}</td>
                    <td>{{ $pasien->nama_pasien }}</td>
                    <td>{{ $pasien->domisili }}</td>
                    <td>{{ $pasien->kontak_darurat }}</td>
                    <td>
                        <a href="{{ route('pasien.edit', $pasien) }}" class="btn-edit">Edit</a>
                        <form action="{{ route('pasien.destroy', $pasien) }}" method="POST" class="form-hapus"
                              onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Tidak ada data pasien ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
