@extends('layouts.app')

@section('title', 'Daftar Mata Kuliah')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-book-fill me-2"></i>Daftar Mata Kuliah</h5>
        <a href="{{ route('mata-kuliah.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
            <i class="bi bi-plus-lg me-1"></i> Tambah Mata Kuliah
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Mahasiswa</th>
                        <th>Prodi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mataKuliah as $index => $mk)
                    <tr>
                        <td class="ps-4 text-muted">{{ $index + 1 }}</td>
                        <td class="fw-semibold">{{ $mk->nama_mata_kuliah }}</td>
                        <td><span class="badge bg-secondary">{{ $mk->sks }} SKS</span></td>
                        <td>{{ $mk->mahasiswa ? $mk->mahasiswa->nama_mahasiswa : '-' }}</td>
                        <td>{{ $mk->prodi ? $mk->prodi->nama_prodi : '-' }}</td>
                        <td class="text-center">
                            <!-- Detail -->
                            <a href="{{ route('mata-kuliah.show', $mk->id) }}" class="btn btn-outline-info btn-sm me-1" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <!-- Edit -->
                            <a href="{{ route('mata-kuliah.edit', $mk->id) }}" class="btn btn-outline-warning btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Hapus -->
                            <form action="{{ route('mata-kuliah.destroy', $mk->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mata kuliah ini?')" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data Mata Kuliah.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection