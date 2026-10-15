@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-people-fill me-2"></i>Daftar Mahasiswa</h5>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm rounded-pill px-3">
            <i class="bi bi-plus-lg me-1"></i> Tambah Mahasiswa
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>JK</th>
                        <th>Alamat</th>
                        <th>Prodi</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mahasiswa as $index => $m)
                    <tr>
                        <td class="ps-4 text-muted">{{ $index + 1 }}</td>
                        <td>{{ $m->nim }}</td>
                        <td class="fw-semibold">{{ $m->nama_mahasiswa }}</td>
                        <td>{{ $m->jenis_kelamin }}</td>
                        <td>{{ $m->alamat }}</td>
                        <td>{{ $m->prodi ? $m->prodi->nama_prodi : '-' }}</td>
                        <td class="text-center">
                            @if($m->foto_mahasiswa)
                                <img src="{{ asset('storage/' . $m->foto_mahasiswa) }}" class="rounded shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <span class="badge bg-secondary-subtle text-dark border">No Photo</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Detail -->
                            <a href="{{ route('mahasiswa.show', $m->id) }}" class="btn btn-outline-info btn-sm me-1" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <!-- Edit -->
                            <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-outline-warning btn-sm me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <!-- Hapus -->
                            <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4 text-muted">Belum ada data Mahasiswa.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection