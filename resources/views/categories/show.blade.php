@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2>{{ $category->name }}</h2>
            <p class="text-muted">{{ $category->description }}</p>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Edit Kategori</a>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <h3>Film dengan kategori "{{ $category->name }}"</h3>
    
    <div class="row">
        @forelse ($films as $film)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    @if ($film->poster)
                        <img src="{{ asset('storage/' . $film->poster) }}" class="card-img-top" alt="{{ $film->title }}">
                    @else
                        <div class="bg-secondary text-white d-flex justify-content-center align-items-center" style="height: 200px;">
                            <span>No Poster</span>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $film->title }}</h5>
                        <p class="card-text small">{{ Str::limit($film->description, 100) }}</p>
                        <a href="{{ route('films.show', $film) }}" class="btn btn-sm btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Tidak ada film dalam kategori ini.
                </div>
            </div>
        @endforelse
    </div>
    
    {{ $films->links() }}
</div>
@endsection