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
    
    .form-container {
        background: white;
        border-radius: 30px;
        padding: 3rem;
        margin: -4rem auto 0;
        position: relative;
        z-index: 3;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        border: 1px solid #f1f5f9;
    }
    
    .form-header {
        text-align: center;
        margin-bottom: 3rem;
        padding-bottom: 2rem;
        border-bottom: 2px solid #f1f5f9;
        position: relative;
    }
    
    .form-header::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 2px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .form-title {
        font-size: 2.25rem;
        font-weight: 700;
        color: #1e293b;
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }
    
    .form-title i {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
    }
    
    .category-badge {
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        color: #4f46e5;
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        font-weight: 700;
        margin-top: 1rem;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        border: 2px solid #c7d2fe;
        font-size: 1rem;
    }
    
    .category-badge i {
        font-size: 1rem;
    }
    
    .form-section {
        margin-bottom: 2.5rem;
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
    
    .form-control {
        border: 2px solid #e5e7eb;
        border-radius: 15px;
        padding: 1rem 1.25rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #f9fafb;
        font-weight: 500;
        width: 100%;
    }
    
    .form-control:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
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
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 500;
    }
    
    .invalid-feedback i {
        font-size: 0.875rem;
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
        color: #4f46e5;
    }
    
    .character-counter {
        text-align: right;
        font-size: 0.875rem;
        color: #6b7280;
        margin-top: 0.5rem;
    }
    
    .character-counter.warning {
        color: #f59e0b;
    }
    
    .character-counter.danger {
        color: #ef4444;
    }
    
    .alert-danger {
        background: linear-gradient(135deg, #fef2f2, #fee2e2);
        border: 2px solid #fecaca;
        border-radius: 15px;
        padding: 1.5rem;
        margin-bottom: 2rem;
    }
    
    .alert-danger ul {
        margin: 0;
        padding-left: 1.5rem;
    }
    
    .alert-danger li {
        color: #dc2626;
        margin-bottom: 0.5rem;
        font-weight: 500;
    }
    
    .btn-group-custom {
        display: flex;
        gap: 1.5rem;
        justify-content: space-between;
        align-items: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 2px solid #f1f5f9;
    }
    
    .btn-custom {
        padding: 1rem 2.5rem;
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
    
    .category-preview {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 15px;
        padding: 1.5rem;
        margin-top: 1rem;
        border: 2px solid #e2e8f0;
        display: none;
    }
    
    .category-preview.show {
        display: block;
        animation: slideIn 0.3s ease;
    }
    
    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .preview-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.75rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .preview-label i {
        color: #4f46e5;
    }
    
    .preview-tag {
        display: inline-block;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-weight: 600;
        font-size: 0.875rem;
    }
    
    .films-count-info {
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        border-radius: 15px;
        padding: 1.5rem;
        margin-top: 2rem;
        border: 2px solid #c7d2fe;
        display: flex;
        align-items: center;
        gap: 1rem;
    }
    
    .films-count-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
        flex-shrink: 0;
    }
    
    .films-count-text {
        color: #374151;
        font-weight: 500;
    }
    
    .films-count-text strong {
        color: #4f46e5;
        font-weight: 700;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .form-container {
            margin: -3rem 1rem 0;
            padding: 2rem;
            border-radius: 25px;
        }
        
        .form-title {
            font-size: 1.75rem;
            flex-direction: column;
            gap: 1rem;
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
                Perbarui informasi kategori untuk mengorganisir koleksi film Anda dengan lebih baik
            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class="form-container">
        <div class="form-header">
            <h2 class="form-title">
                <i class="fas fa-tag"></i>
                Edit Kategori
            </h2>
            <div class="category-badge">
                <i class="fas fa-tag"></i>
                {{ $category->name }}
            </div>
        </div>

        @if ($errors->any())
            <div class="alert-danger">
                <h5><i class="fas fa-exclamation-triangle me-2"></i>Terdapat kesalahan dalam form:</h5>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.update', $category) }}" method="POST" id="categoryForm">
            @csrf
            @method('PUT')
            
            <div class="form-section">
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
                       maxlength="50"
                       placeholder="Masukkan nama kategori">
                
                @error('name')
                    <div class="invalid-feedback">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
                
                <div class="form-text">
                    <i class="fas fa-info-circle"></i>
                    Nama kategori akan digunakan untuk mengelompokkan film
                </div>
                
                <div class="character-counter" id="characterCounter">
                    {{ strlen($category->name) }}/50 karakter
                </div>
                
                <div class="category-preview show" id="categoryPreview">
                    <div class="preview-label">
                        <i class="fas fa-eye"></i>
                        Preview Kategori:
                    </div>
                    <span class="preview-tag" id="previewTag">{{ $category->name }}</span>
                </div>
            </div>
            
            <div class="form-section">
                <label for="description" class="form-label">
                    <i class="fas fa-align-left"></i>
                    Deskripsi (Opsional)
                </label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" 
                          name="description" 
                          rows="4" 
                          placeholder="Masukkan deskripsi kategori (opsional)">{{ old('description', $category->description) }}</textarea>
                
                @error('description')
                    <div class="invalid-feedback">
                        <i class="fas fa-exclamation-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
                
                <div class="form-text">
                    <i class="fas fa-info-circle"></i>
                    Deskripsi singkat tentang kategori ini (opsional)
                </div>
            </div>
            
            @if($category->films_count > 0)
                <div class="films-count-info">
                    <div class="films-count-icon">
                        <i class="fas fa-film"></i>
                    </div>
                    <div class="films-count-text">
                        Kategori ini memiliki <strong>{{ $category->films_count }} film</strong>. Mengubah nama kategori akan mempengaruhi semua film yang terkait.
                    </div>
                </div>
            @endif

            <div class="btn-group-custom">
                <a href="{{ route('categories.index') }}" class="btn-custom btn-secondary-custom">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Daftar
                </a>
                <button type="submit" class="btn-custom btn-primary-custom" id="submitBtn">
                    <i class="fas fa-save"></i>
                    Update Kategori
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const characterCounter = document.getElementById('characterCounter');
    const categoryPreview = document.getElementById('categoryPreview');
    const previewTag = document.getElementById('previewTag');
    const submitBtn = document.getElementById('submitBtn');
    const categoryForm = document.getElementById('categoryForm');
    
    // Auto-focus on name field
    nameInput.focus();
    
    // Character counter and preview
    nameInput.addEventListener('input', function() {
        const length = this.value.length;
        const maxLength = 50;
        
        // Update character counter
        characterCounter.textContent = `${length}/${maxLength} karakter`;
        
        // Update counter color
        if (length > maxLength * 0.8) {
            characterCounter.className = 'character-counter warning';
        } else if (length > maxLength * 0.9) {
            characterCounter.className = 'character-counter danger';
        } else {
            characterCounter.className = 'character-counter';
        }
        
        // Update preview
        if (this.value.trim()) {
            previewTag.textContent = this.value.trim();
            categoryPreview.classList.add('show');
        } else {
            categoryPreview.classList.remove('show');
        }
    });
    
    // Form validation
    categoryForm.addEventListener('submit', function(e) {
        const name = nameInput.value.trim();
        
        if (!name) {
            e.preventDefault();
            alert('Nama kategori wajib diisi!');
            nameInput.focus();
            return;
        }
        
        if (name.length < 2) {
            e.preventDefault();
            alert('Nama kategori minimal 2 karakter!');
            nameInput.focus();
            return;
        }
        
        // Show loading state
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memperbarui...';
        submitBtn.disabled = true;
    });
    
    // Real-time validation
    nameInput.addEventListener('blur', function() {
        const name = this.value.trim();
        
        if (name && name.length < 2) {
            this.classList.add('is-invalid');
            
            // Remove existing feedback
            const existingFeedback = this.parentNode.querySelector('.invalid-feedback');
            if (existingFeedback) {
                existingFeedback.remove();
            }
            
            // Add new feedback
            const feedback = document.createElement('div');
            feedback.className = 'invalid-feedback';
            feedback.innerHTML = '<i class="fas fa-exclamation-circle"></i> Nama kategori minimal 2 karakter';
            this.parentNode.appendChild(feedback);
        } else {
            this.classList.remove('is-invalid');
            const feedback = this.parentNode.querySelector('.invalid-feedback');
            if (feedback) {
                feedback.remove();
            }
        }
    });
    
    // Remove validation on input
    nameInput.addEventListener('input', function() {
        this.classList.remove('is-invalid');
        const feedback = this.parentNode.querySelector('.invalid-feedback');
        if (feedback) {
            feedback.remove();
        }
    });
    
    // Initialize character counter
    const initialLength = nameInput.value.length;
    const maxLength = 50;
    
    if (initialLength > maxLength * 0.8) {
        characterCounter.className = 'character-counter warning';
    } else if (initialLength > maxLength * 0.9) {
        characterCounter.className = 'character-counter danger';
    }
});
</script>

@endsection