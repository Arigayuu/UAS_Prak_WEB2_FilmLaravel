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
    
    .search-container {
        background: white;
        border-radius: 30px;
        padding: 2.5rem;
        margin: -4rem auto 0;
        position: relative;
        z-index: 3;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.1);
        max-width: 1200px;
        border: 1px solid #f1f5f9;
    }
    
    .search-wrapper {
        position: relative;
        margin-bottom: 2rem;
    }
    
    .search-input {
        width: 100%;
        padding: 1.25rem 1.5rem 1.25rem 4rem;
        border: 2px solid #e2e8f0;
        border-radius: 20px;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        background: #f8fafc;
        font-weight: 500;
    }
    
    .search-input:focus {
        outline: none;
        border-color: #4f46e5;
        background: white;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    }
    
    .search-icon {
        position: absolute;
        left: 1.5rem;
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        font-size: 1.25rem;
    }
    
    .search-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1.5rem;
        flex-wrap: wrap;
    }
    
    .filter-section {
        display: flex;
        gap: 1rem;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .filter-label {
        font-weight: 600;
        color: #374151;
        font-size: 0.95rem;
    }
    
    .filter-buttons {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }
    
    .filter-btn {
        padding: 0.75rem 1.5rem;
        border: 2px solid #e2e8f0;
        border-radius: 50px;
        background: white;
        color: #64748b;
        font-size: 0.875rem;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .filter-btn:hover, .filter-btn.active {
        border-color: #4f46e5;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
    }
    
    .btn-add-new {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        padding: 1rem 2rem;
        border-radius: 50px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
        display: flex;
        align-items: center;
        gap: 0.75rem;
        white-space: nowrap;
    }
    
    .btn-add-new:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(79, 70, 229, 0.4);
        color: white;
        text-decoration: none;
        background: linear-gradient(135deg, #4338ca, #6d28d9);
    }
    
    .stats-section {
        margin: 4rem 0;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 2rem;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .stat-card {
        background: white;
        padding: 2.5rem 2rem;
        border-radius: 20px;
        text-align: center;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
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
    
    .stat-card::after {
        content: '';
        position: absolute;
        bottom: -50px;
        right: -50px;
        width: 100px;
        height: 100px;
        background: linear-gradient(135deg, rgba(79, 70, 229, 0.1), rgba(139, 92, 246, 0.1));
        border-radius: 50%;
        transition: all 0.3s ease;
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
    
    .films-section {
        margin-top: 4rem;
    }
    
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 3rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f1f5f9;
    }
    
    .section-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        position: relative;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -1rem;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 2px;
    }
    
    .view-toggle {
        display: flex;
        background: #f1f5f9;
        border-radius: 15px;
        padding: 0.5rem;
        border: 1px solid #e2e8f0;
    }
    
    .view-btn {
        padding: 0.75rem 1.25rem;
        border: none;
        background: transparent;
        color: #64748b;
        border-radius: 10px;
        transition: all 0.3s ease;
        cursor: pointer;
        font-weight: 600;
    }
    
    .view-btn.active {
        background: white;
        color: #4f46e5;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
        height: 400px;
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
    
    .film-year-badge {
        position: absolute;
        top: 1.5rem;
        right: 1.5rem;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        padding: 0.75rem 1.25rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.875rem;
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
        backdrop-filter: blur(10px);
    }
    
    .no-image {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #94a3b8;
        flex-direction: column;
        gap: 1rem;
    }
    
    .no-image i {
        font-size: 4rem;
        opacity: 0.5;
    }
    
    .no-image span {
        font-weight: 600;
        font-size: 1.1rem;
    }
    
    .film-content {
        padding: 2rem;
    }
    
    .film-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.5rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .film-meta {
        margin-bottom: 2rem;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 0.75rem;
        color: #64748b;
        font-size: 0.95rem;
        font-weight: 500;
    }
    
    .meta-item i {
        color: #4f46e5;
        width: 18px;
        text-align: center;
        font-size: 1rem;
    }
    
    .film-actions {
        display: flex;
        gap: 0.75rem;
        padding-top: 1.5rem;
        border-top: 1px solid #f1f5f9;
    }
    
    .btn-action {
        flex: 1;
        padding: 0.875rem 1rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.875rem;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #4338ca, #6d28d9);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
    }
    
    .btn-warning {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: white;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    }
    
    .btn-warning:hover {
        background: linear-gradient(135deg, #d97706, #b45309);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
    }
    
    .btn-danger {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }
    
    .btn-danger:hover {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
    }
    
    .alert-success {
        background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        border: 2px solid #6ee7b7;
        color: #065f46;
        padding: 1.5rem 2rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        font-weight: 600;
    }
    
    .alert-success i {
        font-size: 1.25rem;
        color: #059669;
    }
    
    .empty-state {
        text-align: center;
        padding: 5rem 3rem;
        background: white;
        border-radius: 30px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
        position: relative;
        overflow: hidden;
    }
    
    .empty-state::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .empty-icon {
        width: 150px;
        height: 150px;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        border: 3px solid #e2e8f0;
    }
    
    .empty-icon i {
        font-size: 4rem;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .empty-state h3 {
        color: #1e293b;
        margin-bottom: 1rem;
        font-weight: 700;
        font-size: 2rem;
    }
    
    .empty-state p {
        color: #64748b;
        margin-bottom: 2.5rem;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
        font-size: 1.1rem;
        line-height: 1.6;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .search-container {
            margin: -3rem 1rem 0;
            padding: 2rem;
            border-radius: 25px;
        }
        
        .search-actions {
            flex-direction: column;
            gap: 1.5rem;
            align-items: stretch;
        }
        
        .filter-section {
            justify-content: center;
        }
        
        .section-header {
            flex-direction: column;
            gap: 1.5rem;
            align-items: flex-start;
        }
        
        .films-grid {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
        
        .film-actions {
            flex-direction: column;
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
        }
        
        .empty-state {
            padding: 3rem 2rem;
        }
        
        .empty-icon {
            width: 120px;
            height: 120px;
        }
        
        .empty-icon i {
            font-size: 3rem;
        }
    }
</style>

<!-- Hero Section -->
<div class="page-hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-film me-3"></i>
                Katalog Film
            </h1>
            <p class="hero-subtitle">
                Jelajahi koleksi film terbaik dari berbagai genre dan temukan film favorit Anda
            </p>
        </div>
    </div>
</div>

<div class="container">
    <!-- Search and Filter Container -->
    <div class="search-container">
        <div class="search-wrapper">
            <i class="fas fa-search search-icon"></i>
            <input type="text" 
                   class="search-input" 
                   id="searchInput"
                   placeholder="Cari film berdasarkan judul, genre, atau sutradara..."
                   value="{{ request('search') }}">
        </div>
        
        <div class="search-actions">
            <div class="filter-section">
                <span class="filter-label">Filter:</span>
                <div class="filter-buttons">
                    <a href="{{ route('films.index') }}" 
                       class="filter-btn {{ !request('category') ? 'active' : '' }}" 
                       data-filter="all">
                        <i class="fas fa-list"></i>
                        Semua
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('films.index', ['category' => $category->id]) }}" 
                           class="filter-btn {{ request('category') == $category->id ? 'active' : '' }}" 
                           data-filter="{{ strtolower($category->name) }}">
                            <i class="fas fa-tag"></i>
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
            
            @auth
                <a href="{{ route('films.create') }}" class="btn-add-new">
                    <i class="fas fa-plus"></i>
                    Tambah Film Baru
                </a>
            @endauth
        </div>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- Stats Section -->
    @if($films->count() > 0)
        <div class="stats-section">
            <div class="stats-grid">
                <div class="stat-card">
                    <span class="stat-number">{{ $films->count() }}</span>
                    <span class="stat-label">Total Film</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $films->unique('genre')->count() }}</span>
                    <span class="stat-label">Genre</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $films->unique('director')->count() }}</span>
                    <span class="stat-label">Sutradara</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $films->max('release_year') ?? date('Y') }}</span>
                    <span class="stat-label">Terbaru</span>
                </div>
            </div>
        </div>
    @endif

    <!-- Films Section -->
    <div class="films-section">
        <div class="section-header">
            <h2 class="section-title">Koleksi Film</h2>
            <div class="view-toggle">
                <button class="view-btn active" data-view="grid">
                    <i class="fas fa-th"></i>
                </button>
                <button class="view-btn" data-view="list">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>

        <div class="films-grid" id="filmsGrid">
            @forelse($films as $film)
                <div class="film-card film-item" 
                     data-title="{{ strtolower($film->title) }}" 
                     data-genre="{{ strtolower($film->genre) }}" 
                     data-director="{{ strtolower($film->director) }}">
                    
                    <div class="film-poster">
                        @if($film->poster)
                            <img src="{{ asset('storage/' . $film->poster) }}" 
                                 alt="{{ $film->title }}"
                                 loading="lazy">
                        @else
                            <div class="no-image">
                                <i class="fas fa-film"></i>
                                <span>No Image</span>
                            </div>
                        @endif
                        <div class="film-year-badge">{{ $film->release_year }}</div>
                    </div>
                    
                    <div class="film-content">
                        <h3 class="film-title">{{ $film->title }}</h3>
                        
                        <div class="film-meta">
                            <div class="meta-item">
                                <i class="fas fa-tags"></i>
                                <span>{{ $film->genre }}</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-user-tie"></i>
                                <span>{{ $film->director }}</span>
                            </div>
                            @if($film->categories->count() > 0)
                                <div class="meta-item">
                                    <i class="fas fa-th-large"></i>
                                    <span>{{ $film->categories->pluck('name')->join(', ') }}</span>
                                </div>
                            @endif
                        </div>
                        
                        <div class="film-actions">
                            <a href="{{ route('films.show', $film->id) }}" class="btn-action btn-primary">
                                <i class="fas fa-eye"></i>
                                Detail
                            </a>
                            @auth
                                <a href="{{ route('films.edit', $film->id) }}" class="btn-action btn-warning">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>
                                <form action="{{ route('films.destroy', $film->id) }}" method="POST" style="flex: 1;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-danger w-100" 
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus film {{ $film->title }}?')">
                                        <i class="fas fa-trash"></i>
                                        Hapus
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-film"></i>
                    </div>
                    <h3>Belum Ada Film</h3>
                    <p>Katalog film masih kosong. Mulai tambahkan film favorit Anda dan bangun koleksi yang menakjubkan!</p>
                    @auth
                        <a href="{{ route('films.create') }}" class="btn-add-new">
                            <i class="fas fa-plus me-2"></i>
                            Tambahkan Film Pertama
                        </a>
                    @endauth
                </div>
            @endforelse
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const filmItems = document.querySelectorAll('.film-item');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            filmItems.forEach(function(item) {
                const title = item.dataset.title;
                const genre = item.dataset.genre;
                const director = item.dataset.director;
                
                if (title.includes(searchTerm) || 
                    genre.includes(searchTerm) || 
                    director.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
            
            // Update stats
            updateStats();
        });
    }
    
    // View toggle functionality
    const viewBtns = document.querySelectorAll('.view-btn');
    const filmsGrid = document.getElementById('filmsGrid');
    
    viewBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            viewBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            const view = this.dataset.view;
            if (view === 'list') {
                filmsGrid.style.gridTemplateColumns = '1fr';
            } else {
                filmsGrid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(300px, 1fr))';
            }
        });
    });
    
    // Update stats based on visible films
    function updateStats() {
        const visibleFilms = document.querySelectorAll('.film-item[style="display: block"], .film-item:not([style*="display: none"])');
        const statNumbers = document.querySelectorAll('.stat-number');
        
        if (statNumbers.length > 0) {
            statNumbers[0].textContent = visibleFilms.length;
        }
    }
    
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
});
</script>

@endsection