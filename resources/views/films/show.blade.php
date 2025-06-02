@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">{{ $film->title }}</h2>

    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }}" class="img-fluid rounded shadow-sm">
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">{{ $film->title }} ({{ $film->release_year }})</h5>
                        <div>
                            <a href="{{ route('films.edit', $film) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('films.destroy', $film) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>

                    <p><strong>Director:</strong> {{ $film->director }}</p>
                    <p><strong>Genre:</strong> {{ $film->genre }}</p>
                    <p><strong>Release Year:</strong> {{ $film->release_year }}</p>

                    <div class="mt-4">
                        <h5>Deskripsi</h5>@extends('layouts.app')

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
    
    .content-container {
        margin: -3rem auto 3rem;
        position: relative;
        z-index: 3;
        max-width: 1200px;
    }
    
    .film-poster {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        background: #f8fafc;
        height: 500px;
    }
    
    .film-poster img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .film-poster:hover img {
        transform: scale(1.02);
    }
    
    .no-image-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #94a3b8;
        flex-direction: column;
        gap: 1rem;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    }
    
    .no-image-placeholder i {
        font-size: 4rem;
        opacity: 0.5;
    }
    
    .film-info-card {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        border: 1px solid #f1f5f9;
        height: 100%;
    }
    
    .film-title-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f1f5f9;
    }
    
    .film-title {
        font-size: 2rem;
        font-weight: 800;
        color: #1e293b;
        margin: 0;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.2;
    }
    
    .film-year {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: inline-block;
    }
    
    .action-buttons {
        display: flex;
        gap: 0.75rem;
    }
    
    .btn-custom {
        padding: 0.5rem 1.25rem;
        font-weight: 600;
        border-radius: 20px;
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
    
    .btn-danger-custom {
        background: #ef4444;
        color: white;
        box-shadow: 0 4px 15px rgba(239, 68, 68, 0.3);
    }
    
    .btn-danger-custom:hover {
        background: #dc2626;
        transform: translateY(-2px);
    }
    
    .film-details {
        margin-bottom: 2rem;
    }
    
    .detail-item {
        display: flex;
        margin-bottom: 1rem;
        padding: 0.75rem 0;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .detail-item:last-child {
        border-bottom: none;
    }
    
    .detail-label {
        font-weight: 600;
        color: #667eea;
        min-width: 120px;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .detail-label i {
        font-size: 0.875rem;
    }
    
    .detail-value {
        color: #374151;
        font-weight: 500;
    }
    
    .description-section {
        margin: 2rem 0;
    }
    
    .section-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .section-title i {
        color: #667eea;
    }
    
    .description-text {
        color: #64748b;
        line-height: 1.7;
        margin: 0;
        font-size: 1rem;
    }
    
    .categories-section {
        margin: 2rem 0;
    }
    
    .category-badge {
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        color: #667eea;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        margin-right: 0.5rem;
        margin-bottom: 0.5rem;
        display: inline-block;
        border: 2px solid #e0e7ff;
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }
    
    .category-badge:hover {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }
    
    .back-button {
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 2px solid #f1f5f9;
    }
    
    .btn-primary-custom {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 0.75rem 2rem;
        font-weight: 600;
        border-radius: 25px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }
    
    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
    }
    
    .comments-section {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        border: 1px solid #f1f5f9;
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .comments-header {
        background: #f8fafc;
        padding: 1.5rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        border-left: 4px solid #667eea;
    }
    
    .comments-title {
        color: #1e293b;
        font-weight: 700;
        margin: 0;
        font-size: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .comments-title i {
        color: #667eea;
    }
    
    .comment-form {
        background: #f8fafc;
        border-radius: 15px;
        padding: 2rem;
        margin-bottom: 2rem;
        border: 1px solid #e2e8f0;
    }
    
    .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .form-label i {
        color: #667eea;
        font-size: 0.875rem;
    }
    
    .form-control {
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 0.875rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: white;
    }
    
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        background-color: white;
        outline: none;
    }
    
    .comments-list {
        margin-top: 2rem;
    }
    
    .comments-count {
        font-size: 1.125rem;
        font-weight: 600;
        color: #374151;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
        border-bottom: 2px solid #f1f5f9;
    }
    
    .comment-item {
        background: white;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }
    
    .comment-item:hover {
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        transform: translateY(-2px);
    }
    
    .comment-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        padding-bottom: 0.75rem;
        border-bottom: 1px solid #f1f5f9;
    }
    
    .comment-author {
        font-weight: 700;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .comment-author i {
        color: #667eea;
    }
    
    .comment-date {
        color: #64748b;
        font-size: 0.875rem;
    }
    
    .comment-content p {
        color: #374151;
        line-height: 1.6;
        margin: 0;
    }
    
    .comment-actions {
        display: flex;
        gap: 0.75rem;
        margin-top: 1rem;
    }
    
    .btn-sm-custom {
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        border-radius: 20px;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .btn-edit {
        background: #f59e0b;
        color: white;
        border: 2px solid #f59e0b;
    }
    
    .btn-edit:hover {
        background: #d97706;
        border-color: #d97706;
        transform: translateY(-1px);
    }
    
    .btn-delete {
        background: #ef4444;
        color: white;
        border: 2px solid #ef4444;
    }
    
    .btn-delete:hover {
        background: #dc2626;
        border-color: #dc2626;
        transform: translateY(-1px);
    }
    
    .btn-success-custom {
        background: #10b981;
        color: white;
        border: 2px solid #10b981;
    }
    
    .btn-success-custom:hover {
        background: #059669;
        border-color: #059669;
        transform: translateY(-1px);
    }
    
    .btn-secondary-custom {
        background: #6b7280;
        color: white;
        border: 2px solid #6b7280;
    }
    
    .btn-secondary-custom:hover {
        background: #4b5563;
        border-color: #4b5563;
        transform: translateY(-1px);
    }
    
    .edit-comment-form {
        background: #f8fafc;
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 1rem;
        border: 1px solid #e2e8f0;
    }
    
    .empty-comments {
        text-align: center;
        padding: 3rem 2rem;
        color: #64748b;
        background: #f8fafc;
        border-radius: 15px;
        border: 1px solid #e2e8f0;
    }
    
    .empty-comments i {
        font-size: 3rem;
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .content-container {
            margin: -2rem 1rem 2rem;
        }
        
        .film-info-card {
            padding: 1.5rem;
            margin-top: 2rem;
        }
        
        .film-title {
            font-size: 1.5rem;
        }
        
        .film-title-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .action-buttons {
            width: 100%;
        }
        
        .btn-custom {
            flex: 1;
            justify-content: center;
        }
        
        .comments-section {
            margin: 0 1rem;
            padding: 1.5rem;
        }
        
        .comment-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
        
        .comment-actions {
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
                Detail Film
            </h1>
            <p class="hero-subtitle">
                Informasi lengkap tentang film pilihan Anda
            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class="content-container">
        <div class="row">
            <!-- Poster Section -->
            <div class="col-md-4 mb-4">
                <div class="film-poster">
                    @if($film->poster)
                        <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }}">
                    @else
                        <div class="no-image-placeholder">
                            <i class="fas fa-film"></i>
                            <span>No Image Available</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Film Info Section -->
            <div class="col-md-8">
                <div class="film-info-card">
                    <div class="film-title-header">
                        <div>
                            <h2 class="film-title">{{ $film->title }}</h2>
                            <div class="film-year">{{ $film->release_year }}</div>
                        </div>
                        <div class="action-buttons">
                            <a href="{{ route('films.edit', $film) }}" class="btn-custom btn-warning-custom">
                                <i class="fas fa-edit"></i>
                                Edit
                            </a>
                            <form action="{{ route('films.destroy', $film) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-custom btn-danger-custom" 
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus film {{ $film->title }}?')">
                                    <i class="fas fa-trash"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="film-details">
                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-user-tie"></i>
                                Director:
                            </div>
                            <div class="detail-value">{{ $film->director }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-tags"></i>
                                Genre:
                            </div>
                            <div class="detail-value">{{ $film->genre }}</div>
                        </div>
                        
                        <div class="detail-item">
                            <div class="detail-label">
                                <i class="fas fa-calendar-alt"></i>
                                Release Year:
                            </div>
                            <div class="detail-value">{{ $film->release_year }}</div>
                        </div>
                    </div>

                    <div class="description-section">
                        <h5 class="section-title">
                            <i class="fas fa-file-alt"></i>
                            Deskripsi
                        </h5>
                        <p class="description-text">{{ $film->description ?? 'Deskripsi film belum tersedia.' }}</p>
                    </div>

                    <div class="categories-section">
                        <h5 class="section-title">
                            <i class="fas fa-list"></i>
                            Kategori
                        </h5>
                        @forelse($film->categories as $category)
                            <span class="category-badge">{{ $category->name }}</span>
                        @empty
                            <span class="text-muted">Tidak ada kategori</span>
                        @endforelse
                    </div>

                    <div class="back-button">
                        <a href="{{ route('films.index') }}" class="btn-primary-custom">
                            <i class="fas fa-arrow-left"></i>
                            Kembali ke Katalog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="comments-section">
        <div class="comments-header">
            <h5 class="comments-title">
                <i class="fas fa-comments"></i>
                Komentar
            </h5>
        </div>

        <!-- Comment Form -->
        <div class="comment-form">
            <form action="{{ route('comments.store', $film) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">
                        <i class="fas fa-user"></i>
                        Nama
                    </label>
                    <input type="text" name="name" class="form-control" required placeholder="Masukkan nama Anda">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">
                        <i class="fas fa-comment"></i>
                        Komentar
                    </label>
                    <textarea name="content" class="form-control" rows="3" required 
                              placeholder="Bagikan pendapat Anda tentang film ini..."></textarea>
                </div>
                <button type="submit" class="btn-primary-custom">
                    <i class="fas fa-paper-plane"></i>
                    Kirim Komentar
                </button>
            </form>
        </div>

        <!-- Comments List -->
        <div class="comments-list">
            <h6 class="comments-count">{{ $comments->count() }} Komentar</h6>
            
            @forelse($comments as $comment)
                <div class="comment-item" id="comment-{{ $comment->id }}">
                    <div class="comment-header">
                        <div class="comment-author">
                            <i class="fas fa-user-circle"></i>
                            {{ $comment->name }}
                        </div>
                        <div class="comment-date">{{ $comment->created_at->diffForHumans() }}</div>
                    </div>

                    <div class="comment-content">
                        <p>{{ $comment->content }}</p>
                    </div>

                    <div class="comment-actions">
                        <button class="btn-sm-custom btn-edit edit-comment-btn"
                                data-comment-id="{{ $comment->id }}">
                            <i class="fas fa-edit"></i>
                            Edit
                        </button>
                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-sm-custom btn-delete"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus komentar ini?')">
                                <i class="fas fa-trash"></i>
                                Hapus
                            </button>
                        </form>
                    </div>

                    <!-- Edit Form -->
                    <div class="edit-comment-form" id="edit-form-{{ $comment->id }}" style="display: none;">
                        <form action="{{ route('comments.update', $comment) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <textarea name="content" class="form-control" rows="3" required>{{ $comment->content }}</textarea>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn-sm-custom btn-success-custom">
                                    <i class="fas fa-save"></i>
                                    Simpan
                                </button>
                                <button type="button" class="btn-sm-custom btn-secondary-custom cancel-edit" 
                                        data-comment-id="{{ $comment->id }}">
                                    <i class="fas fa-times"></i>
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @empty
                <div class="empty-comments">
                    <i class="fas fa-comment-slash"></i>
                    <h6>Belum ada komentar</h6>
                    <p>Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<!-- JavaScript untuk Edit Komentar -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const editButtons = document.querySelectorAll('.edit-comment-btn');
    editButtons.forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            document.querySelector(`#comment-${commentId} .comment-content`).style.display = 'none';
            document.querySelector(`#comment-${commentId} .comment-actions`).style.display = 'none';
            document.querySelector(`#edit-form-${commentId}`).style.display = 'block';
        });
    });

    const cancelButtons = document.querySelectorAll('.cancel-edit');
    cancelButtons.forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            document.querySelector(`#comment-${commentId} .comment-content`).style.display = 'block';
            document.querySelector(`#comment-${commentId} .comment-actions`).style.display = 'flex';
            document.querySelector(`#edit-form-${commentId}`).style.display = 'none';
        });
    });
});
</script>

@endsection

                        <p>{{ $film->description }}</p>
                    </div>

                    <div class="mt-4">
                        <h5>Kategori</h5>
                        @foreach($film->categories as $category)
                            <span class="badge bg-secondary">{{ $category->name }}</span>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('films.index') }}" class="btn btn-outline-primary">Kembali ke Katalog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Komentar -->
    <div class="mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">Komentar</h5>
            </div>
            <div class="card-body">

                <!-- Form Tambah Komentar -->
                <form action="{{ route('comments.store', $film) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Komentar</label>
                        <textarea name="content" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Kirim Komentar</button>
                </form>

                <!-- Daftar Komentar -->
                <div class="mt-4">
                    <h6>{{ $comments->count() }} Komentar</h6>
                    <hr>
                    @if($comments->count() > 0)
                        @foreach($comments as $comment)
                            <div class="border rounded p-3 mb-3 bg-white" id="comment-{{ $comment->id }}">
                                <div class="d-flex justify-content-between mb-2">
                                    <strong>{{ $comment->name }}</strong>
                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>

                                <div class="comment-content">
                                    <p class="mb-2">{{ $comment->content }}</p>
                                </div>

                                <div class="comment-actions d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary edit-comment-btn"
                                            data-comment-id="{{ $comment->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>

                                <!-- Form Edit Komentar -->
                                <div class="edit-comment-form mt-3" id="edit-form-{{ $comment->id }}" style="display: none;">
                                    <form action="{{ route('comments.update', $comment) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-2">
                                            <textarea name="content" class="form-control" rows="3" required>{{ $comment->content }}</textarea>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                            <button type="button" class="btn btn-sm btn-secondary cancel-edit" data-comment-id="{{ $comment->id }}">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Edit Komentar -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-comment-btn');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                document.querySelector(`#comment-${commentId} .comment-content`).style.display = 'none';
                document.querySelector(`#comment-${commentId} .comment-actions`).style.display = 'none';
                document.querySelector(`#edit-form-${commentId}`).style.display = 'block';
            });
        });

        const cancelButtons = document.querySelectorAll('.cancel-edit');
        cancelButtons.forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                document.querySelector(`#comment-${commentId} .comment-content`).style.display = 'block';
                document.querySelector(`#comment-${commentId} .comment-actions`).style.display = 'flex';
                document.querySelector(`#edit-form-${commentId}`).style.display = 'none';
            });
        });
    });
</script>
@endsection
