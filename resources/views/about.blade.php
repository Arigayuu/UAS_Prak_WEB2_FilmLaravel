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
        padding: 6rem 0 8rem;
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
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
        opacity: 0.4;
    }
    
    .hero-about::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100px;
        background: linear-gradient(180deg, transparent, rgba(248, 250, 252, 0.1));
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1.5rem;
        background: linear-gradient(135deg, #ffffff, #e2e8f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .hero-subtitle {
        font-size: 1.25rem;
        color: #e2e8f0;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }
    
    .profile-section {
        background: white;
        margin-top: -100px;
        position: relative;
        z-index: 3;
        border-radius: 30px;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.1);
        padding: 4rem 3rem;
        border: 1px solid #f1f5f9;
        backdrop-filter: blur(10px);
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
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
    }
    
    .profile-image:hover {
        transform: scale(1.05) rotate(2deg);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
    }
    
    .profile-image-container::before {
        content: '';
        position: absolute;
        top: -15px;
        left: -15px;
        right: -15px;
        bottom: -15px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 50%;
        z-index: -1;
        opacity: 0.1;
        animation: pulse 3s infinite;
    }
    
    @keyframes pulse {
        0%, 100% { transform: scale(1); opacity: 0.1; }
        50% { transform: scale(1.05); opacity: 0.2; }
    }
    
    .profile-name {
        font-size: 2.75rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.5rem;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.2;
    }
    
    .profile-title {
        font-size: 1.25rem;
        color: #64748b;
        font-weight: 500;
        margin-bottom: 3rem;
        position: relative;
    }
    
    .profile-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 2px;
    }
    
    .info-card {
        background: white;
        border-radius: 25px;
        padding: 3rem 2.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }
    
    .info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .info-card::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.05), rgba(139, 92, 246, 0.05));
        border-radius: 50%;
        transform: translate(30px, -30px);
        transition: all 0.4s ease;
    }
    
    .info-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }
    
    .info-card:hover::after {
        transform: translate(20px, -20px) scale(1.2);
    }
    
    .info-card h4 {
        font-size: 1.875rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        position: relative;
        z-index: 2;
    }
    
    .info-card h4 i {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4f46e5;
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .info-card:hover h4 i {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        transform: rotate(5deg) scale(1.1);
    }
    
    .info-card p {
        color: #64748b;
        line-height: 1.8;
        margin-bottom: 1.5rem;
        font-size: 1.05rem;
        position: relative;
        z-index: 2;
    }
    
    .feature-list {
        list-style: none;
        padding: 0;
        position: relative;
        z-index: 2;
    }
    
    .feature-list li {
        padding: 1rem 0;
        border-bottom: 1px solid #f1f5f9;
        display: flex;
        align-items: center;
        gap: 1rem;
        color: #64748b;
        transition: all 0.3s ease;
        font-weight: 500;
    }
    
    .feature-list li:last-child {
        border-bottom: none;
    }
    
    .feature-list li:hover {
        color: #4f46e5;
        padding-left: 1rem;
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.05), rgba(139, 92, 246, 0.05));
        border-radius: 10px;
        margin: 0 -0.5rem;
        padding-right: 1rem;
    }
    
    .feature-list li i {
        width: 24px;
        height: 24px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 0.8rem;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }
    
    .feature-list li:hover i {
        transform: scale(1.2) rotate(360deg);
    }
    
    .tech-list {
        list-style: none;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        position: relative;
        z-index: 2;
    }
    
    .tech-list li {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        padding: 1rem 1.75rem;
        border-radius: 50px;
        color: #4f46e5;
        font-weight: 600;
        border: 2px solid #e2e8f0;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }
    
    .tech-list li::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        transition: all 0.4s ease;
        z-index: -1;
    }
    
    .tech-list li:hover::before {
        left: 0;
    }
    
    .tech-list li:hover {
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(79, 70, 229, 0.3);
        border-color: transparent;
    }
    
    .contact-info {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 20px;
        padding: 2rem;
        margin-top: 1.5rem;
        border: 1px solid #e2e8f0;
        position: relative;
        z-index: 2;
    }
    
    .contact-item {
        display: flex;
        align-items: center;
        gap: 1.25rem;
        padding: 1rem 0;
        color: #64748b;
        transition: all 0.3s ease;
        border-radius: 15px;
        margin: 0 -1rem;
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .contact-item:hover {
        color: #4f46e5;
        background: white;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transform: translateX(5px);
    }
    
    .contact-item i {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }
    
    .contact-item:hover i {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
    }
    
    .contact-item strong {
        color: #1e293b;
        font-weight: 600;
        display: block;
        margin-bottom: 0.25rem;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }
    
    .stat-card {
        text-align: center;
        padding: 2.5rem 1.5rem;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .stat-card::after {
        content: '';
        position: absolute;
        bottom: -50px;
        right: -50px;
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.1), rgba(139, 92, 246, 0.1));
        border-radius: 50%;
        transition: all 0.4s ease;
    }
    
    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .stat-card:hover::after {
        bottom: -30px;
        right: -30px;
        transform: scale(1.2);
    }
    
    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: block;
        margin-bottom: 0.75rem;
        position: relative;
        z-index: 2;
    }
    
    .stat-label {
        color: #64748b;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.9rem;
        position: relative;
        z-index: 2;
    }
    
    .section-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, #e2e8f0, transparent);
        margin: 4rem 0;
    }
    
    @media (max-width: 768px) {
        .hero-about {
            padding: 4rem 0 6rem;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .hero-subtitle {
            font-size: 1.1rem;
        }
        
        .profile-section {
            margin-top: -80px;
            padding: 3rem 2rem;
            border-radius: 25px;
        }
        
        .profile-name {
            font-size: 2.25rem;
        }
        
        .profile-image {
            width: 150px;
            height: 150px;
        }
        
        .info-card {
            padding: 2.5rem 2rem;
            border-radius: 20px;
        }
        
        .info-card h4 {
            font-size: 1.5rem;
            flex-direction: column;
            text-align: center;
            gap: 0.75rem;
        }
        
        .tech-list {
            justify-content: center;
        }
        
        .tech-list li {
            padding: 0.75rem 1.25rem;
            font-size: 0.9rem;
        }
        
        .contact-item {
            flex-direction: column;
            text-align: center;
            gap: 0.75rem;
            padding: 1.5rem 1rem;
        }
        
        .stats-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1.5rem;
        }
        
        .stat-card {
            padding: 2rem 1rem;
        }
        
        .stat-number {
            font-size: 2.5rem;
        }
    }
</style>

<!-- Hero Section -->
<div class="hero-about">
    <div class="container">
        <div class="hero-content text-center">
            <h1 class="hero-title">About Us</h1>
            <p class="hero-subtitle">Mengenal lebih dekat pengembang dan platform Katalog Film Indonesia yang inovatif</p>
        </div>
    </div>
</div>

<div class="container">
    <!-- Profile Section -->
    <div class="profile-section text-center">
        <div class="profile-image-container">
            <img src="{{ asset('storage/Pribadi/Ari.jpg') }}" alt="I Wayan Arigayu Saputra" class="profile-image">
        </div>
        <h3 class="profile-name">I Wayan Arigayu Saputra</h3>
        <p class="profile-title">UAS Praktikum Pemrograman WEB2</p>
        
        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <span class="stat-number">3+</span>
                <span class="stat-label">Tahun Pengalaman</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">15+</span>
                <span class="stat-label">Proyek Selesai</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">8+</span>
                <span class="stat-label">Teknologi Dikuasai</span>
            </div>
            <div class="stat-card">
                <span class="stat-number">100%</span>
                <span class="stat-label">Dedikasi</span>
            </div>
        </div>
    </div>
    
    <div class="section-divider"></div>
    
    <div class="row">
        <!-- About Me Card -->
        <div class="col-lg-6 mb-4">
            <div class="info-card">
                <h4>
                    <i class="fas fa-user-circle"></i>
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
                <p>
                    <strong>Passion saya:</strong> Mengembangkan aplikasi web yang tidak hanya fungsional, tetapi juga 
                    memberikan pengalaman pengguna yang luar biasa melalui desain yang intuitif dan performa yang optimal.
                </p>
            </div>
        </div>
        
        <!-- About Website Card -->
        <div class="col-lg-6 mb-4">
            <div class="info-card">
                <h4>
                    <i class="fas fa-film"></i>
                    Tentang Website
                </h4>
                <p>
                    Website Katalog Film ini dibuat menggunakan framework Laravel dengan tujuan untuk menampilkan 
                    dan mengelola koleksi film secara efisien. Platform ini dirancang dengan arsitektur yang scalable 
                    dan maintainable untuk pengalaman pengguna yang optimal.
                </p>
                <p><strong>Fitur-fitur unggulan:</strong></p>
                <ul class="feature-list">
                    <li><i class="fas fa-check"></i>Melihat katalog film beserta detailnya</li>
                    <li><i class="fas fa-check"></i>Menambahkan film baru ke dalam katalog</li>
                    <li><i class="fas fa-check"></i>Mengedit informasi film yang sudah ada</li>
                    <li><i class="fas fa-check"></i>Menghapus film dari katalog</li>
                    <li><i class="fas fa-check"></i>Mengelola kategori film</li>
                    <li><i class="fas fa-check"></i>Sistem autentikasi pengguna</li>
                    <li><i class="fas fa-check"></i>Interface responsif dan modern</li>
                    <li><i class="fas fa-check"></i>Pencarian dan filter film</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="section-divider"></div>
    
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
                    keamanan yang baik, dan pengalaman pengguna yang luar biasa. Setiap teknologi dipilih 
                    berdasarkan kebutuhan spesifik dan best practices dalam pengembangan web modern.
                </p>
                <ul class="tech-list">
                    <li><i class="fab fa-laravel"></i> Laravel Framework</li>
                    <li><i class="fas fa-database"></i> MySQL Database</li>
                    <li><i class="fab fa-bootstrap"></i> Bootstrap 5</li>
                    <li><i class="fab fa-js-square"></i> JavaScript ES6+</li>
                    <li><i class="fab fa-html5"></i> HTML5</li>
                    <li><i class="fab fa-css3-alt"></i> CSS3</li>
                    <li><i class="fab fa-sass"></i> SCSS</li>
                    <li><i class="fab fa-git-alt"></i> Git Version Control</li>
                </ul>
            </div>
        </div>
        
        <!-- Contact Card -->
        <div class="col-lg-4 mb-4">
            <div class="info-card">
                <h4>
                    <i class="fas fa-paper-plane"></i>
                    Kontak Saya
                </h4>
                <p>Mari terhubung dan berdiskusi tentang proyek, kolaborasi, atau peluang menarik lainnya!</p>
                
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <strong>Email</strong>
                            saputrawayanarigayu@gmail.com
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-instagram"></i>
                        <div>
                            <strong>Instagram</strong>
                            @argyu_s
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-whatsapp"></i>
                        <div>
                            <strong>WhatsApp</strong>
                            +6281234567890
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-github"></i>
                        <div>
                            <strong>GitHub</strong>
                            github.com/arigayu
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bottom spacing -->
<div style="height: 4rem;"></div>

@endsection