@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="color: var(--primary);">
        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
    </h2>
    <span class="badge-elegant">
        <i class="fas fa-calendar-alt me-1"></i> {{ date('d F Y') }}
    </span>
</div>

<!-- Stats Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="stat-card stat-card-primary">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-1">Total Produk</h6>
                    <h3 class="mb-0">{{ $totalProduk }}</h3>
                </div>
                <i class="fas fa-box-open fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card stat-card-success">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-1">Total Kategori</h6>
                    <h3 class="mb-0">{{ $totalKategori }}</h3>
                </div>
                <i class="fas fa-tags fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card stat-card-info">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-1">Total Stok</h6>
                    <h3 class="mb-0">{{ $totalStok }}</h3>
                </div>
                <i class="fas fa-warehouse fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="stat-card stat-card-warning">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-1">Role Anda</h6>
                    <h3 class="mb-0 text-capitalize">{{ Auth::user()->role->nama_role }}</h3>
                </div>
                <i class="fas fa-user-shield fa-2x opacity-50"></i>
            </div>
        </div>
    </div>
</div>

<!-- Produk Terbaru -->
<div class="card card-elegant">
    <div class="card-header card-header-elegant">
        <h5 class="mb-0"><i class="fas fa-clock me-2"></i>Produk Terbaru</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-elegant mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produkTerbaru as $index => $produk)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <i class="fas fa-sparkles me-2" style="color: var(--primary);"></i>
                            {{ $produk->nama_produk }}
                        </td>
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
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada produk</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection