@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="color: var(--primary);">
        <i class="fas fa-plus-circle me-2"></i>Tambah Kategori
    </h2>
    <a href="{{ route('kategori.index') }}" class="btn btn-elegant-outline">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card card-elegant">
    <div class="card-header card-header-elegant">
        <h5 class="mb-0"><i class="fas fa-tag me-2"></i>Form Kategori</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('kategori.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="form-label fw-medium">Nama Kategori <span class="text-danger">*</span></label>
                <input type="text" name="nama_kategori" class="form-control form-control-elegant @error('nama_kategori') is-invalid @enderror" 
                       value="{{ old('nama_kategori') }}" placeholder="Contoh: Skincare, Makeup, Body Care" required>
                @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-elegant">
                    <i class="fas fa-save me-2"></i>Simpan Kategori
                </button>
                <a href="{{ route('kategori.index') }}" class="btn btn-elegant-outline">
                    <i class="fas fa-times me-2"></i>Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection