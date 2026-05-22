@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="login-card animate-fade-in">
        <div class="login-logo">
            <i class="fas fa-spa"></i>
            <h2 class="mt-3" style="color: var(--primary); font-family: 'Playfair Display', serif;">Elegant Cosmetics</h2>
            <p class="text-muted">Sistem Kasir Toko Kosmetik</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger alert-elegant">
                @foreach($errors->all() as $error)
                    <div><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-medium">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fas fa-envelope text-muted"></i>
                    </span>
                    <input type="email" name="email" class="form-control form-control-elegant border-start-0" 
                           placeholder="Masukkan email" required autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label fw-medium">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0">
                        <i class="fas fa-lock text-muted"></i>
                    </span>
                    <input type="password" name="password" class="form-control form-control-elegant border-start-0" 
                           placeholder="Masukkan password" required>
                </div>
            </div>

            <button type="submit" class="btn btn-elegant w-100 py-3 mb-3">
                <i class="fas fa-sign-in-alt me-2"></i>Masuk
            </button>
        </form>

        <div class="text-center mt-4">
            <small class="text-muted">
                <i class="fas fa-info-circle me-1"></i>
                Akun Demo: admin@kosmetik.com / admin123
            </small>
        </div>
    </div>
</div>
@endsection