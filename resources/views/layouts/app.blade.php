<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Elegant Cosmetics') }} - Kasir</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        :root {
            --primary: #D4A574;
            --secondary: #F8E1E4;
            --accent: #C9A96E;
            --bg-warm: #FFF9F5;
            --text-dark: #4A3F35;
            --success: #7FB069;
            --danger: #C75B5B;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-warm);
            color: var(--text-dark);
        }

        h1, h2, h3, h4, h5, h6, .navbar-brand {
            font-family: 'Playfair Display', serif;
        }

        /* Navbar Styling */
        .navbar-elegant {
            background: linear-gradient(135deg, #fff 0%, var(--secondary) 100%);
            border-bottom: 2px solid var(--primary);
            box-shadow: 0 2px 15px rgba(212, 165, 116, 0.2);
        }

        .navbar-brand {
            color: var(--primary) !important;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .navbar-brand i {
            color: var(--accent);
            margin-right: 8px;
        }

        /* Sidebar */
        .sidebar {
            min-height: calc(100vh - 70px);
            background: linear-gradient(180deg, #fff 0%, var(--bg-warm) 100%);
            border-right: 1px solid var(--secondary);
            padding-top: 20px;
        }

        .sidebar .nav-link {
            color: var(--text-dark);
            padding: 12px 20px;
            margin: 5px 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(212, 165, 116, 0.4);
        }

        .sidebar .nav-link i {
            width: 25px;
            margin-right: 10px;
        }

        /* Cards */
        .card-elegant {
            border: none;
            border-radius: 15px;
            background: white;
            box-shadow: 0 5px 20px rgba(212, 165, 116, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-elegant:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(212, 165, 116, 0.25);
        }

        .card-header-elegant {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
            border-radius: 15px 15px 0 0 !important;
            padding: 15px 20px;
        }

        /* Buttons */
        .btn-elegant {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-elegant:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 165, 116, 0.4);
            color: white;
        }

        .btn-elegant-outline {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            border-radius: 25px;
            padding: 8px 23px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-elegant-outline:hover {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
        }

        .btn-danger-elegant {
            background: linear-gradient(135deg, var(--danger) 0%, #e08e8e 100%);
            color: white;
            border: none;
            border-radius: 25px;
        }

        /* Tables */
        .table-elegant {
            background: white;
            border-radius: 15px;
            overflow: hidden;
        }

        .table-elegant thead {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
        }

        .table-elegant th {
            font-weight: 600;
            padding: 15px;
        }

        .table-elegant td {
            padding: 12px 15px;
            vertical-align: middle;
        }

        .table-elegant tbody tr:hover {
            background-color: var(--bg-warm);
        }

        /* Form Styling */
        .form-control-elegant {
            border: 2px solid var(--secondary);
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control-elegant:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(212, 165, 116, 0.25);
        }

        /* Stats Cards */
        .stat-card {
            border-radius: 15px;
            padding: 25px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
        }

        .stat-card-primary { background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%); }
        .stat-card-success { background: linear-gradient(135deg, var(--success) 0%, #9bc493 100%); }
        .stat-card-info { background: linear-gradient(135deg, #6c9bcf 0%, #8fb3d9 100%); }
        .stat-card-warning { background: linear-gradient(135deg, #e8a87c 0%, #f0c4a0 100%); }

        /* Alert */
        .alert-elegant {
            border-radius: 10px;
            border: none;
        }

        /* Badge */
        .badge-elegant {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-weight: 500;
        }

        /* Product Card */
        .product-card {
            border-radius: 15px;
            overflow: hidden;
            background: white;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(212, 165, 116, 0.2);
        }

        .product-card img {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .product-price {
            color: var(--primary);
            font-weight: 700;
            font-size: 1.2rem;
        }

        /* Login Page */
        .login-container {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--bg-warm) 0%, var(--secondary) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(212, 165, 116, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 450px;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo i {
            font-size: 3rem;
            color: var(--primary);
        }

        /* Footer */
        .footer-elegant {
            background: linear-gradient(135deg, var(--text-dark) 0%, #6b5d4f 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }

        /* Pagination */
        .pagination .page-link {
            color: var(--primary);
            border: none;
            margin: 0 3px;
            border-radius: 8px;
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease forwards;
        }
    </style>
</head>
<body>
    @auth
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-elegant sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <i class="fas fa-spa"></i> Elegant Cosmetics
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <div class="bg-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width:35px;height:35px;">
                                <i class="fas fa-user text-primary"></i>
                            </div>
                            <span class="fw-medium">{{ Auth::user()->name }}</span>
                            <span class="badge-elegant ms-2" style="font-size:0.7rem;">
                                {{ Auth::user()->role->nama_role }}
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user-cog me-2"></i>Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar collapse" id="sidebarMenu">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('produk.*') ? 'active' : '' }}" href="{{ route('produk.index') }}">
                                <i class="fas fa-box-open"></i> Produk
                            </a>
                        </li>
                        @if(Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
                                <i class="fas fa-tags"></i> Kategori
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @if(session('success'))
                    <div class="alert alert-elegant alert-success animate-fade-in">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-elegant alert-danger animate-fade-in">
                        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <footer class="footer-elegant mt-auto">
        <p class="mb-0"><i class="fas fa-heart text-danger"></i> Elegant Cosmetics - Kasir System &copy; {{ date('Y') }}</p>
    </footer>

    @else
        @yield('content')
    @endauth

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>