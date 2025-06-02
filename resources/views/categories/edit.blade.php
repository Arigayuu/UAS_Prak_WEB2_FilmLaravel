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
    
    .form-container {
        background: white;
        border-radius: 20px;
        padding: 2.5rem;
        margin: -3rem auto 3rem;
        position: relative;
        z-index: 3;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        max-width: 800px;
    }
    
    .form-header {
        text-align: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 2px solid #f1f5f9;
    }
    
    .form-title {
        font-size: 2rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        background: linear-gradient(135deg, #667eea, #764ba2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .category-badge {
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        color: #667eea;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 600;
        margin-top: 0.5rem;
        display: inline-block;
        border: 2px solid #e0e7ff;
        font-size: 0.875rem;
    }
    
    .form-section {
        margin-bottom: 2rem;
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
        background-color: #fafbfc;
    }
    
    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        background-color: white;
        outline: none;
    }
    
    .form-control:hover {
        border-color: #9ca3af;
        background-color: white;
    }
    
    .form-control.is-invalid {
        border-color: #ef4444;
        background-color: #fef2f2;
    }
    
    .form-control.is-invalid:focus {
        border-color: #ef4444;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }
    
    .invalid-feedback {
        color: #dc2626;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .invalid-feedback::before {
        content: '\f071';
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
    }
    
    .form-text {
        color: #6b7280;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .form-text i {
        color: #667eea;
    }
    
    .btn-group-custom {
        display: flex;
        gap: 1rem;
        justify-content: space-between;
        align-items: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid #f1f5f9;
    }
    
    .btn-custom {
        padding: 0.875rem 2rem;
        font-weight: 600;
        border-radius: 25px;
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        border: none;
        cursor: pointer;
        font-size: 0.95rem;
    }
    
    .btn-primary-custom {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
    }
    
    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        color: white;
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
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .form-container {
            margin: -2rem 1rem 2rem;
            padding: 1.5rem;
        }
        
        .btn-group-custom {
            flex-direction: column-reverse;
            gap: 1rem;
        }
        
        .btn-custom {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<!-- Hero Section -->
<div class="page-hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-edit me-3"></i>
                Edit Kategori
            </h1>
            <p class="hero-subtitle">
                Perbarui informasi kategori untuk mengorganisir koleksi film Anda
            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class="form-container">
        <div class="form-header">
            <h2 class="form-title">Edit Kategori</h2>
            <div class="category-badge">{{ $category->name }}</div>
        </div>

        <form action="{{ route('categories.update', $category) }}" method="POST" id="categoryForm">
            @csrf
            @method('PUT')
            
            <div class="form-section">
                <div class="mb-3">
                    <label for="name" class="form-label">
                        <i class="fas fa-tag"></i>
                        Nama Kategori
                    </label>
                    <input type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $category->name) }}" 
                           required 
                           placeholder="Masukkan nama kategori">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">
                        <i class="fas fa-info-circle"></i>
                        Nama kategori harus unik dan mudah diingat
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">
                        <i class="fas fa-align-left"></i>
                        Deskripsi
                    </label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" 
                              name="description" 
                              rows="4"
                              placeholder="Berikan deskripsi singkat tentang kategori ini...">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">
                        <i class="fas fa-info-circle"></i>
                        Deskripsi opsional untuk menjelaskan jenis film dalam kategori ini
                    </div>
                </div>
            </div>
            
            <div class="btn-group-custom">
                <a href="{{ route('categories.index') }}" class="btn-custom btn-secondary-custom">
                    <i class="fas fa-arrow-left"></i>
                    Batal
                </a>
                <button type="submit" class="btn-custom btn-primary-custom">
                    <i class="fas fa-save"></i>
                    Update Kategori
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    document.getElementById('categoryForm').addEventListener('submit', function(e) {
        const name = document.getElementById('name').value.trim();
        
        if (!name) {
            e.preventDefault();
            alert('Nama kategori wajib diisi!');
            document.getElementById('name').focus();
        }
    });
    
    // Auto-focus on name field
    document.getElementById('name').focus();
});
</script>

@endsection
