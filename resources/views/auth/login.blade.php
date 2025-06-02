@extends('layouts.app')

@section('content')
<style>
    .auth-container {
        min-height: calc(100vh - 200px);
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        display: flex;
        align-items: center;
        padding: 3rem 0;
    }
    
    .auth-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        border: 1px solid #e2e8f0;
        overflow: hidden;
        position: relative;
    }
    
    .auth-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .auth-header {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        padding: 2rem;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    .auth-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
        opacity: 0.3;
    }
    
    .auth-header h4 {
        margin: 0;
        font-weight: 700;
        font-size: 1.75rem;
        position: relative;
        z-index: 2;
    }
    
    .auth-header .subtitle {
        margin: 0.5rem 0 0 0;
        opacity: 0.9;
        font-size: 0.95rem;
        position: relative;
        z-index: 2;
    }
    
    .auth-body {
        padding: 2.5rem;
    }
    
    .form-label {
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .form-control {
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #f9fafb;
    }
    
    .form-control:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        background-color: white;
    }
    
    .form-control.is-invalid {
        border-color: #ef4444;
        background-color: #fef2f2;
    }
    
    .invalid-feedback {
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }
    
    .btn-gradient {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border: none;
        padding: 0.75rem 2rem;
        font-weight: 600;
        border-radius: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
        color: white;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }
    
    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
        background: linear-gradient(135deg, #4338ca, #6d28d9);
        color: white;
    }
    
    .form-check-input:checked {
        background-color: #4f46e5;
        border-color: #4f46e5;
    }
    
    .form-check-label {
        color: #6b7280;
        font-weight: 500;
    }
    
    .auth-links {
        padding: 1.5rem 2.5rem;
        background: #f8fafc;
        border-top: 1px solid #e5e7eb;
        text-align: center;
    }
    
    .auth-links a {
        color: #4f46e5;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.2s ease;
    }
    
    .auth-links a:hover {
        color: #4338ca;
        text-decoration: underline;
    }
    
    .forgot-password {
        color: #6b7280;
        text-decoration: none;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }
    
    .forgot-password:hover {
        color: #4f46e5;
        text-decoration: underline;
    }
    
    .auth-icon {
        width: 60px;
        height: 60px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
    }
    
    @media (max-width: 768px) {
        .auth-body {
            padding: 2rem 1.5rem;
        }
        
        .auth-links {
            padding: 1.5rem;
        }
    }
</style>

<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="auth-card">
                    <div class="auth-header">
                        <div class="auth-icon">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <h4>Selamat Datang Kembali</h4>
                        <p class="subtitle">Masuk ke akun Anda untuk melanjutkan</p>
                    </div>
                    
                    <div class="auth-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-1"></i> Email Address
                                </label>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       id="email" 
                                       name="email" 
                                       value="{{ old('email') }}" 
                                       required 
                                       autocomplete="email" 
                                       autofocus
                                       placeholder="Masukkan email Anda">
                                @error('email')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-1"></i> Password
                                </label>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       required 
                                       autocomplete="current-password"
                                       placeholder="Masukkan password Anda">
                                @error('password')
                                    <div class="invalid-feedback">
                                        <i class="fas fa-exclamation-circle me-1"></i>{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <div class="form-check">
                                    <input type="checkbox" 
                                           class="form-check-input" 
                                           name="remember" 
                                           id="remember" 
                                           {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Ingat saya
                                    </label>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-gradient">
                                    <i class="fas fa-sign-in-alt"></i>
                                    Masuk ke Akun
                                </button>
                            </div>

                            @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a href="{{ route('password.request') }}" class="forgot-password">
                                        <i class="fas fa-key me-1"></i>Lupa password Anda?
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>

                    <div class="auth-links">
                        <p class="mb-0">
                            Belum punya akun? 
                            <a href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i>Daftar sekarang
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection