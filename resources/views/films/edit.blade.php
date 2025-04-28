@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Film: {{ $film->title }}</h2>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('films.update', $film->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Film</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $film->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="director" class="form-label">Sutradara</label>
                            <input type="text" class="form-control" id="director" name="director" value="{{ old('director', $film->director) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="release_year" class="form-label">Tahun Rilis</label>
                            <input type="number" class="form-control" id="release_year" name="release_year" value="{{ old('release_year', $film->release_year) }}" min="1900" max="{{ date('Y') + 1 }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre', $film->genre) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ old('description', $film->description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            @if($film->poster)
                                <div class="mb-2">
                                    <label class="form-label">Poster Saat Ini:</label>
                                    <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }}" class="img-thumbnail" style="max-height: 200px;">
                                </div>
                            @endif
                            <label for="poster" class="form-label">Poster Film (Biarkan kosong jika tidak ingin mengubah)</label>
                            <input type="file" class="form-control" id="poster" name="poster">
                            <div class="form-text">Format yang didukung: JPG, PNG, GIF (Maks. 2MB)</div>
                        </div>
                        <div class="mb-3">
                            <label for="categories" class="form-label">Kategori</label>
                            <select name="categories[]" id="categories" class="form-select" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', $film->categories->pluck('id')->toArray())) ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('films.index') }}" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
