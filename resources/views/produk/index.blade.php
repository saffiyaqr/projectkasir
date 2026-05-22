@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="color: var(--primary);">
        <i class="fas fa-box-open me-2"></i>Daftar Produk
    </h2>
    @if(Auth::user()->isAdmin())
    <a href="{{ route('produk.create') }}" class="btn btn-elegant">
        <i class="fas fa-plus me-2"></i>Tambah Produk
    </a>
    @endif
</div>

<!-- Search Bar -->
<div class="card card-elegant mb-4">
    <div class="card-body">
        <form action="{{ route('produk.index') }}" method="GET" class="row g-3">
            <div class="col-md-10">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" name="search" class="form-control form-control-elegant border-start-0" 
                           placeholder="Cari produk atau kategori..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-elegant w-100">
                    <i class="fas fa-search me-1"></i> Cari
                </button>
            </div>
        </form>
    </div>
</div>

<div class="card card-elegant">
    <div class="card-header card-header-elegant d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-list me-2"></i>Data Produk</h5>
        <span class="badge bg-white text-dark">{{ $produks->total() }} Produk</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-elegant mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produks as $index => $produk)
                    <tr>
                        <td>{{ $produks->firstItem() + $index }}</td>
                        <td>
                            @if($produk->gambar)
                                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" 
                                     class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="rounded d-flex align-items-center justify-content-center" 
                                     style="width: 50px; height: 50px; background: var(--secondary);">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td class="fw-medium">{{ $produk->nama_produk }}</td>
                        <td><span class="badge-elegant">{{ $produk->kategori->nama_kategori }}</span></td>
                        <td class="fw-bold" style="color: var(--primary);">{{ $produk->harga_formatted }}</td>
                        <td>
                            @if($produk->stok > 20)
                                <span class="badge bg-success">{{ $produk->stok }}</span>
                            @elseif($produk->stok > 10)
                                <span class="badge bg-warning text-dark">{{ $produk->stok }}</span>
                            @else
                                <span class="badge bg-danger">{{ $produk->stok }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('produk.show', $produk) }}" class="btn btn-sm btn-elegant-outline">
                                <i class="fas fa-eye"></i>
                            </a>
                            @if(Auth::user()->isAdmin())
                            <a href="{{ route('produk.edit', $produk) }}" class="btn btn-sm btn-elegant-outline">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('produk.destroy', $produk) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger-elegant">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="fas fa-inbox fa-3x mb-3 d-block" style="color: var(--secondary);"></i>
                            Tidak ada produk ditemukan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white border-0">
        {{ $produks->links() }}
    </div>
</div>
@endsection