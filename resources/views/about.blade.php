@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>About Us</h2>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="{{ asset('storage/Pribadi/Ari.jpg') }}" alt="Profile Picture" class="rounded-circle" width="300">
                        <h3 class="mt-3">I Wayan Arigayu Saputra</h3>
                        <p class="text-muted">UTS Praktikum Pemrograman WEB2</p>
                    </div>
                    
                    <div class="mb-4">
                        <h4>Tentang Saya</h4>
                        <p>
                            Saya adalah seorang pengembang web yang bersemangat dengan pengalaman dalam membuat aplikasi web 
                            menggunakan Laravel dan teknologi modern lainnya. Website katalog film ini adalah salah satu proyek 
                            yang telah saya kembangkan untuk menampilkan kemampuan dan kreativitas saya dalam pengembangan web.
                        </p>
                    </div>
                    
                    <div class="mb-4">
                        <h4>Tentang Website Ini</h4>
                        <p>
                            Website Katalog Film ini dibuat menggunakan framework Laravel dengan tujuan untuk menampilkan 
                            dan mengelola koleksi film. Fitur-fitur yang tersedia meliputi:
                        </p>
                        <ul>
                            <li>Melihat katalog film beserta detailnya</li>
                            <li>Menambahkan film baru ke dalam katalog</li>
                            <li>Mengedit informasi film yang sudah ada</li>
                            <li>Menghapus film dari katalog</li>
                            <li>Menambahkan kategori film</li>
                            <li>Melihat kategori film beserta detailnya</li>
                            <li>Mengedit kategori film yang sudah ada</li>
                            <li>Menghapus Kategori film dari kategori</li>
                        </ul>
                        <p>
                            Proyek ini menggunakan beberapa teknologi berikut:
                        </p>
                        <ul>
                            <li>PHP dengan framework Laravel</li>
                            <li>MySQL database</li>
                            <li>Bootstrap untuk styling dan responsiveness</li>
                        </ul>
                    </div>
                    <div>
                        <h4>Kontak Saya</h4>
                        <p>
                            Email: saputrawayanarigayu@gmail.com<br>
                            Instagram: @argyu_s<br>
                            WhatsApp: +6281234567890<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
