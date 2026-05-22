@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="color: var(--primary);">
        <i class="fas fa-eye me-2"></i>Detail Produk
    </h2>
    <a href="{{ route('produk.index') }}" class="btn btn-elegant-outline">
        <i class="fas fa-arrow-left me-2"></i>Kembali
    </a>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card card-elegant">
            <div class="card-body p-0">
                @if($produk->gambar)
                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" 
                         class="w-100" style="border-radius: 15px 15px 0 0; height: 300px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center" 
                         style="height: 300px; background: var(--secondary); border-radius: 15px 15px 0 0;">
                        <i class="fas fa-image fa-4x text-muted"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card card-elegant">
            <div class="card-header card-header-elegant">
                <h5 class="mb-0">{{ $produk->nama_produk }}</h5>
            </div>
            <div class="card-body p-4">
                <table class="table table-borderless">
                    <tr>
                        <td width="30%" class="fw-medium text-muted">Kategori</td>
                        <td><span class="badge-elegant">{{ $produk->kategori->nama_kategori }}</span></td>
                    </tr>
                    <tr>
                        <td class="fw-medium text-muted">Harga</td>
                        <td class="fs-4 fw-bold" style="color: var(--primary);">{{ $produk->harga_formatted }}</td>
                    </tr>
                    <tr>
                        <td class="fw-medium text-muted">Stok Tersedia</td>
                        <td>
                            @if($produk->stok > 20)
                                <span class="badge bg-success fs-6">{{ $produk->stok }} unit</span>
                            @elseif($produk->stok > 10)
                                <span class="badge bg-warning text-dark fs-6">{{ $produk->stok }} unit</span>
                            @else
                                <span class="badge bg-danger fs-6">{{ $produk->stok }} unit</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="fw-medium text-muted">Deskripsi</td>
                        <td>{{ $produk->deskripsi ?? 'Tidak ada deskripsi' }}</td>
                    </tr>
                    <tr>
                        <td class="fw-medium text-muted">Dibuat</td>
                        <td>{{ $produk->created_at->format('d F Y H:i') }}</td>
                    </tr>
                    <tr>
                        <td class="fw-medium text-muted">Diperbarui</td>
                        <td>{{ $produk->updated_at->format('d F Y H:i') }}</td>
                    </tr>
                </table>

                @if(Auth::user()->isAdmin())
                <div class="d-flex gap-2 mt-3">
                    <a href="{{ route('produk.edit', $produk) }}" class="btn btn-elegant">
                        <i class="fas fa-edit me-2"></i>Edit Produk
                    </a>
                    <form action="{{ route('produk.destroy', $produk) }}" method="POST" class="d-inline" 
                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger-elegant">
                            <i class="fas fa-trash me-2"></i>Hapus
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection