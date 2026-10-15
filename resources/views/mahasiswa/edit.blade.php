@extends('layouts.app')

@section('title', 'Edit Data Mahasiswa')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-warning"><i class="bi bi-pencil-square me-2"></i>Edit Data Mahasiswa</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <!-- NIM -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">NIM <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nim" 
                                   class="form-control @error('nim') is-invalid @enderror" 
                                   value="{{ old('nim', $mahasiswa->nim) }}" 
                                   required>
                            @error('nim')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Nama Mahasiswa -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nama Mahasiswa <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama_mahasiswa" 
                                   class="form-control @error('nama_mahasiswa') is-invalid @enderror" 
                                   value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa) }}" 
                                   required>
                            @error('nama_mahasiswa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Jenis Kelamin -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                                <option value="Laki-laki" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Prodi -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Program Studi</label>
                            <select name="prodi_id" class="form-select @error('prodi_id') is-invalid @enderror">
                                <option value="">-- Pilih Prodi --</option>
                                @foreach($prodi as $p)
                                    <option value="{{ $p->id }}" {{ old('prodi_id', $mahasiswa->prodi_id) == $p->id ? 'selected' : '' }}>
                                        {{ $p->nama_prodi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('prodi_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <!-- Foto Mahasiswa Saat Ini & Ganti Foto -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold d-block">Foto Mahasiswa Saat Ini</label>
                        @if($mahasiswa->foto_mahasiswa)
                            <img src="{{ asset('storage/' . $mahasiswa->foto_mahasiswa) }}" class="rounded shadow-sm mb-3" style="width: 100px; height: 100px; object-fit: cover;">
                        @else
                            <p class="text-muted small">Belum ada foto yang diunggah.</p>
                        @endif
                        
                        <label class="form-label fw-semibold">Ganti Foto Mahasiswa (Opsional)</label>
                        <input type="file" 
                               name="foto_mahasiswa" 
                               class="form-control @error('foto_mahasiswa') is-invalid @enderror" 
                               accept="image/*">
                        @error('foto_mahasiswa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Alamat <span class="text-danger">*</span></label>
                        <textarea name="alamat" 
                                  class="form-control @error('alamat') is-invalid @enderror" 
                                  rows="3" 
                                  required>{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between pt-2 border-top">
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-warning text-white px-4"><i class="bi bi-save me-1"></i> Perbarui Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection