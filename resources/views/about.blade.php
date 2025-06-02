@extends('layouts.app')

@section('content')

<style>
    main {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }
    
    .hero-about {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
    }
    
    .hero-about::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
        opacity: 0.3;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .profile-section {
        background: white;
        margin-top: -80px;
        position: relative;
        z-index: 3;
        border-radius: 30px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        padding: 4rem 3rem;
        border: 1px solid #f1f5f9;
    }
    
    .profile-image-container {
        position: relative;
        display: inline-block;
        margin-bottom: 2rem;
    }
    
    .profile-image {
        width: 200px;
        height: 200px;
        border-radius: 50%;
        object-fit: cover;
        border: 6px solid white;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
    }
    
    .profile-image:hover {
        transform: scale(1.05);
    }
    
    .profile-image-container::before {
        content: '';
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 50%;
        z-index: -1;
        opacity: 0.1;
    }
    
    .profile-name {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .profile-title {
        font-size: 1.25rem;
        color: #64748b;
        font-weight: 500;
        margin-bottom: 3rem;
    }
    
    .info-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .info-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }
    
    .info-card h4 {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .info-card h4 i {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4f46e5;
        font-size: 1.25rem;
    }
    
    .info-card p {
        color: #64748b;
        line-height: 1.7;
        margin-bottom: 1.5rem;
    }
    
    .feature-list {
        list-style: none;
        padding: 0;
    }
    
    .feature-list li {
        padding: 0.75rem 0;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: #64748b;
        transition: all 0.2s ease;
    }
    
    .feature-list li:last-child {
        border-bottom: none;
    }
    
    .feature-list li:hover {
        color: #4f46e5;
        padding-left: 0.5rem;
    }
    
    .feature-list li i {
        width: 20px;
        height: 20px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.75rem;
        flex-shrink: 0;
    }
    
    .tech-list {
        list-style: none;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }
    
    .tech-list li {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        color: #4f46e5;
        font-weight: 600;
        border: 2px solid #e2e8f0;
        transition: all 0.3s ease;
    }
    
    .tech-list li:hover {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
    }
    
    .contact-info {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 15px;
        padding: 1.5rem;
        margin-top: 1.5rem;
    }
    
    .contact-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 0.75rem 0;
        color: #64748b;
        transition: all 0.2s ease;
    }
    
    .contact-item:hover {
        color: #4f46e5;
        padding-left: 0.5rem;
    }
    
    .contact-item i {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.1rem;
        flex-shrink: 0;
    }
    
    .contact-item strong {
        color: #1e293b;
        font-weight: 600;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }
    
    .stat-card {
        text-align: center;
        padding: 2rem 1rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
        transition: all 0.3s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
    }
    
    .stat-number {
        font-size: 2.5rem;
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
        .hero-about {
            padding: 3rem 0;
        }
        
        .profile-section {
            margin-top: -50px;
            padding: 2.5rem 1.5rem;
            border-radius: 20px;
        }
        
        .profile-name {
            font-size: 2rem;
        }
        
        .profile-image {
            width: 150px;
            height: 150px;
        }
        
        .info-card {
            padding: 2rem 1.5rem;
        }
        
        .tech-list {
            justify-content: center;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-about">
    <div class="container">
        <div class="hero-content text-center">
            <h1 class="display-4 fw-bold mb-3">About Us</h1>
            <p class="lead">Mengenal lebih dekat pengembang dan platform Katalog Film Indonesia</p>
        </div>
    </div>
</div>

<div class="container">
    <!-- Profile Section -->
    <div class="profile-section text-center">
        <div class="profile-image-container">
            <img src="{{ asset('storage/Pribadi/Ari.jpg') }}" alt="Profile Picture" class="profile-image">
        </div>
        <h3 class="profile-name">I Wayan Arigayu Saputra</h3>
        <p class="profile-title">UTS Praktikum Pemrograman WEB2</p>
        
        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-number">3+</span>
                <span class="stat-label">Tahun Pengalaman</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">10+</span>
                <span class="stat-label">Proyek Selesai</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">5+</span>
                <span class="stat-label">Teknologi Dikuasai</span>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- About Me Card -->
        <div class="col-lg-6 mb-4">
            <div class="info-card">
                <h4>
                    <i class="fas fa-user"></i>
                    Tentang Saya
                </h4>
                <p>
                    Saya adalah seorang pengembang web yang bersemangat dengan pengalaman dalam membuat aplikasi web 
                    menggunakan Laravel dan teknologi modern lainnya. Dengan dedikasi tinggi terhadap kualitas kode 
                    dan user experience, saya selalu berusaha menciptakan solusi web yang inovatif dan efisien.
                </p>
                <p>
                    Website katalog film ini adalah salah satu proyek yang telah saya kembangkan untuk menampilkan 
                    kemampuan dan kreativitas saya dalam pengembangan web. Setiap detail dirancang dengan cermat 
                    untuk memberikan pengalaman terbaik bagi pengguna.
                </p>
            </div>
        </div>
        
        <!-- About Website Card -->
        <div class="col-lg-6 mb-4">
            <div class="info-card">
                <h4>
                    <i class="fas fa-globe"></i>
                    Tentang Website
                </h4>
                <p>
                    Website Katalog Film ini dibuat menggunakan framework Laravel dengan tujuan untuk menampilkan 
                    dan mengelola koleksi film secara efisien. Platform ini dirancang dengan arsitektur yang scalable 
                    dan maintainable.
                </p>
                <p><strong>Fitur-fitur unggulan:</strong></p>
                <ul class="feature-list">
                    <li><i class="fas fa-check"></i>Melihat katalog film beserta detailnya</li>
                    <li><i class="fas fa-check"></i>Menambahkan film baru ke dalam katalog</li>
                    <li><i class="fas fa-check"></i>Mengedit informasi film yang sudah ada</li>
                    <li><i class="fas fa-check"></i>Menghapus film dari katalog</li>
                    <li><i class="fas fa-check"></i>Mengelola kategori film</li>
                    <li><i class="fas fa-check"></i>Interface yang responsif dan modern</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Technology Stack Card -->
        <div class="col-lg-8 mb-4">
            <div class="info-card">
                <h4>
                    <i class="fas fa-code"></i>
                    Teknologi yang Digunakan
                </h4>
                <p>
                    Proyek ini dibangun menggunakan teknologi terkini untuk memastikan performa optimal, 
                    keamanan yang baik, dan pengalaman pengguna yang luar biasa.
                </p>
                <ul class="tech-list">
                    <li><i class="fab fa-php"></i> PHP Laravel</li>
                    <li><i class="fas fa-database"></i> MySQL Database</li>
                    <li><i class="fab fa-bootstrap"></i> Bootstrap 5</li>
                    <li><i class="fab fa-js"></i> JavaScript</li>
                    <li><i class="fab fa-html5"></i> HTML5</li>
                    <li><i class="fab fa-css3"></i> CSS3</li>
                </ul>
            </div>
        </div>
        
        <!-- Contact Card -->
        <div class="col-lg-4 mb-4">
            <div class="info-card">
                <h4>
                    <i class="fas fa-envelope"></i>
                    Kontak Saya
                </h4>
                <p>Mari terhubung dan berdiskusi tentang proyek atau kolaborasi menarik!</p>
                
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>Email</strong><br>
                            saputrawayanarigayu@gmail.com
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-instagram"></i>
                        <div>
                            <strong>Instagram</strong><br>
                            @argyu_s
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-whatsapp"></i>
                        <div>
                            <strong>WhatsApp</strong><br>
                            +6281234567890
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bottom spacing -->
<div style="height: 3rem;"></div>

@endsection