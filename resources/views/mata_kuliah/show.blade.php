@extends('layouts.app')

@section('title', 'Detail Mata Kuliah')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-info"><i class="bi bi-journal-text me-2"></i>Detail Mata Kuliah</h5>
                <a href="{{ route('mata-kuliah.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>
            <div class="card-body p-4">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nama Mata Kuliah</th>
                        <td>{{ $mataKuliah->nama_mata_kuliah }}</td>
                    </tr>
                    <tr>
                        <th>SKS</th>
                        <td><span class="badge bg-secondary">{{ $mataKuliah->sks }} SKS</span></td>
                    </tr>
                    <tr>
                        <th>Mahasiswa</th>
                        <td>{{ $mataKuliah->mahasiswa ? $mataKuliah->mahasiswa->nama_mahasiswa : '-' }}</td>
                    </tr>
                    <tr>
                        <th>Prodi</th>
                        <td>{{ $mataKuliah->prodi ? $mataKuliah->prodi->nama_prodi : '-' }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection