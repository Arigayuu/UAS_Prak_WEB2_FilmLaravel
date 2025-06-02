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
    
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 3rem;
        padding-bottom: 2rem;
        border-bottom: 2px solid #f1f5f9;
        position: relative;
    }
    
    .page-header::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 80px;
        height: 2px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .page-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .page-title i {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
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
    
    .stats-section {
        margin-bottom: 3rem;
    }
    
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
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
    
    .categories-table {
        background: white;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
        position: relative;
    }
    
    .categories-table::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .table {
        margin: 0;
    }
    
    .table thead th {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border: none;
        padding: 2rem 1.5rem;
        font-weight: 700;
        color: #1e293b;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        font-size: 0.875rem;
        border-bottom: 2px solid #e2e8f0;
        position: relative;
    }
    
    .table thead th i {
        color: #4f46e5;
        margin-right: 0.5rem;
        font-size: 1rem;
    }
    
    .table tbody td {
        padding: 1.5rem;
        border: none;
        border-bottom: 1px solid #f1f5f9;
        color: #374151;
        font-weight: 500;
        vertical-align: middle;
    }
    
    .table tbody tr {
        transition: all 0.3s ease;
    }
    
    .table tbody tr:hover {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        transform: scale(1.01);
    }
    
    .table tbody tr:last-child td {
        border-bottom: none;
    }
    
    .category-name {
        font-weight: 700;
        color: #1e293b;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .category-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
        flex-shrink: 0;
    }
    
    .films-count {
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        color: #4f46e5;
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-weight: 700;
        font-size: 0.875rem;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: 2px solid #c7d2fe;
    }
    
    .films-count i {
        font-size: 0.875rem;
    }
    
    .action-buttons {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }
    
    .btn-action {
        padding: 0.75rem 1.25rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.875rem;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        white-space: nowrap;
    }
    
    .btn-info-custom {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
    }
    
    .btn-info-custom:hover {
        background: linear-gradient(135deg, #4338ca, #6d28d9);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
    }
    
    .btn-warning-custom {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: white;
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    }
    
    .btn-warning-custom:hover {
        background: linear-gradient(135deg, #d97706, #b45309);
        color: white;
        text-decoration: none;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(245, 158, 11, 0.4);
    }
    
    .btn-danger-custom {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
    }
    
    .btn-danger-custom:hover {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(239, 68, 68, 0.4);
    }
    
    .empty-state {
        text-align: center;
        padding: 5rem 3rem;
        color: #64748b;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 25px;
        border: 2px solid #e2e8f0;
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
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
        font-size: 1.1rem;
        line-height: 1.6;
    }
    
    .search-container {
        margin-bottom: 2rem;
        position: relative;
    }
    
    .search-input {
        width: 100%;
        padding: 1rem 1.25rem 1rem 3.5rem;
        border: 2px solid #e2e8f0;
        border-radius: 25px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #f9fafb;
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
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        color: #64748b;
        font-size: 1.1rem;
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
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .content-container {
            margin: -3rem 1rem 0;
            padding: 2rem;
            border-radius: 25px;
        }
        
        .page-header {
            flex-direction: column;
            gap: 1.5rem;
            align-items: flex-start;
        }
        
        .page-title {
            font-size: 1.75rem;
        }
        
        .action-buttons {
            flex-direction: column;
            width: 100%;
        }
        
        .btn-action {
            justify-content: center;
        }
        
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .table-responsive {
            border-radius: 25px;
        }
        
        .table thead th,
        .table tbody td {
            padding: 1rem;
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
            <h2 class="page-title">
                <i class="fas fa-list"></i>
                Daftar Kategori
            </h2>
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

        <!-- Statistics -->
        @if($categories->count() > 0)
            <div class="stats-section">
                <div class="stats-grid">
                    <div class="stat-card">
                        <span class="stat-number">{{ $categories->count() }}</span>
                        <span class="stat-label">Total Kategori</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number">{{ $categories->sum('films_count') }}</span>
                        <span class="stat-label">Total Film</span>
                    </div>
                    <div class="stat-card">
                        <span class="stat-number">{{ $categories->where('films_count', '>', 0)->count() }}</span>
                        <span class="stat-label">Kategori Aktif</span>
                    </div>
                </div>
            </div>
        @endif

        <!-- Search -->
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input type="text" 
                   class="search-input" 
                   id="searchInput"
                   placeholder="Cari kategori...">
        </div>

        <!-- Categories Table -->
        <div class="categories-table">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-tag"></i>Nama Kategori</th>
                            <th><i class="fas fa-film"></i>Jumlah Film</th>
                            <th><i class="fas fa-cogs"></i>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="categoriesTableBody">
                        @forelse ($categories as $category)
                            <tr class="category-row" data-name="{{ strtolower($category->name) }}">
                                <td>
                                    <div class="category-name">
                                        <div class="category-icon">
                                            <i class="fas fa-tag"></i>
                                        </div>
                                        {{ $category->name }}
                                    </div>
                                </td>
                                <td>
                                    <span class="films-count">
                                        <i class="fas fa-film"></i>
                                        {{ $category->films_count }} Film
                                    </span>
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
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus kategori {{ $category->name }}? Semua film dalam kategori ini akan kehilangan kategori tersebut.')">
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
                                        <div class="empty-icon">
                                            <i class="fas fa-tags"></i>
                                        </div>
                                        <h3>Belum Ada Kategori</h3>
                                        <p>Belum ada kategori yang dibuat. Mulai tambahkan kategori untuk mengorganisir film Anda dengan lebih baik!</p>
                                        <a href="{{ route('categories.create') }}" class="btn-add-new">
                                            <i class="fas fa-plus"></i>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const categoryRows = document.querySelectorAll('.category-row');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            let visibleCount = 0;
            
            categoryRows.forEach(function(row) {
                const categoryName = row.dataset.name;
                
                if (categoryName.includes(searchTerm)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Show/hide empty state
            const emptyState = document.querySelector('.empty-state');
            if (emptyState) {
                if (visibleCount === 0 && searchTerm) {
                    emptyState.innerHTML = `
                        <div class="empty-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>Tidak Ditemukan</h3>
                        <p>Tidak ada kategori yang cocok dengan pencarian "${searchTerm}"</p>
                    `;
                    emptyState.style.display = 'block';
                } else if (visibleCount > 0) {
                    emptyState.style.display = 'none';
                }
            }
        });
    }
    
    // Animate rows on load
    const rows = document.querySelectorAll('.category-row');
    rows.forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            row.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            row.style.opacity = '1';
            row.style.transform = 'translateY(0)';
        }, index * 100);
    });
    
    // Confirm delete with better message
    const deleteButtons = document.querySelectorAll('.btn-danger-custom');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            const form = this.closest('form');
            const categoryName = this.closest('tr').querySelector('.category-name').textContent.trim();
            const filmCount = this.closest('tr').querySelector('.films-count').textContent.match(/\d+/)[0];
            
            let message = `Apakah Anda yakin ingin menghapus kategori "${categoryName}"?`;
            
            if (parseInt(filmCount) > 0) {
                message += `\n\nKategori ini memiliki ${filmCount} film. Film-film tersebut akan kehilangan kategori ini.`;
            }
            
            if (!confirm(message)) {
                e.preventDefault();
            }
        });
    });
});
</script>

@endsection