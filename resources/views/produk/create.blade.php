@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="color: var(--primary);">
        <i class="fas fa-plus-circle me-2"></i>Tambah Produk Baru
    </h2>
    <a href="{{ route('produk.index') }}" class="btn btn-elegant-outline">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="card card-elegant">
    <div class="card-header card-header-elegant">
        <h5 class="mb-0"><i class="fas fa-box me-2"></i>Form Produk</h5>
    </div>
    <div class="card-body p-4">
        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium">Nama Produk <span class="text-danger">*</span></label>
                    <input type="text" name="nama_produk" class="form-control form-control-elegant @error('nama_produk') is-invalid @enderror" 
                           value="{{ old('nama_produk') }}" required>
                    @error('nama_produk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori_id" class="form-select form-control-elegant @error('kategori_id') is-invalid @enderror" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium">Harga (Rp) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" name="harga" class="form-control form-control-elegant @error('harga') is-invalid @enderror" 
                               value="{{ old('harga') }}" min="0" required>
                    </div>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-medium">Stok <span class="text-danger">*</span></label>
                    <input type="number" name="stok" class="form-control form-control-elegant @error('stok') is-invalid @enderror" 
                           value="{{ old('stok') }}" min="0" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-medium">Gambar Produk</label>
                <input type="file" name="gambar" class="form-control form-control-elegant @error('gambar') is-invalid @enderror" 
                       accept="image/*">
                <small class="text-muted">Format: JPG, PNG, GIF (Max 2MB)</small>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label fw-medium">Deskripsi</label>
                <textarea name="deskripsi" class="form-control form-control-elegant @error('deskripsi') is-invalid @enderror" 
                          rows="4">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-elegant">
                    <i class="fas fa-save me-2"></i>Simpan Produk
                </button>
                <button type="reset" class="btn btn-elegant-outline">
                    <i class="fas fa-undo me-2"></i>Reset
                </button>
            </div>
        </form>
    </div>
</div>
@endsection