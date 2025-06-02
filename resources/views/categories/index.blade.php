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
    
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #f1f5f9;
    }
    
    .page-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
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
    }
    
    .btn-add-new:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
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
    
    .categories-table {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        border: 1px solid #f1f5f9;
    }
    
    .table {
        margin: 0;
    }
    
    .table thead th {
        background: #f8fafc;
        border: none;
        padding: 1.5rem 1.25rem;
        font-weight: 600;
        color: #374151;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.875rem;
        border-bottom: 2px solid #e2e8f0;
    }
    
    .table tbody td {
        padding: 1.25rem;
        border: none;
        border-bottom: 1px solid #f1f5f9;
        color: #374151;
        font-weight: 500;
    }
    
    .table tbody tr:hover {
        background: #f8fafc;
    }
    
    .table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .category-name {
        font-weight: 600;
        color: #1e293b;
        font-size: 1rem;
    }
    
    .films-count {
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        color: #667eea;
        padding: 0.25rem 0.75rem;
        border-radius: 15px;
        font-weight: 600;
        font-size: 0.875rem;
        display: inline-block;
    }
    
    .action-buttons {
        display: flex;
        gap: 0.5rem;
    }
    
    .btn-action {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.875rem;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }
    
    .btn-info-custom {
        background: #667eea;
        color: white;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
    }
    
    .btn-info-custom:hover {
        background: #5a67d8;
        color: white;
        text-decoration: none;
        transform: translateY(-1px);
    }
    
    .btn-warning-custom {
        background: #f59e0b;
        color: white;
        box-shadow: 0 2px 8px rgba(245, 158, 11, 0.3);
    }
    
    .btn-warning-custom:hover {
        background: #d97706;
        color: white;
        text-decoration: none;
        transform: translateY(-1px);
    }
    
    .btn-danger-custom {
        background: #ef4444;
        color: white;
        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
    }
    
    .btn-danger-custom:hover {
        background: #dc2626;
        transform: translateY(-1px);
    }
    
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #64748b;
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
    
    .pagination-wrapper {
        margin-top: 2rem;
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
        
        .page-header {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }
        
        .action-buttons {
            flex-direction: column;
            width: 100%;
        }
        
        .btn-action {
            justify-content: center;
        }
        
        .table-responsive {
            border-radius: 15px;
        }
    }
</style>

<!-- Hero Section -->
<div class="page-hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-tags me-3"></i>
                Kategori Film
            </h1>
            <p class="hero-subtitle">
                Kelola kategori film untuk mengorganisir koleksi Anda dengan lebih baik
            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class="content-container">
        <div class="page-header">
            <h2 class="page-title">Daftar Kategori</h2>
            <a href="{{ route('categories.create') }}" class="btn-add-new">
                <i class="fas fa-plus"></i>
                Tambah Kategori
            </a>
        </div>

        @if (session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
        @endif

        <div class="categories-table">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-tag me-2"></i>Nama Kategori</th>
                            <th><i class="fas fa-film me-2"></i>Jumlah Film</th>
                            <th><i class="fas fa-cogs me-2"></i>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>
                                    <div class="category-name">{{ $category->name }}</div>
                                </td>
                                <td>
                                    <span class="films-count">{{ $category->films_count }} Film</span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('categories.show', $category) }}" class="btn-action btn-info-custom">
                                            <i class="fas fa-eye"></i>
                                            Lihat
                                        </a>
                                        <a href="{{ route('categories.edit', $category) }}" class="btn-action btn-warning-custom">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-action btn-danger-custom" 
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kategori {{ $category->name }}?')">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">
                                    <div class="empty-state">
                                        <i class="fas fa-tags"></i>
                                        <h3>Belum Ada Kategori</h3>
                                        <p>Belum ada kategori yang dibuat. Mulai tambahkan kategori untuk mengorganisir film Anda!</p>
                                        <a href="{{ route('categories.create') }}" class="btn-add-new">
                                            <i class="fas fa-plus me-2"></i>
                                            Tambahkan Kategori Pertama
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($categories->hasPages())
            <div class="pagination-wrapper">
                {{ $categories->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

@endsection
