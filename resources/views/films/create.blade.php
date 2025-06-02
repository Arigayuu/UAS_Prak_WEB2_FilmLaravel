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
        max-width: 1000px;
        border: 1px solid #f1f5f9;
    }
    
    .form-section {
        margin-bottom: 3rem;
    }
    
    .form-section:last-child {
        margin-bottom: 0;
    }
    
    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
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
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
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
    
    .form-control:hover, .form-select:hover {
        border-color: #9ca3af;
        background-color: white;
    }
    
    .form-control.is-invalid {
        border-color: #ef4444;
        background-color: #fef2f2;
    }
    
    .invalid-feedback {
        color: #ef4444;
        font-size: 0.875rem;
        margin-top: 0.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
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
    
    .file-upload-container {
        position: relative;
        border: 3px dashed #d1d5db;
        border-radius: 20px;
        padding: 3rem 2rem;
        text-align: center;
        background: #f9fafb;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .file-upload-container:hover {
        border-color: #4f46e5;
        background: #f8faff;
    }
    
    .file-upload-container.dragover {
        border-color: #4f46e5;
        background: #eef2ff;
        transform: scale(1.02);
    }
    
    .file-upload-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: #4f46e5;
        font-size: 2rem;
        transition: all 0.3s ease;
    }
    
    .file-upload-container:hover .file-upload-icon {
        transform: scale(1.1);
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
    }
    
    .file-upload-text {
        color: #6b7280;
        margin-bottom: 0.5rem;
        font-size: 1.1rem;
    }
    
    .file-upload-text strong {
        color: #4f46e5;
        font-weight: 600;
    }
    
    .file-upload-hint {
        color: #9ca3af;
        font-size: 0.875rem;
    }
    
    #poster {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }
    
    .image-preview {
        margin-top: 1.5rem;
        text-align: center;
        display: none;
    }
    
    .image-preview-container {
        position: relative;
        display: inline-block;
    }
    
    .image-preview img {
        max-width: 250px;
        max-height: 250px;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        border: 4px solid white;
    }
    
    .remove-image {
        position: absolute;
        top: -15px;
        right: -15px;
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1rem;
        box-shadow: 0 5px 15px rgba(239, 68, 68, 0.4);
        transition: all 0.3s ease;
    }
    
    .remove-image:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 25px rgba(239, 68, 68, 0.5);
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
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 2rem;
    }
    
    .categories-container {
        background: #f8fafc;
        border-radius: 15px;
        padding: 1.5rem;
        border: 2px solid #e2e8f0;
    }
    
    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }
    
    .category-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.75rem;
        background: white;
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        transition: all 0.3s ease;
    }
    
    .category-item:hover {
        border-color: #4f46e5;
        background: #f8faff;
    }
    
    .category-item input[type="checkbox"] {
        width: 18px;
        height: 18px;
        accent-color: #4f46e5;
    }
    
    .category-item label {
        margin: 0;
        font-weight: 500;
        color: #374151;
        cursor: pointer;
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
        
        .form-row {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
        
        .btn-group-custom {
            flex-direction: column-reverse;
            gap: 1rem;
        }
        
        .btn-custom {
            width: 100%;
            justify-content: center;
        }
        
        .categories-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Hero Section -->
<div class="page-hero">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <i class="fas fa-plus-circle me-3"></i>
                Tambah Film Baru
            </h1>
            <p class="hero-subtitle">
                Tambahkan film favorit Anda ke dalam katalog dan bagikan dengan komunitas
            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class="form-container">
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

        <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data" id="filmForm">
            @csrf
            
            <!-- Basic Information Section -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-info-circle"></i>
                    Informasi Dasar
                </h3>
                
                <div class="mb-4">
                    <label for="title" class="form-label">
                        <i class="fas fa-film"></i>
                        Judul Film
                    </label>
                    <input type="text" 
                           class="form-control @error('title') is-invalid @enderror" 
                           id="title" 
                           name="title" 
                           value="{{ old('title') }}" 
                           required
                           placeholder="Masukkan judul film">
                    @error('title')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="description" class="form-label">
                        <i class="fas fa-align-left"></i>
                        Deskripsi
                    </label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" 
                              name="description" 
                              rows="5" 
                              required
                              placeholder="Ceritakan tentang film ini...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-text">
                        <i class="fas fa-info-circle"></i>
                        Berikan deskripsi yang menarik tentang alur cerita film
                    </div>
                </div>
            </div>

            <!-- Details Section -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-cog"></i>
                    Detail Film
                </h3>
                
                <div class="form-row">
                    <div class="mb-4">
                        <label for="director" class="form-label">
                            <i class="fas fa-user-tie"></i>
                            Sutradara
                        </label>
                        <input type="text" 
                               class="form-control @error('director') is-invalid @enderror" 
                               id="director" 
                               name="director" 
                               value="{{ old('director') }}" 
                               required
                               placeholder="Nama sutradara">
                        @error('director')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="release_year" class="form-label">
                            <i class="fas fa-calendar-alt"></i>
                            Tahun Rilis
                        </label>
                        <input type="number" 
                               class="form-control @error('release_year') is-invalid @enderror" 
                               id="release_year" 
                               name="release_year" 
                               value="{{ old('release_year') }}" 
                               min="1900" 
                               max="{{ date('Y') + 1 }}" 
                               required
                               placeholder="{{ date('Y') }}">
                        @error('release_year')
                            <div class="invalid-feedback">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="genre" class="form-label">
                        <i class="fas fa-tags"></i>
                        Genre
                    </label>
                    <input type="text" 
                           class="form-control @error('genre') is-invalid @enderror" 
                           id="genre" 
                           name="genre" 
                           value="{{ old('genre') }}" 
                           required
                           placeholder="Contoh: Action, Drama, Comedy">
                    @error('genre')
                        <div class="invalid-feedback">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="form-text">
                        <i class="fas fa-lightbulb"></i>
                        Pisahkan dengan koma jika lebih dari satu genre
                    </div>
                </div>
            </div>

            <!-- Media Section -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-image"></i>
                    Media & Kategori
                </h3>
                
                <div class="mb-4">
                    <label for="poster" class="form-label">
                        <i class="fas fa-camera"></i>
                        Poster Film
                    </label>
                    <div class="file-upload-container" onclick="document.getElementById('poster').click()">
                        <div class="file-upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="file-upload-text">
                            <strong>Klik untuk upload</strong> atau drag & drop file di sini
                        </div>
                        <div class="file-upload-hint">
                            Format: JPG, PNG, GIF (Max: 2MB)
                        </div>
                        <input type="file" 
                               class="@error('poster') is-invalid @enderror" 
                               id="poster" 
                               name="poster" 
                               accept="image/*">
                    </div>
                    
                    <div class="image-preview" id="imagePreview">
                        <div class="image-preview-container">
                            <img id="previewImg" src="/placeholder.svg" alt="Preview">
                            <button type="button" class="remove-image" onclick="removeImage()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    
                    @error('poster')
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">
                        <i class="fas fa-th-large"></i>
                        Kategori Film
                    </label>
                    <div class="categories-container">
                        <div class="form-text mb-3">
                            <i class="fas fa-info-circle"></i>
                            Pilih satu atau lebih kategori yang sesuai dengan film
                        </div>
                        <div class="categories-grid">
                            @foreach($categories as $category)
                                <div class="category-item">
                                    <input type="checkbox" 
                                           id="category_{{ $category->id }}" 
                                           name="categories[]" 
                                           value="{{ $category->id }}"
                                           {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
                                    <label for="category_{{ $category->id }}">
                                        {{ $category->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @error('categories')
                        <div class="invalid-feedback d-block">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="btn-group-custom">
                <a href="{{ route('films.index') }}" class="btn-custom btn-secondary-custom">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Katalog
                </a>
                <button type="submit" class="btn-custom btn-primary-custom">
                    <i class="fas fa-save"></i>
                    Simpan Film
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const posterInput = document.getElementById('poster');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('previewImg');
    const fileUploadContainer = document.querySelector('.file-upload-container');
    
    // File input change event
    if (posterInput) {
        posterInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                // Validate file size (2MB)
                if (file.size > 2 * 1024 * 1024) {
                    alert('Ukuran file terlalu besar. Maksimal 2MB.');
                    this.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (previewImg) previewImg.src = e.target.result;
                    if (imagePreview) imagePreview.style.display = 'block';
                    if (fileUploadContainer) fileUploadContainer.style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Drag and drop functionality
    if (fileUploadContainer) {
        fileUploadContainer.addEventListener('dragover', function(e) {
            e.preventDefault();
            this.classList.add('dragover');
        });
        
        fileUploadContainer.addEventListener('dragleave', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
        });
        
        fileUploadContainer.addEventListener('drop', function(e) {
            e.preventDefault();
            this.classList.remove('dragover');
            
            const files = e.dataTransfer.files;
            if (files.length > 0 && posterInput) {
                posterInput.files = files;
                posterInput.dispatchEvent(new Event('change'));
            }
        });
    }
    
    // Form validation
    const filmForm = document.getElementById('filmForm');
    if (filmForm) {
        filmForm.addEventListener('submit', function(e) {
            const title = document.getElementById('title').value.trim();
            const director = document.getElementById('director').value.trim();
            const description = document.getElementById('description').value.trim();
            const releaseYear = document.getElementById('release_year').value;
            const genre = document.getElementById('genre').value.trim();
            
            if (!title || !director || !description || !releaseYear || !genre) {
                e.preventDefault();
                alert('Mohon lengkapi semua field yang wajib diisi!');
                return;
            }
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Menyimpan...';
                submitBtn.disabled = true;
            }
        });
    }
});

function removeImage() {
    const posterInput = document.getElementById('poster');
    const imagePreview = document.getElementById('imagePreview');
    const fileUploadContainer = document.querySelector('.file-upload-container');

    if (posterInput) posterInput.value = '';
    if (imagePreview) imagePreview.style.display = 'none';
    if (fileUploadContainer) fileUploadContainer.style.display = 'block';
}
</script>

@endsection