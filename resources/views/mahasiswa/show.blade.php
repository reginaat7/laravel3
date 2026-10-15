@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-info"><i class="bi bi-person-lines-fill me-2"></i>Detail Mahasiswa</h5>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    @if($mahasiswa->foto_mahasiswa)
                        <img src="{{ asset('storage/' . $mahasiswa->foto_mahasiswa) }}" class="rounded shadow img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <div class="badge bg-secondary-subtle text-dark p-3 fs-6">Tidak Ada Foto</div>
                    @endif
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th width="30%">NIM</th>
                        <td>{{ $mahasiswa->nim }}</td>
                    </tr>
                    <tr>
                        <th>Nama Mahasiswa</th>
                        <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $mahasiswa->jenis_kelamin }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $mahasiswa->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Prodi</th>
                        <td>{{ $mahasiswa->prodi ? $mahasiswa->prodi->nama_prodi : '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection