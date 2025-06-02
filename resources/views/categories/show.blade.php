@extends('layouts.app')

@section('content')

<style>
    main {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }
    
    .page-hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 4rem 0 6rem 0;
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
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }
    
    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .hero-subtitle {
        font-size: 1.25rem;
        opacity: 0.9;
        font-weight: 400;
        max-width: 600px;
        margin: 0 auto;
    }
    
    .category-info {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 1.5rem;
        margin-top: 2rem;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .category-description {
        font-size: 1.1rem;
        opacity: 0.9;
        margin: 0;
    }
    
    .content-container {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        margin: -3rem auto 3rem;
        position: relative;
        z-index: 3;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        max-width: 1200px;
    }
    
    .content-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #f1f5f9;
    }
    
    .section-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .section-title i {
        color: #667eea;
    }
    
    .films-count {
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        color: #667eea;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.875rem;
        border: 2px solid #e0e7ff;
    }
    
    .action-buttons {
        display: flex;
        gap: 0.75rem;
    }
    
    .btn-custom {
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        border-radius: 25px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        border: none;
        cursor: pointer;
        font-size: 0.875rem;
    }
    
    .btn-warning-custom {
        background: #f59e0b;
        color: white;
        box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
    }
    
    .btn-warning-custom:hover {
        background: #d97706;
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
    }
    
    .btn-secondary-custom {
        background: #f8fafc;
        border: 2px solid #e2e8f0;
        color: #64748b;
    }
    
    .btn-secondary-custom:hover {
        background: #f1f5f9;
        border-color: #cbd5e1;
        color: #475569;
        text-decoration: none;
        transform: translateY(-1px);
    }
    
    .films-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
        margin-top: 2rem;
    }
    
    .film-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: 1px solid #f1f5f9;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .film-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    }
    
    .film-poster {
        position: relative;
        height: 300px;
        overflow: hidden;
    }
    
    .film-poster img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .film-card:hover .film-poster img {
        transform: scale(1.05);
    }
    
    .no-poster {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #94a3b8;
        flex-direction: column;
        gap: 1rem;
    }
    
    .no-poster i {
        font-size: 3rem;
        opacity: 0.5;
    }
    
    .film-content {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .film-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }
    
    .film-description {
        color: #64748b;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        flex: 1;
        font-size: 0.9rem;
    }
    
    .film-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        padding-top: 1rem;
        border-top: 1px solid #f1f5f9;
    }
    
    .film-year {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 15px;
        font-weight: 600;
        font-size: 0.75rem;
    }
    
    .film-genre {
        color: #667eea;
        font-weight: 600;
        font-size: 0.875rem;
    }
    
    .btn-detail {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 20px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }
    
    .btn-detail:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
    }
    
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #64748b;
        background: #f8fafc;
        border-radius: 20px;
        border: 2px dashed #e2e8f0;
        margin-top: 2rem;
    }
    
    .empty-state i {
        font-size: 4rem;
        margin-bottom: 1.5rem;
        opacity: 0.5;
        color: #cbd5e1;
    }
    
    .empty-state h3 {
        color: #374151;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    
    .empty-state p {
        margin-bottom: 2rem;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .btn-add-film {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn-add-film:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
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
        color: #667eea;
        padding: 0.5rem 1rem;
        margin: 0 0.25rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .pagination .page-link:hover {
        background: #667eea;
        border-color: #667eea;
        color: white;
        transform: translateY(-1px);
    }
    
    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-color: #667eea;
        color: white;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .content-container {
            margin: -2rem 1rem 2rem;
            padding: 1.5rem;
        }
        
        .content-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .action-buttons {
            width: 100%;
            justify-content: space-between;
        }
        
        .films-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .film-poster {
            height: 250px;
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
                <div class="films-count">{{ $films->total() }} Film Ditemukan</div>
            </div>
            <div class="action-buttons">
                <a href="{{ route('categories.edit', $category) }}" class="btn-custom btn-warning-custom">
                    <i class="fas fa-edit"></i>
                    Edit Kategori
                </a>
                <a href="{{ route('categories.index') }}" class="btn-custom btn-secondary-custom">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
                </a>
            </div>
        </div>

        @forelse ($films as $film)
            @if($loop->first)
            <div class="films-grid">
            @endif
                <div class="film-card">
                    <div class="film-poster">
                        @if ($film->poster)
                            <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }}">
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
                            {{ $film->description ? Str::limit($film->description, 120) : 'Deskripsi film belum tersedia.' }}
                        </p>
                        <div class="film-meta">
                            <div class="film-year">{{ $film->release_year }}</div>
                            <div class="film-genre">{{ $film->genre }}</div>
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
                <i class="fas fa-film"></i>
                <h3>Belum Ada Film</h3>
                <p>Belum ada film dalam kategori "{{ $category->name }}". Tambahkan film baru atau edit kategori film yang sudah ada.</p>
                <a href="{{ route('films.create') }}" class="btn-add-film">
                    <i class="fas fa-plus me-2"></i>
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

@endsection
