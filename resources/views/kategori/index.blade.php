@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 style="color: var(--primary);">
        <i class="fas fa-tags me-2"></i>Kelola Kategori
    </h2>
    <a href="{{ route('kategori.create') }}" class="btn btn-elegant">
        <i class="fas fa-plus me-2"></i>Tambah Kategori
    </a>
</div>

<div class="card card-elegant">
    <div class="card-header card-header-elegant">
        <h5 class="mb-0"><i class="fas fa-list me-2"></i>Daftar Kategori</h5>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-elegant mb-0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Jumlah Produk</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategoris as $index => $kategori)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="fw-medium">
                            <i class="fas fa-tag me-2" style="color: var(--primary);"></i>
                            {{ $kategori->nama_kategori }}
                        </td>
                        <td><span class="badge-elegant">{{ $kategori->produks_count }} Produk</span></td>
                        <td>{{ $kategori->created_at->format('d F Y') }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $kategori) }}" class="btn btn-sm btn-elegant-outline">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" class="d-inline" 
                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger-elegant">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">
                            <i class="fas fa-inbox fa-3x mb-3 d-block" style="color: var(--secondary);"></i>
                            Belum ada kategori
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection