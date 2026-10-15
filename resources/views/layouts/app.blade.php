<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Akademik')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .card { border: none; border-radius: 12px; }
        .table-hover tbody tr:hover { background-color: rgba(13, 110, 253, 0.03); }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#"><i class="bi bi-journal-bookmark-fill me-2"></i>Sistem Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('prodi*') ? 'active fw-bold' : '' }}" href="{{ route('prodi.index') }}">
                            <i class="bi bi-building me-1"></i> Data Prodi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('mahasiswa*') ? 'active fw-bold' : '' }}" href="{{ route('mahasiswa.index') }}">
                            <i class="bi bi-people-fill me-1"></i> Data Mahasiswa
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('mata-kuliah*') ? 'active fw-bold' : '' }}" href="{{ route('mata-kuliah.index') }}">
                            <i class="bi bi-book-fill me-1"></i> Data Mata Kuliah
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content Container -->
    <div class="container mb-5">
        <!-- Flash Alert Success -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>