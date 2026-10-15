@extends('layouts.app')

@section('title', 'Edit Data Mata Kuliah')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <h5 class="mb-0 fw-bold text-warning"><i class="bi bi-pencil-square me-2"></i>Edit Data Mata Kuliah</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('mata-kuliah.update', $mataKuliah->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <!-- Nama Mata Kuliah -->
                        <div class="col-md-8 mb-3">
                            <label class="form-label fw-semibold">Nama Mata Kuliah <span class="text-danger">*</span></label>
                            <input type="text" 
                                   name="nama_mata_kuliah" 
                                   class="form-control @error('nama_mata_kuliah') is-invalid @enderror" 
                                   value="{{ old('nama_mata_kuliah', $mataKuliah->nama_mata_kuliah) }}" 
                                   required>
                            @error('nama_mata_kuliah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- SKS -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label fw-semibold">Jumlah SKS <span class="text-danger">*</span></label>
                            <input type="number" 
                                   name="sks" 
                                   class="form-control @error('sks') is-invalid @enderror" 
                                   value="{{ old('sks', $mataKuliah->sks) }}" 
                                   required>
                            @error('sks')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <!-- Mahasiswa -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Mahasiswa</label>
                            <select name="mahasiswa_id" class="form-select @error('mahasiswa_id') is-invalid @enderror">
                                <option value="">-- Pilih Mahasiswa --</option>
                                @foreach($mahasiswa as $m)
                                    <option value="{{ $m->id }}" {{ old('mahasiswa_id', $mataKuliah->mahasiswa_id) == $m->id ? 'selected' : '' }}>
                                        {{ $m->nama_mahasiswa }} ({{ $m->nim }})
                                    </option>
                                @endforeach
                            </select>
                            @error('mahasiswa_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <!-- Prodi -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-semibold">Program Studi</label>
                            <select name="prodi_id" class="form-select @error('prodi_id') is-invalid @enderror">
                                <option value="">-- Pilih Prodi --</option>
                                @foreach($prodi as $p)
                                    <option value="{{ $p->id }}" {{ old('prodi_id', $mataKuliah->prodi_id) == $p->id ? 'selected' : '' }}>
                                        {{ $p->nama_prodi }}
                                    </option>
                                @endforeach
                            </select>
                            @error('prodi_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-between pt-2 border-top">
                        <a href="{{ route('mata-kuliah.index') }}" class="btn btn-light px-4">Batal</a>
                        <button type="submit" class="btn btn-warning text-white px-4"><i class="bi bi-save me-1"></i> Perbarui Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection