@extends('layouts.app')

@section('content')

<style>
    main {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }
</style>

<div class="hero-section hero-section d-flex align-items-center" style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('{{ asset('storage/Pribadi/BGcinema.jpg') }}'); background-size: cover; background-position: center; height: 500px; display: flex; align-items: center; color: white;">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-4">Katalog Film Indonesia</h1>
        <p class="lead mb-5">Temukan dan jelajahi koleksi film dari berbagai genre</p>
        <a href="{{ route('films.index') }}" class="btn btn-primary btn-lg px-4 me-2">Lihat Katalog</a>
        <a href="{{ url('/about') }}" class="btn btn-outline-light btn-lg px-4">Tentang Saya</a>
    </div>
</div>

<div class="features py-5">
    <div class="container">
        <h2 class="text-center mb-5">Fitur Utama</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="p-3">
                    <div class="feature-icon mb-3">
                        <i class="fa fa-film fa-3x" style="color: #0d6efd;"></i>
                    </div>
                    <h3>Tambah Film</h3>
                    <p>Anda Dapat menyimpan Track FIlm yang telah anda tonton bersama teman dan keluarga anda.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-3">
                    <div class="feature-icon mb-3">
                        <i class="fa fa-search fa-3x" style="color: #0d6efd;"></i>
                    </div>
                    <h3>Pembagian Kategori</h3>
                    <p>Pembagian film berdasarkan kategori untuk penghilahat yang lebih mudah</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="p-3">
                    <div class="feature-icon mb-3">
                        <i class="fa fa-plus-circle fa-3x" style="color: #0d6efd;"></i>
                    </div>
                    <h3>Komentar Film</h3>
                    <p>Kontribusikan film favorit Anda untuk memperkaya katalog dan berbagi dengan pengguna lain.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="about-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <h2>Tentang Katalog Film</h2>
                <p class="lead">Platform sederhana untuk mencari dan menemukan informasi film.</p>
                <p>Katalog Film adalah platform yang dikembangkan untuk menyediakan informasi lengkap tentang berbagai film. Pengguna dapat menjelajahi koleksi film, menambahkan film baru, dan mengkategorikan film berdasarkan genre.</p>
                <p>Dibuat menggunakan Laravel, platform ini menawarkan pengalaman yang responsif dan mudah digunakan untuk semua penggemar film.</p>
                <a href="{{ url('/about') }}" class="btn btn-outline-primary">Pelajari Lebih Lanjut</a>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img src="{{ asset('storage/Pribadi/ilu.jpg') }}" 
                    alt="Film Illustration" 
                    class="img-fluid rounded" 
                    style="max-height: 400px; width: 100%; object-fit: contain;">
            </div>
            
        </div>
    </div>
</div>

<div class="cta-section py-5" style="background-color: #212529; color: white;">
    <div class="container text-center">
        <h2 class="mb-4">Mulai Jelajahi Film Sekarang</h2>
        <p class="lead mb-4">Temukan informasi lengkap tentang film favorit Anda atau tambahkan film baru ke katalog kami</p>
        <div class="d-flex justify-content-center">
            <a href="{{ route('films.index') }}" class="btn btn-primary btn-lg me-3">Lihat Katalog</a>
            <a href="{{ route('films.create') }}" class="btn btn-outline-light btn-lg">Tambah Film</a>
        </div>
    </div>
</div>
@endsection