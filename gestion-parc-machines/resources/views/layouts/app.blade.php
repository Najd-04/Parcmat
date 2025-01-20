<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Parc Machines</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <svg width="120" height="40" viewBox="0 0 120 40" class="me-2">
                <!-- Partie M -->
                <path d="M5 30 L15 10 L20 20 L25 10 L35 30"
                      fill="none"
                      stroke="#E53935"
                      stroke-width="4"
                      stroke-linecap="round"
                      stroke-linejoin="round"/>

                <!-- Partie T -->
                <path d="M45 10 L75 10 M60 10 L60 30"
                      fill="none"
                      stroke="#E53935"
                      stroke-width="4"
                      stroke-linecap="round"/>

                <!-- Partie C -->
                <path d="M95 10 A15 15 0 0 0 95 30"
                      fill="none"
                      stroke="#E53935"
                      stroke-width="4"
                      stroke-linecap="round"/>
            </svg>
            <span class="ms-2" style="color: #E53935; font-weight: bold;">MAINTRONIC</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                       href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i> Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('machines.*') ? 'active' : '' }}"
                       href="{{ route('machines.index') }}">
                        <i class="fas fa-cogs"></i> Machines
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('accessoires.*') ? 'active' : '' }}"
                       href="{{ route('accessoires.index') }}">
                        <i class="fas fa-puzzle-piece"></i> Accessoires
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @yield('content')
</div>
<footer class="bg-dark text-white text-center py-3 mt-4">
    <div class="container">
        <p class="mb-1">&copy; {{ date('Y') }} Solytech/Maintronic</p>
        <p class="mb-0">Projet réalisé par Najd et Jordi</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
