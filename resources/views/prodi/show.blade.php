@extends('layouts.app')

@section('title', 'Detail Data Prodi')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-info"><i class="bi bi-info-circle me-2"></i>Detail Data Prodi</h5>
                <a href="{{ route('prodi.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    @if($prodi->foto_prodi)
                        <img src="{{ asset('storage/' . $prodi->foto_prodi) }}" class="rounded shadow img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <div class="badge bg-secondary-subtle text-dark p-3 fs-6">Tidak Ada Foto</div>
                    @endif
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Nama Prodi</th>
                        <td>{{ $prodi->nama_prodi }}</td>
                    </tr>
                    <tr>
                        <th>Akreditasi</th>
                        <td><span class="badge bg-info text-dark">{{ $prodi->akreditasi }}</span></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection