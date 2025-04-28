@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Katalog Film</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @forelse($films as $film)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    @if($film->poster)
                    <img src="{{ asset('storage/' . $film->poster) }}" class="card-img-top p-2" alt="{{ $film->title }}" style="height: 300px; object-fit: contain; background-color: #f8f9fa;">
                    @else
                        <div class="bg-secondary text-white d-flex justify-content-center align-items-center" style="height: 300px;">
                            <p class="m-0">No Image</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $film->title }} ({{ $film->release_year }})</h5>
                        <p class="card-text"><strong>Genre:</strong> {{ $film->genre }}</p>
                        <p class="card-text"><strong>Director:</strong> {{ $film->director }}</p>
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ route('films.show', $film->id) }}" class="btn btn-primary">Lihat Detail</a>
                            <div>
                                <a href="{{ route('films.edit', $film->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('films.destroy', $film->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus film ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Belum ada film yang ditambahkan. <a href="{{ route('films.create') }}">Tambahkan film sekarang!</a>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
