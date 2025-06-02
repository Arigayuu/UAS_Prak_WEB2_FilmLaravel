<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Katalog Film') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .navbar-brand img, .navbar-brand i {
            width: 32px;
            height: 32px;
            background-color: #6366f1;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            padding: 6px;
        }
        
        .navbar {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: white !important;
        }
        
        .navbar .nav-link {
            color: #4b5563;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .navbar .nav-link:hover, .navbar .nav-link.active {
            background-color: #f3f4f6;
            color: #4f46e5;
        }
        
        .navbar .nav-link i {
            font-size: 1rem;
        }
        
        .hero-section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://source.unsplash.com/1600x900/?cinema,movie,city');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        
        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        
        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .btn-primary {
            background-color: #4f46e5;
            border-color: #4f46e5;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }
        
        .btn-primary:hover {
            background-color: #4338ca;
            border-color: #4338ca;
        }
        
        .btn-outline-light {
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background-color: #4f46e5;
        }
        
        .feature-card {
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
            transition: all 0.3s;
            border: 1px solid #e5e7eb;
            height: 100%;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            background-color: #eef2ff;
            color: #4f46e5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }
        
        .feature-card h3 {
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        footer {
            background-color: #1f2937;
            color: white;
            padding: 3rem 0;
            margin-top: auto;
        }
        
        footer h5 {
            font-weight: 600;
            margin-bottom: 1.5rem;
        }
        
        footer ul {
            list-style: none;
            padding-left: 0;
        }
        
        footer ul li {
            margin-bottom: 0.75rem;
        }
        
        footer ul li a {
            color: #d1d5db;
            text-decoration: none;
            transition: all 0.2s;
        }
        
        footer ul li a:hover {
            color: white;
        }
        
        .footer-bottom {
            border-top: 1px solid #374151;
            padding-top: 1.5rem;
            margin-top: 2rem;
        }
        
        .social-icons a {
            color: white;
            margin-right: 1rem;
            font-size: 1.25rem;
            transition: all 0.2s;
        }
        
        .social-icons a:hover {
            color: #4f46e5;
        }
        
        @media (max-width: 768px) {
            .hero-section {
                padding: 60px 0;
            }
            
            .hero-section h1 {
                font-size: 2rem;
            }
            
            .hero-section p {
                font-size: 1rem;
            }
        }
    </style>

    <!-- Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('landing') }}">
                    <i class="fas fa-film"></i>
                    <span>{{ config('app.name', 'Katalog Film') }}</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('landing') ? 'active' : '' }}" href="{{ route('landing') }}">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('films.index') ? 'active' : '' }}" href="{{ route('films.index') }}">
                                <i class="fas fa-film"></i> Katalog Film
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('films.create') ? 'active' : '' }}" href="{{ route('films.create') }}">
                                <i class="fas fa-plus"></i> Tambah Film
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                                <i class="fas fa-th"></i> Kategori
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                                <i class="fas fa-info-circle"></i> About Us
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <h5>Katalog Film</h5>
                        <p>Platform katalog film Indonesia yang membantu Anda menemukan dan menjelajahi koleksi film dari berbagai genre.</p>
                        <div class="social-icons">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                    <div class="col-md-2 col-6 mb-4 mb-md-0">
                        <h5>Menu</h5>
                        <ul>
                            <li><a href="{{ route('landing') }}">Home</a></li>
                            <li><a href="{{ route('films.index') }}">Katalog Film</a></li>
                            <li><a href="{{ route('about') }}">About Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-6 mb-4 mb-md-0">
                        <h5>Kategori</h5>
                        <ul>
                            <li><a href="#">Semua Umur</a></li>
                            <li><a href="#">13+</a></li>
                            <li><a href="#">17+</a></li>
                            <li><a href="#">21+</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h5>Kontak Kami</h5>
                        <ul>
                            <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Film Indonesia No. 123</li>
                            <li><i class="fas fa-phone me-2"></i> +62 123 4567 890</li>
                            <li><i class="fas fa-envelope me-2"></i> info@katalogfilm.com</li>
                        </ul>
                    </div>
                </div>
                <div class="row footer-bottom">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name', 'Katalog Film') }}. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="mb-0">Dibuat dengan <i class="fas fa-heart text-danger"></i> untuk pecinta film Indonesia</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>