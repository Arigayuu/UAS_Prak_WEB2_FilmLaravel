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
        padding: 3rem 0 5rem 0;
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
        height: 80px;
        background: linear-gradient(180deg, transparent, rgba(248, 250, 252, 0.1));
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
    }
    
    .hero-title {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #ffffff, #e2e8f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
        color: #e2e8f0;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }
    
    .film-container {
        background: white;
        border-radius: 30px;
        padding: 3rem;
        margin: -3rem auto 0;
        position: relative;
        z-index: 3;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.1);
        border: 1px solid #f1f5f9;
    }
    
    .poster-container {
        position: relative;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border: 4px solid white;
    }
    
    .poster-container img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.3s ease;
    }
    
    .poster-container:hover img {
        transform: scale(1.05);
    }
    
    .no-poster {
        aspect-ratio: 2/3;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        color: #94a3b8;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    }
    
    .no-poster i {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    .no-poster span {
        font-weight: 600;
        font-size: 1.1rem;
    }
    
    .film-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 2rem;
        line-height: 1.2;
    }
    
    .film-meta {
        margin-bottom: 2.5rem;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1rem;
        padding: 1rem 1.5rem;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 15px;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }
    
    .meta-item:hover {
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        border-color: #4f46e5;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.1);
    }
    
    .meta-icon {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.1rem;
        flex-shrink: 0;
    }
    
    .meta-content {
        flex: 1;
    }
    
    .meta-label {
        font-size: 0.875rem;
        color: #64748b;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
    }
    
    .meta-value {
        font-size: 1.1rem;
        color: #1e293b;
        font-weight: 600;
    }
    
    .rating-section {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2.5rem;
        border: 2px solid #e2e8f0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .rating-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .rating-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.75rem;
    }
    
    .rating-title i {
        color: #4f46e5;
        font-size: 1.5rem;
    }
    
    .rating-display {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 1rem;
    }
    
    .rating-stars {
        display: flex;
        gap: 0.25rem;
    }
    
    .rating-stars i {
        font-size: 1.5rem;
        color: #fbbf24;
        text-shadow: 0 2px 4px rgba(251, 191, 36, 0.3);
        transition: transform 0.2s ease;
    }
    
    .rating-stars i:hover {
        transform: scale(1.2);
    }
    
    .rating-stars i.fa-star-o {
        color: #d1d5db;
    }
    
    .rating-number {
        font-size: 2rem;
        font-weight: 700;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .rating-count {
        color: #64748b;
        font-size: 0.9rem;
        font-weight: 500;
    }
    
    .description-section {
        margin-bottom: 2.5rem;
    }
    
    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f1f5f9;
        position: relative;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 60px;
        height: 2px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .section-title i {
        color: #4f46e5;
        font-size: 1.25rem;
    }
    
    .description-text {
        font-size: 1.1rem;
        line-height: 1.7;
        color: #374151;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        padding: 2rem;
        border-radius: 15px;
        border: 1px solid #e2e8f0;
    }
    
    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-bottom: 2.5rem;
        flex-wrap: wrap;
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
        white-space: nowrap;
    }
    
    .btn-primary-custom {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
    }
    
    .btn-primary-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(79, 70, 229, 0.4);
        color: white;
        background: linear-gradient(135deg, #4338ca, #6d28d9);
    }
    
    .btn-success-custom {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
    }
    
    .btn-success-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(16, 185, 129, 0.4);
        color: white;
        background: linear-gradient(135deg, #059669, #047857);
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
    
    .btn-danger-custom {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        box-shadow: 0 5px 15px rgba(239, 68, 68, 0.3);
    }
    
    .btn-danger-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(239, 68, 68, 0.4);
        background: linear-gradient(135deg, #dc2626, #b91c1c);
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
    
    .rating-form-card, .reviews-card {
        background: white;
        border-radius: 25px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
        position: relative;
        overflow: hidden;
    }
    
    .rating-form-card::before, .reviews-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .card-title i {
        color: #4f46e5;
        font-size: 1.25rem;
    }
    
    .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-label i {
        color: #4f46e5;
        font-size: 1rem;
    }
    
    .form-control, .form-select {
        border: 2px solid #e5e7eb;
        border-radius: 15px;
        padding: 1rem 1.25rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #f9fafb;
        font-weight: 500;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        background-color: white;
        outline: none;
    }
    
    .interactive-rating {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1.5rem;
        justify-content: center;
    }
    
    .interactive-rating .star {
        font-size: 2rem;
        color: #d1d5db;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .interactive-rating .star:hover,
    .interactive-rating .star.active {
        color: #fbbf24;
        transform: scale(1.1);
    }
    
    .review-item {
        padding: 2rem;
        border-radius: 20px;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border: 1px solid #e2e8f0;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .review-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 4px;
        height: 100%;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        transform: scaleY(0);
        transition: transform 0.3s ease;
    }
    
    .review-item:hover {
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        border-color: #4f46e5;
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(79, 70, 229, 0.1);
    }
    
    .review-item:hover::before {
        transform: scaleY(1);
    }
    
    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .reviewer-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .reviewer-avatar {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1.25rem;
    }
    
    .reviewer-name {
        font-weight: 700;
        color: #1e293b;
        font-size: 1.1rem;
    }
    
    .review-date {
        color: #64748b;
        font-size: 0.875rem;
        font-weight: 500;
    }
    
    .review-rating {
        display: flex;
        gap: 0.25rem;
        margin-bottom: 1rem;
    }
    
    .review-rating i {
        font-size: 1.1rem;
        color: #fbbf24;
    }
    
    .review-rating i.fa-star-o {
        color: #d1d5db;
    }
    
    .review-comment {
        color: #374151;
        line-height: 1.6;
        font-size: 1rem;
        margin: 0;
    }
    
    .empty-reviews {
        text-align: center;
        padding: 3rem 2rem;
        color: #64748b;
    }
    
    .empty-reviews i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    .empty-reviews h4 {
        color: #1e293b;
        margin-bottom: 0.5rem;
    }
    
    .success-alert {
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
    
    .success-alert i {
        font-size: 1.25rem;
        color: #059669;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .film-container {
            margin: -2rem 1rem 0;
            padding: 2rem;
            border-radius: 25px;
        }
        
        .film-title {
            font-size: 2rem;
        }
        
        .action-buttons {
            flex-direction: column;
        }
        
        .btn-custom {
            justify-content: center;
        }
        
        .rating-form-card, .reviews-card {
            padding: 2rem;
        }
        
        .review-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
        
        .interactive-rating {
            justify-content: flex-start;
        }
    }
</style>

<!-- Hero Section -->
<div class="page-hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-film me-3"></i>
                Detail Film
            </h1>
            <p class="hero-subtitle">
                Informasi lengkap tentang film dan ulasan dari pengguna lain
            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class="film-container">
        <!-- Success Alert -->
        @if(session('success'))
            <div class="success-alert">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <!-- Poster Column -->
            <div class="col-lg-4 col-md-5 mb-4">
                <div class="poster-container">
                    @if($film->poster)
                        <img src="{{ asset('storage/' . $film->poster) }}" 
                             alt="{{ $film->title }}" 
                             loading="lazy">
                    @else
                        <div class="no-poster">
                            <i class="fas fa-film"></i>
                            <span>No Poster Available</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Content Column -->
            <div class="col-lg-8 col-md-7">
                <h1 class="film-title">{{ $film->title }}</h1>
                
                <!-- Film Meta Information -->
                <div class="film-meta">
                    <div class="meta-item">
                        <div class="meta-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="meta-content">
                            <div class="meta-label">Tahun Rilis</div>
                            <div class="meta-value">{{ $film->release_year }}</div>
                        </div>
                    </div>
                    
                    <div class="meta-item">
                        <div class="meta-icon">
                            <i class="fas fa-user-tie"></i>
                        </div>
                        <div class="meta-content">
                            <div class="meta-label">Sutradara</div>
                            <div class="meta-value">{{ $film->director }}</div>
                        </div>
                    </div>
                    
                    <div class="meta-item">
                        <div class="meta-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <div class="meta-content">
                            <div class="meta-label">Genre</div>
                            <div class="meta-value">{{ $film->genre }}</div>
                        </div>
                    </div>

                    @if($film->categories->count() > 0)
                        <div class="meta-item">
                            <div class="meta-icon">
                                <i class="fas fa-th-large"></i>
                            </div>
                            <div class="meta-content">
                                <div class="meta-label">Kategori</div>
                                <div class="meta-value">{{ $film->categories->pluck('name')->join(', ') }}</div>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Rating Display -->
                <div class="rating-section">
                    <div class="rating-title">
                        <i class="fas fa-star"></i>
                        Rating Film
                    </div>
                    <div class="rating-display">
                        <div class="rating-stars">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star{{ $i <= round($film->average_rating ?? 0) ? '' : '-o' }}"></i>
                            @endfor
                        </div>
                        <div class="rating-number">{{ number_format($film->average_rating ?? 0, 1) }}</div>
                    </div>
                    <div class="rating-count">
                        Berdasarkan {{ $film->ratings->count() }} ulasan
                    </div>
                </div>

                <!-- Description -->
                <div class="description-section">
                    <h3 class="section-title">
                        <i class="fas fa-align-left"></i>
                        Deskripsi Film
                    </h3>
                    <div class="description-text">
                        {{ $film->description }}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    @auth
                        <form action="{{ route('watchlist.store', $film) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn-custom btn-success-custom">
                                <i class="fas fa-plus"></i>
                                Tambah ke Watchlist
                            </button>
                        </form>
                    @endauth
                    
                    @if(auth()->check() && auth()->user()->id === $film->user_id)
                        <a href="{{ route('films.edit', $film) }}" class="btn-custom btn-warning-custom">
                            <i class="fas fa-edit"></i>
                            Edit Film
                        </a>
                        <form action="{{ route('films.destroy', $film) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-custom btn-danger-custom" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus film {{ $film->title }}?')">
                                <i class="fas fa-trash"></i>
                                Hapus Film
                            </button>
                        </form>
                    @endif
                    
                    <a href="{{ route('films.index') }}" class="btn-custom btn-secondary-custom">
                        <i class="fas fa-arrow-left"></i>
                        Kembali ke Katalog
                    </a>
                </div>
            </div>
        </div>

        <!-- Rating Form -->
        @auth
            <div class="rating-form-card">
                <h3 class="card-title">
                    <i class="fas fa-star-half-alt"></i>
                    Beri Rating untuk Film Ini
                </h3>
                <form action="{{ route('ratings.store', $film) }}" method="POST" id="ratingForm">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label">
                            <i class="fas fa-star"></i>
                            Rating Anda
                        </label>
                        <div class="interactive-rating" id="interactiveRating">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="fas fa-star star" data-rating="{{ $i }}"></i>
                            @endfor
                        </div>
                        <input type="hidden" name="rating" id="ratingInput" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="comment" class="form-label">
                            <i class="fas fa-comment"></i>
                            Ulasan Anda (Opsional)
                        </label>
                        <textarea name="comment" 
                                  id="comment" 
                                  class="form-control" 
                                  rows="4"
                                  placeholder="Bagikan pendapat Anda tentang film ini..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn-custom btn-primary-custom" id="submitRating" disabled>
                        <i class="fas fa-paper-plane"></i>
                        Kirim Rating
                    </button>
                </form>
            </div>
        @endauth

        <!-- User Reviews -->
        <div class="reviews-card">
            <h3 class="card-title">
                <i class="fas fa-comments"></i>
                Ulasan Pengguna ({{ $film->ratings->count() }})
            </h3>
            
            @forelse($film->ratings as $rating)
                <div class="review-item">
                    <div class="review-header">
                        <div class="reviewer-info">
                            <div class="reviewer-avatar">
                                {{ strtoupper(substr($rating->user->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="reviewer-name">{{ $rating->user->name }}</div>
                                <div class="review-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star{{ $i <= $rating->rating ? '' : '-o' }}"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="review-date">{{ $rating->created_at->diffForHumans() }}</div>
                    </div>
                    
                    @if($rating->comment)
                        <p class="review-comment">{{ $rating->comment }}</p>
                    @endif
                </div>
            @empty
                <div class="empty-reviews">
                    <i class="fas fa-comment-slash"></i>
                    <h4>Belum Ada Ulasan</h4>
                    <p>Jadilah yang pertama memberikan ulasan untuk film ini!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Interactive Rating System
    const stars = document.querySelectorAll('.interactive-rating .star');
    const ratingInput = document.getElementById('ratingInput');
    const submitButton = document.getElementById('submitRating');
    let selectedRating = 0;

    stars.forEach((star, index) => {
        star.addEventListener('mouseenter', function() {
            highlightStars(index + 1);
        });

        star.addEventListener('mouseleave', function() {
            highlightStars(selectedRating);
        });

        star.addEventListener('click', function() {
            selectedRating = index + 1;
            ratingInput.value = selectedRating;
            highlightStars(selectedRating);
            
            if (submitButton) {
                submitButton.disabled = false;
            }
        });
    });

    function highlightStars(rating) {
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }

    // Form submission with loading state
    const ratingForm = document.getElementById('ratingForm');
    if (ratingForm) {
        ratingForm.addEventListener('submit', function() {
            if (submitButton) {
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
                submitButton.disabled = true;
            }
        });
    }

    // Smooth scroll to rating form when clicking rate button
    const rateButtons = document.querySelectorAll('[data-action="rate"]');
    rateButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const ratingForm = document.getElementById('ratingForm');
            if (ratingForm) {
                ratingForm.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Auto-expand textarea
    const commentTextarea = document.getElementById('comment');
    if (commentTextarea) {
        commentTextarea.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    }

    // Animate review items on scroll
    const reviewItems = document.querySelectorAll('.review-item');
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

    reviewItems.forEach(item => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(20px)';
        item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(item);
    });
});
</script>

@endsection