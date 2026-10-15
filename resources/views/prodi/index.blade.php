@extends('layouts.app')

@section('title', 'Daftar Prodi')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-building me-2"></i>Daftar Prodi</h5>
        <a href="{{ route('prodi.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
            <i class="bi bi-plus-lg me-1"></i> Tambah Prodi
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Nama Prodi</th>
                        <th>Akreditasi</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($prodi as $index => $p)
                    <tr>
                        <td class="ps-4 text-muted">{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $p->nama_prodi }}</td>
                        <td><span class="badge bg-info text-dark">{{ $p->akreditasi }}</span></td>
                        <td class="text-center">
                            @if($p->foto_prodi)
                                <img src="{{ asset('storage/' . $p->foto_prodi) }}" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <span class="badge bg-secondary-subtle text-dark border">No Photo</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Detail -->
                            <a href="{{ route('prodi.show', $p->id) }}" class="btn btn-outline-info btn-sm me-1" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <!-- Edit -->
                            <a href="{{ route('prodi.edit', $p->id) }}" class="btn btn-outline-warning btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Hapus -->
                            <form action="{{ route('prodi.destroy', $p->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus prodi ini?')" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data Prodi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection