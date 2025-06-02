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
    
    .search-container {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin: -3rem auto 0;
        position: relative;
        z-index: 3;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        max-width: 1000px;
    }
    
    .search-wrapper {
        position: relative;
        margin-bottom: 1.5rem;
    }
    
    .search-input {
        width: 100%;
        padding: 1rem 1.5rem 1rem 3.5rem;
        border: 2px solid #e2e8f0;
        border-radius: 15px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f8fafc;
    }
    
    .search-input:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    
    .search-icon {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        font-size: 1.1rem;
    }
    
    .search-actions {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }
    
    .filter-buttons {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }
    
    .filter-btn {
        padding: 0.5rem 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 25px;
        background: white;
        color: #64748b;
        font-size: 0.875rem;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
        text-decoration: none;
    }
    
    .filter-btn:hover, .filter-btn.active {
        border-color: #667eea;
        background: #667eea;
        color: white;
        text-decoration: none;
    }
    
    .btn-add-new {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        display: flex;
        align-items: center;
        gap: 0.5rem;
        white-space: nowrap;
    }
    
    .btn-add-new:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
    }
    
    .stats-section {
        margin: 3rem 0;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        max-width: 1000px;
        margin: 0 auto;
    }
    
    .stat-card {
        background: white;
        padding: 2rem 1.5rem;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
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
        background: linear-gradient(135deg, #667eea, #764ba2);
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12);
    }
    
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea, #764ba2);
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
    
    .films-section {
        margin-top: 3rem;
    }
    
    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }
    
    .section-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
    }
    
    .view-toggle {
        display: flex;
        background: #f1f5f9;
        border-radius: 10px;
        padding: 0.25rem;
    }
    
    .view-btn {
        padding: 0.5rem 1rem;
        border: none;
        background: transparent;
        color: #64748b;
        border-radius: 8px;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .view-btn.active {
        background: white;
        color: #667eea;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .films-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 2rem;
    }
    
    .film-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        border: 1px solid #f1f5f9;
        position: relative;
    }
    
    .film-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
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
        transition: transform 0.3s ease;
    }
    
    .film-card:hover .film-poster img {
        transform: scale(1.05);
    }
    
    .film-year-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.875rem;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
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
        font-size: 3rem;
        opacity: 0.5;
    }
    
    .film-content {
        padding: 1.5rem;
    }
    
    .film-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .film-meta {
        margin-bottom: 1.5rem;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.5rem;
        color: #64748b;
        font-size: 0.875rem;
    }
    
    .meta-item i {
        color: #667eea;
        width: 16px;
        text-align: center;
    }
    
    .film-actions {
        display: flex;
        gap: 0.5rem;
        padding-top: 1rem;
        border-top: 1px solid #f1f5f9;
    }
    
    .btn-action {
        flex: 1;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.875rem;
        text-decoration: none;
        text-align: center;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn-primary {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #5a67d8, #6b46c1);
        color: white;
        text-decoration: none;
        transform: translateY(-1px);
    }
    
    .btn-warning {
        background: #f59e0b;
        color: white;
    }
    
    .btn-warning:hover {
        background: #d97706;
        color: white;
        text-decoration: none;
        transform: translateY(-1px);
    }
    
    .btn-danger {
        background: #ef4444;
        color: white;
    }
    
    .btn-danger:hover {
        background: #dc2626;
        transform: translateY(-1px);
    }
    
    .alert-success {
        background: linear-gradient(135deg, #d1fae5, #a7f3d0);
        border: 1px solid #6ee7b7;
        color: #065f46;
        padding: 1rem 1.5rem;
        border-radius: 12px;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }
    
    .empty-state i {
        font-size: 4rem;
        color: #cbd5e1;
        margin-bottom: 1.5rem;
    }
    
    .empty-state h3 {
        color: #374151;
        margin-bottom: 1rem;
        font-weight: 600;
    }
    
    .empty-state p {
        color: #6b7280;
        margin-bottom: 2rem;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .search-container {
            margin: -2rem 1rem 0;
            padding: 1.5rem;
        }
        
        .search-actions {
            flex-direction: column;
            gap: 1rem;
        }
        
        .filter-buttons {
            justify-content: center;
        }
        
        .section-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .films-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .film-actions {
            flex-direction: column;
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
    <!-- Search Section -->
    <div class="search-container">
        <div class="search-wrapper">
            <i class="fas fa-search search-icon"></i>
            <input type="text" class="search-input" placeholder="Cari film berdasarkan judul, genre, atau sutradara..." id="searchInput">
        </div>
        
        <div class="search-actions">
            <div class="filter-buttons">
                <a href="#" class="filter-btn active" data-filter="all">Semua</a>
                <a href="#" class="filter-btn" data-filter="action">SU</a>
                <a href="#" class="filter-btn" data-filter="drama">13+</a>
                <a href="#" class="filter-btn" data-filter="comedy">17+</a>
                <a href="#" class="filter-btn" data-filter="horror">21+</a>
            </div>
            
            <a href="{{ route('films.create') }}" class="btn-add-new">
                <i class="fas fa-plus"></i>
                Tambah Film Baru
            </a>
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
                            <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }}">
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
                        </div>
                        
                        <div class="film-actions">
                            <a href="{{ route('films.show', $film->id) }}" class="btn-action btn-primary">
                                <i class="fas fa-eye"></i>
                                Detail
                            </a>
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
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-film"></i>
                    <h3>Belum Ada Film</h3>
                    <p>Katalog film masih kosong. Mulai tambahkan film favorit Anda dan bangun koleksi yang menakjubkan!</p>
                    <a href="{{ route('films.create') }}" class="btn-add-new">
                        <i class="fas fa-plus me-2"></i>
                        Tambahkan Film Pertama
                    </a>
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
    });
    
    // Filter functionality
    const filterBtns = document.querySelectorAll('.filter-btn');
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Add active class to clicked button
            this.classList.add('active');
            
            const filter = this.dataset.filter;
            
            filmItems.forEach(item => {
                if (filter === 'all' || item.dataset.genre.includes(filter)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
    
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
                filmsGrid.style.gridTemplateColumns = 'repeat(auto-fill, minmax(280px, 1fr))';
            }
        });
    });
});
</script>

@endsection 