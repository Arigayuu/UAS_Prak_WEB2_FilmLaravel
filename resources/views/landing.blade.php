@extends('layouts.app')

@section('content')

<style>
    main {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }
    
    .hero-section {
        position: relative;
        overflow: hidden;
    }
    
    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.8), rgba(139, 92, 246, 0.8));
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #ffffff, #e2e8f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.25rem;
        color: #e2e8f0;
        margin-bottom: 2.5rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .btn-gradient {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border: none;
        padding: 12px 30px;
        font-weight: 600;
        border-radius: 50px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
    }
    
    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
        background: linear-gradient(135deg, #4338ca, #6d28d9);
    }
    
    .btn-outline-glass {
        background: rgba(255, 255, 255, 0.1);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: white;
        padding: 12px 30px;
        font-weight: 600;
        border-radius: 50px;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }
    
    .btn-outline-glass:hover {
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        color: white;
        transform: translateY(-2px);
    }
    
    .feature-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 1px solid #f1f5f9;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    
    .feature-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .feature-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        position: relative;
    }
    
    .feature-icon i {
        font-size: 2rem;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .feature-card h3 {
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1rem;
        font-size: 1.5rem;
    }
    
    .feature-card p {
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 0;
    }
    
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
        color: #1e293b;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 4px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 2px;
    }
    
    .about-section {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        position: relative;
    }
    
    .about-card {
        background: white;
        border-radius: 20px;
        padding: 3rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid #e2e8f0;
    }
    
    .about-card h2 {
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.5rem;
        font-size: 2.25rem;
    }
    
    .about-card .lead {
        color: #4f46e5;
        font-weight: 600;
        font-size: 1.25rem;
        margin-bottom: 1.5rem;
    }
    
    .about-card p {
        color: #64748b;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }
    
    .image-container {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .image-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.1), rgba(139, 92, 246, 0.1));
        z-index: 1;
    }
    
    .image-container img {
        width: 100%;
        height: 400px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .image-container:hover img {
        transform: scale(1.05);
    }
    
    .cta-section {
        background: linear-gradient(135deg, #1e293b, #334155);
        position: relative;
        overflow: hidden;
    }
    
    .cta-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="50" cy="10" r="1" fill="rgba(255,255,255,0.03)"/><circle cx="10" cy="60" r="1" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.5;
    }
    
    .cta-content {
        position: relative;
        z-index: 2;
    }
    
    .cta-section h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 1.5rem;
    }
    
    .cta-section .lead {
        color: #cbd5e1;
        font-size: 1.25rem;
        margin-bottom: 2.5rem;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .stats-section {
        background: white;
        padding: 4rem 0;
    }
    
    .stat-item {
        text-align: center;
        padding: 2rem 1rem;
    }
    
    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: block;
        margin-bottom: 0.5rem;
    }
    
    .stat-label {
        color: #64748b;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.875rem;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
        }
        
        .section-title {
            font-size: 2rem;
        }
        
        .feature-card {
            margin-bottom: 2rem;
        }
        
        .about-card {
            padding: 2rem;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-section d-flex align-items-center" style="background-image: url('{{ asset('storage/Pribadi/BGcinema.jpg') }}'); background-size: cover; background-position: center; min-height: 100vh;">
    <div class="container">
        <div class="hero-content text-center">
            <h1 class="hero-title">Katalog Film Indonesia</h1>
            <p class="hero-subtitle">Temukan dan jelajahi koleksi film dari berbagai genre dengan pengalaman yang tak terlupakan</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('films.index') }}" class="btn btn-gradient btn-lg">
                    <i class="fas fa-play me-2"></i>Lihat Katalog
                </a>
                <a href="{{ url('/about') }}" class="btn btn-outline-glass btn-lg">
                    <i class="fas fa-info-circle me-2"></i>Tentang Saya
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Film Tersedia</span>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <span class="stat-number">50+</span>
                    <span class="stat-label">Genre</span>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <span class="stat-number">1000+</span>
                    <span class="stat-label">Pengguna</span>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <span class="stat-number">4.8</span>
                    <span class="stat-label">Rating</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="features py-5" style="background: #fafbfc;">
    <div class="container">
        <h2 class="section-title">Fitur Unggulan</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-film"></i>
                    </div>
                    <h3>Tambah Film</h3>
                    <p>Simpan dan kelola track film yang telah Anda tonton bersama teman dan keluarga. Buat koleksi pribadi yang dapat dibagikan dengan mudah.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-th-large"></i>
                    </div>
                    <h3>Pembagian Kategori</h3>
                    <p>Jelajahi film berdasarkan kategori yang terorganisir dengan baik untuk pengalaman pencarian yang lebih mudah dan menyenangkan.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Komentar Film</h3>
                    <p>Berbagi pendapat dan review tentang film favorit Anda. Kontribusikan untuk memperkaya katalog dan membantu pengguna lain.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About Section -->
<div class="about-section py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="about-card">
                    <h2>Tentang Katalog Film</h2>
                    <p class="lead">Platform terdepan untuk pencinta film Indonesia</p>
                    <p>Katalog Film adalah platform inovatif yang dikembangkan khusus untuk menyediakan informasi lengkap dan terpercaya tentang berbagai film. Dengan antarmuka yang intuitif dan fitur-fitur canggih, pengguna dapat dengan mudah menjelajahi koleksi film yang luas.</p>
                    <p>Dibangun menggunakan teknologi Laravel terkini, platform ini menawarkan pengalaman yang responsif, aman, dan mudah digunakan untuk semua kalangan penggemar film, dari pemula hingga kritikus profesional.</p>
                    <a href="{{ url('/about') }}" class="btn btn-gradient">
                        <i class="fas fa-arrow-right me-2"></i>Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="image-container">
                    <img src="{{ asset('storage/Pribadi/ilu.jpg') }}" 
                        alt="Film Illustration" 
                        class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="cta-section py-5">
    <div class="container">
        <div class="cta-content text-center">
            <h2>Mulai Petualangan Film Anda</h2>
            <p class="lead">Bergabunglah dengan ribuan penggemar film lainnya dan temukan pengalaman menonton yang tak terlupakan</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('films.index') }}" class="btn btn-gradient btn-lg">
                    <i class="fas fa-search me-2"></i>Jelajahi Katalog
                </a>
                <a href="{{ route('films.create') }}" class="btn btn-outline-glass btn-lg">
                    <i class="fas fa-plus me-2"></i>Tambah Film Baru
                </a>
            </div>
        </div>
    </div>
</div>

@endsection