@extends('layouts.app')

@section('title', 'Tambah Data Prodi')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-primary"><i class="bi bi-plus-circle me-2"></i>Tambah Data Prodi</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('prodi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <!-- Nama Prodi -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Nama Prodi <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama_prodi" 
                                   class="form-control @error('nama_prodi') is-invalid @enderror" 
                                   value="{{ old('nama_prodi') }}" 
                                   placeholder="Contoh: Teknik Informatika" 
                                   required>
                            @error('nama_prodi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Akreditasi -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Akreditasi <span class="text-danger">*</span></label>
                            <select name="akreditasi" class="form-select @error('akreditasi') is-invalid @enderror" required>
                                <option value="" disabled selected>-- Pilih Akreditasi --</option>
                                <option value="Unggul" {{ old('akreditasi') == 'Unggul' ? 'selected' : '' }}>Unggul</option>
                                <option value="Baik Sekali" {{ old('akreditasi') == 'Baik Sekali' ? 'selected' : '' }}>Baik Sekali</option>
                                <option value="Baik" {{ old('akreditasi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                <option value="Belum Terakreditasi" {{ old('akreditasi') == 'Belum Terakreditasi' ? 'selected' : '' }}>Belum Terakreditasi</option>
                            </select>
                            @error('akreditasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <!-- Upload Foto Prodi -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Foto Prodi (Opsional)</label>
                        <input type="file" 
                               name="foto_prodi" 
                               class="form-control @error('foto_prodi') is-invalid @enderror" 
                               accept="image/*">
                        @error('foto_prodi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between pt-2 border-top">
                        <a href="{{ route('prodi.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4"><i class="bi bi-save me-1"></i> Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection