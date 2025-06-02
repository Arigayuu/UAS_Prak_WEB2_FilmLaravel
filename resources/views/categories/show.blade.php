@extends('layouts.app')

@section('content')

<style>
    main {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }
    
    .page-hero {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        padding: 5rem 0 7rem 0;
        position: relative;
        overflow: hidden;
    }
    
    .page-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="hero-pattern" width="40" height="40" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="30" cy="30" r="1" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23hero-pattern)"/></svg>');
        opacity: 0.4;
    }
    
    .page-hero::after {
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
        text-align: center;
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
    
    .category-info {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 2rem;
        margin-top: 2.5rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        overflow: hidden;
    }
    
    .category-info::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.1), rgba(124, 58, 237, 0.1));
        z-index: -1;
    }
    
    .category-description {
        font-size: 1.1rem;
        color: #e2e8f0;
        margin: 0;
        line-height: 1.7;
        position: relative;
    }
    
    .category-description::before {
        content: '\f02b';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        margin-right: 1rem;
        color: white;
        font-size: 1.5rem;
        vertical-align: middle;
    }
    
    .content-container {
        background: white;
        border-radius: 30px;
        padding: 3rem;
        margin: -4rem auto 0;
        position: relative;
        z-index: 3;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.1);
        border: 1px solid #f1f5f9;
    }
    
    .content-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 3rem;
        padding-bottom: 2rem;
        border-bottom: 2px solid #f1f5f9;
        position: relative;
    }
    
    .content-header::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 80px;
        height: 2px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .section-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .section-title i {
        color: #4f46e5;
        font-size: 1.5rem;
    }
    
    .films-count {
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        color: #4f46e5;
        padding: 0.5rem 1.25rem;
        border-radius: 25px;
        font-weight: 700;
        font-size: 0.875rem;
        border: 2px solid #c7d2fe;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.75rem;
    }
    
    .films-count i {
        font-size: 0.875rem;
    }
    
    .action-buttons {
        display: flex;
        gap: 1rem;
    }
    
    .btn-custom {
        padding: 1rem 2rem;
        font-weight: 600;
        border-radius: 50px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        border: none;
        cursor: pointer;
        font-size: 1rem;
    }
    
    .btn-warning-custom {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: white;
        box-shadow: 0 5px 15px rgba(245, 158, 11, 0.3);
    }
    
    .btn-warning-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(245, 158, 11, 0.4);
        color: white;
        background: linear-gradient(135deg, #d97706, #b45309);
    }
    
    .btn-secondary-custom {
        background: white;
        border: 2px solid #e2e8f0;
        color: #64748b;
    }
    
    .btn-secondary-custom:hover {
        background: #f8fafc;
        border-color: #cbd5e1;
        color: #475569;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .films-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2.5rem;
    }
    
    .film-card {
        background: white;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        transition: all 0.4s ease;
        border: 1px solid #f1f5f9;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }
    
    .film-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        transform: scaleX(0);
        transition: transform 0.4s ease;
    }
    
    .film-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    }
    
    .film-card:hover::before {
        transform: scaleX(1);
    }
    
    .film-poster {
        position: relative;
        height: 350px;
        overflow: hidden;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    }
    
    .film-poster img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    
    .film-card:hover .film-poster img {
        transform: scale(1.05);
    }
    
    .no-poster {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #94a3b8;
        flex-direction: column;
        gap: 1rem;
    }
    
    .no-poster i {
        font-size: 4rem;
        opacity: 0.5;
    }
    
    .no-poster span {
        font-weight: 600;
        font-size: 1.1rem;
    }
    
    .film-content {
        padding: 2rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .film-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .film-description {
        color: #64748b;
        line-height: 1.7;
        margin-bottom: 1.5rem;
        flex: 1;
        font-size: 1rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .film-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid #f1f5f9;
    }
    
    .film-year {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.875rem;
        box-shadow: 0 2px 8px rgba(79, 70, 229, 0.3);
    }
    
    .film-genre {
        color: #4f46e5;
        font-weight: 600;
        font-size: 0.875rem;
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        padding: 0.5rem 1rem;
        border-radius: 25px;
        border: 1px solid #c7d2fe;
    }
    
    .btn-detail {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
    }
    
    .btn-detail:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(79, 70, 229, 0.4);
        color: white;
        text-decoration: none;
        background: linear-gradient(135deg, #4338ca, #6d28d9);
    }
    
    .empty-state {
        text-align: center;
        padding: 5rem 3rem;
        color: #64748b;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 25px;
        border: 2px dashed #e2e8f0;
        position: relative;
        overflow: hidden;
    }
    
    .empty-state::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .empty-icon {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        border: 3px solid #c7d2fe;
    }
    
    .empty-icon i {
        font-size: 3rem;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .empty-state h3 {
        color: #1e293b;
        margin-bottom: 1rem;
        font-weight: 700;
        font-size: 1.75rem;
    }
    
    .empty-state p {
        margin-bottom: 2rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        font-size: 1.1rem;
        line-height: 1.6;
    }
    
    .btn-add-film {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        padding: 1rem 2.5rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .btn-add-film:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(79, 70, 229, 0.4);
        color: white;
        text-decoration: none;
        background: linear-gradient(135deg, #4338ca, #6d28d9);
    }
    
    .pagination-wrapper {
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid #f1f5f9;
        display: flex;
        justify-content: center;
    }
    
    .pagination .page-link {
        border: 2px solid #e2e8f0;
        color: #4f46e5;
        padding: 0.75rem 1.25rem;
        margin: 0 0.25rem;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
    }
    
    .pagination .page-link:hover {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-color: #4f46e5;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
    }
    
    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-color: #4f46e5;
        color: white;
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
    }
    
    .category-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 3rem;
    }
    
    .stat-card {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        padding: 2rem;
        border-radius: 20px;
        text-align: center;
        border: 2px solid #e2e8f0;
        transition: all 0.3s ease;
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
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(79, 70, 229, 0.1);
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        border-color: #4f46e5;
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
        .hero-title {
            font-size: 2.5rem;
        }
        
        .content-container {
            margin: -3rem 1rem 0;
            padding: 2rem;
            border-radius: 25px;
        }
        
        .content-header {
            flex-direction: column;
            gap: 1.5rem;
            align-items: flex-start;
        }
        
        .action-buttons {
            width: 100%;
            justify-content: space-between;
        }
        
        .films-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        
        .film-poster {
            height: 250px;
        }
        
        .category-stats {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>

<!-- Hero Section -->
<div class="page-hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-tag me-3"></i>
                {{ $category->name }}
            </h1>
            <p class="hero-subtitle">
                Jelajahi koleksi film dalam kategori ini
            </p>
            
            @if($category->description)
            <div class="category-info">
                <p class="category-description">{{ $category->description }}</p>
            </div>
            @endif
        </div>
    </div>
</div>

<div class="container">
    <div class="content-container">
        <div class="content-header">
            <div>
                <h2 class="section-title">
                    <i class="fas fa-film"></i>
                    Film dalam Kategori
                </h2>
                <div class="films-count">
                    <i class="fas fa-film"></i>
                    {{ $films->total() }} Film Ditemukan
                </div>
            </div>
            <div class="action-buttons">
                <a href="{{ route('categories.edit', $category) }}" class="btn-custom btn-warning-custom">
                    <i class="fas fa-edit"></i>
                    Edit Kategori
                </a>
                <a href="{{ route('categories.index') }}" class="btn-custom btn-secondary-custom">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Daftar
                </a>
            </div>
        </div>

        <!-- Category Stats -->
        @if($films->count() > 0)
            <div class="category-stats">
                <div class="stat-card">
                    <span class="stat-number">{{ $films->count() }}</span>
                    <span class="stat-label">Total Film</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $films->unique('director')->count() }}</span>
                    <span class="stat-label">Sutradara</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $films->max('release_year') ?? date('Y') }}</span>
                    <span class="stat-label">Tahun Terbaru</span>
                </div>
            </div>
        @endif

        @forelse ($films as $film)
            @if($loop->first)
            <div class="films-grid">
            @endif
                <div class="film-card">
                    <div class="film-poster">
                        @if ($film->poster)
                            <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }}" loading="lazy">
                        @else
                            <div class="no-poster">
                                <i class="fas fa-film"></i>
                                <span>No Poster</span>
                            </div>
                        @endif
                    </div>
                    <div class="film-content">
                        <h5 class="film-title">{{ $film->title }}</h5>
                        <p class="film-description">
                            {{ $film->description ? Str::limit($film->description, 150) : 'Deskripsi film belum tersedia.' }}
                        </p>
                        <div class="film-meta">
                            <div class="film-year">{{ $film->release_year }}</div>
                            <div class="film-genre">{{ Str::limit($film->genre, 20) }}</div>
                        </div>
                        <a href="{{ route('films.show', $film) }}" class="btn-detail">
                            <i class="fas fa-eye"></i>
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @if($loop->last)
            </div>
            @endif
        @empty
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-film"></i>
                </div>
                <h3>Belum Ada Film</h3>
                <p>Belum ada film dalam kategori "{{ $category->name }}". Tambahkan film baru atau edit kategori film yang sudah ada.</p>
                <a href="{{ route('films.create') }}" class="btn-add-film">
                    <i class="fas fa-plus"></i>
                    Tambah Film Baru
                </a>
            </div>
        @endforelse
        
        @if($films->hasPages())
        <div class="pagination-wrapper">
            {{ $films->links() }}
        </div>
        @endif
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Lazy loading for images
    const images = document.querySelectorAll('img[loading="lazy"]');
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });
        
        images.forEach(img => imageObserver.observe(img));
    }
    
    // Animate film cards on scroll
    const filmCards = document.querySelectorAll('.film-card');
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    filmCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = `opacity 0.6s ease ${index * 0.1}s, transform 0.6s ease ${index * 0.1}s`;
        observer.observe(card);
    });
});
</script>

@endsection