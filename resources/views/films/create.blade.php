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
        padding: 2rem;
        margin: -3rem auto 0;
        position: relative;
        z-index: 3;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        max-width: 1000px;
    }
    
    .form-section {
        margin-bottom: 2.5rem;
    }
    
    .form-section:last-child {
        margin-bottom: 0;
    }
    
    .section-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #f1f5f9;
    }
    
    .section-title i {
        width: 35px;
        height: 35px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1rem;
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
    
    .form-control, .form-select {
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 0.875rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #fafbfc;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        background-color: white;
        outline: none;
    }
    
    .form-control:hover, .form-select:hover {
        border-color: #9ca3af;
        background-color: white;
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
    
    .file-upload-container {
        position: relative;
        border: 2px dashed #d1d5db;
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        background: #fafbfc;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .file-upload-container:hover {
        border-color: #667eea;
        background: #f8faff;
    }
    
    .file-upload-container.dragover {
        border-color: #667eea;
        background: #eef2ff;
    }
    
    .file-upload-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        color: #667eea;
        font-size: 1.5rem;
    }
    
    .file-upload-text {
        color: #6b7280;
        margin-bottom: 0.5rem;
    }
    
    .file-upload-text strong {
        color: #667eea;
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
        margin-top: 1rem;
        text-align: center;
        display: none;
    }
    
    .image-preview img {
        max-width: 200px;
        max-height: 200px;
        border-radius: 12px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border: 3px solid white;
    }
    
    .image-preview-container {
        position: relative;
        display: inline-block;
    }
    
    .remove-image {
        position: absolute;
        top: -10px;
        right: -10px;
        background: #ef4444;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 0.875rem;
        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
    }
    
    .alert-danger {
        background: linear-gradient(135deg, #fef2f2, #fee2e2);
        border: 1px solid #fecaca;
        border-radius: 12px;
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
    
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .form-container {
            margin: -2rem 1rem 0;
            padding: 1.5rem;
        }
        
        .form-row {
            grid-template-columns: 1fr;
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
                <i class="fas fa-plus-circle me-3"></i>
                Tambah Film Baru
            </h1>
            <p class="hero-subtitle">
                Tambahkan film favorit Anda ke dalam katalog
            </p>
        </div>
    </div>
</div>

<div class="container">
    <div class="form-container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <h6 class="fw-bold mb-2">
                <i class="fas fa-exclamation-triangle me-2"></i>
                Terdapat kesalahan dalam pengisian form:
            </h6>
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
                
                <div class="form-row">
                    <div class="mb-3">
                        <label for="title" class="form-label">
                            <i class="fas fa-film"></i>
                            Judul Film
                        </label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="{{ old('title') }}" required 
                               placeholder="Masukkan judul film">
                    </div>
                    
                    <div class="mb-3">
                        <label for="director" class="form-label">
                            <i class="fas fa-user-tie"></i>
                            Sutradara
                        </label>
                        <input type="text" class="form-control" id="director" name="director" 
                               value="{{ old('director') }}" required 
                               placeholder="Nama sutradara">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="mb-3">
                        <label for="release_year" class="form-label">
                            <i class="fas fa-calendar-alt"></i>
                            Tahun Rilis
                        </label>
                        <input type="number" class="form-control" id="release_year" name="release_year" 
                               value="{{ old('release_year') }}" min="1900" max="{{ date('Y') + 1 }}" required 
                               placeholder="Contoh: {{ date('Y') }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="genre" class="form-label">
                            <i class="fas fa-tags"></i>
                            Genre
                        </label>
                        <input type="text" class="form-control" id="genre" name="genre" 
                               value="{{ old('genre') }}" required 
                               placeholder="Contoh: Action, Drama, Comedy">
                    </div>
                </div>
            </div>

            <!-- Description Section -->
            <div class="form-section">
                <h3 class="section-title">
                    <i class="fas fa-align-left"></i>
                    Deskripsi Film
                </h3>
                
                <div class="mb-3">
                    <label for="description" class="form-label">
                        <i class="fas fa-file-alt"></i>
                        Deskripsi
                    </label>
                    <textarea class="form-control" id="description" name="description" rows="5" required 
                              placeholder="Ceritakan tentang film ini...">{{ old('description') }}</textarea>
                    <div class="form-text">
                        <i class="fas fa-info-circle"></i>
                        Berikan deskripsi yang menarik tentang alur cerita film
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
                        <div class="form-text">
                            <i class="fas fa-info-circle"></i>
                            Format yang didukung: JPG, PNG, GIF (Maks. 2MB)
                        </div>
                        <input type="file" class="form-control" id="poster" name="poster" accept="image/*">
                    </div>
                    <div class="image-preview" id="imagePreview">
                        <div class="image-preview-container">
                            <img id="previewImg" src="/placeholder.svg" alt="Preview">
                            <button type="button" class="remove-image" onclick="removeImage()">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="categories" class="form-label">
                        <i class="fas fa-list"></i>
                        Kategori
                    </label>
                    <select name="categories[]" id="categories" class="form-select" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" 
                                    {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <div class="form-text">
                        <i class="fas fa-info-circle"></i>
                        Tahan Ctrl (Windows) atau Cmd (Mac) untuk memilih multiple kategori
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="btn-group-custom">
                <a href="{{ route('films.index') }}" class="btn-custom btn-secondary-custom">
                    <i class="fas fa-arrow-left"></i>
                    Kembali
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
    posterInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.style.display = 'block';
                fileUploadContainer.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    });
    
    // Drag and drop functionality
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
        if (files.length > 0) {
            posterInput.files = files;
            posterInput.dispatchEvent(new Event('change'));
        }
    });
    
    // Form validation
    document.getElementById('filmForm').addEventListener('submit', function(e) {
        const title = document.getElementById('title').value.trim();
        const director = document.getElementById('director').value.trim();
        const description = document.getElementById('description').value.trim();
        
        if (!title || !director || !description) {
            e.preventDefault();
            alert('Mohon lengkapi semua field yang wajib diisi!');
        }
    });
});

function removeImage() {
    document.getElementById('poster').value = '';
    document.getElementById('imagePreview').style.display = 'none';
    document.querySelector('.file-upload-container').style.display = 'block';
}
</script>

@endsection