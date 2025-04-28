@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">{{ $film->title }}</h2>

    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $film->poster) }}" alt="{{ $film->title }}" class="img-fluid rounded shadow-sm">
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">{{ $film->title }} ({{ $film->release_year }})</h5>
                        <div>
                            <a href="{{ route('films.edit', $film) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('films.destroy', $film) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>

                    <p><strong>Director:</strong> {{ $film->director }}</p>
                    <p><strong>Genre:</strong> {{ $film->genre }}</p>
                    <p><strong>Release Year:</strong> {{ $film->release_year }}</p>

                    <div class="mt-4">
                        <h5>Deskripsi</h5>
                        <p>{{ $film->description }}</p>
                    </div>

                    <div class="mt-4">
                        <h5>Kategori</h5>
                        @foreach($film->categories as $category)
                            <span class="badge bg-secondary">{{ $category->name }}</span>
                        @endforeach
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('films.index') }}" class="btn btn-outline-primary">Kembali ke Katalog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Komentar -->
    <div class="mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-light">
                <h5 class="mb-0">Komentar</h5>
            </div>
            <div class="card-body">

                <!-- Form Tambah Komentar -->
                <form action="{{ route('comments.store', $film) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Komentar</label>
                        <textarea name="content" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Kirim Komentar</button>
                </form>

                <!-- Daftar Komentar -->
                <div class="mt-4">
                    <h6>{{ $comments->count() }} Komentar</h6>
                    <hr>
                    @if($comments->count() > 0)
                        @foreach($comments as $comment)
                            <div class="border rounded p-3 mb-3 bg-white" id="comment-{{ $comment->id }}">
                                <div class="d-flex justify-content-between mb-2">
                                    <strong>{{ $comment->name }}</strong>
                                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>

                                <div class="comment-content">
                                    <p class="mb-2">{{ $comment->content }}</p>
                                </div>

                                <div class="comment-actions d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary edit-comment-btn"
                                            data-comment-id="{{ $comment->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>

                                <!-- Form Edit Komentar -->
                                <div class="edit-comment-form mt-3" id="edit-form-{{ $comment->id }}" style="display: none;">
                                    <form action="{{ route('comments.update', $comment) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="mb-2">
                                            <textarea name="content" class="form-control" rows="3" required>{{ $comment->content }}</textarea>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                                            <button type="button" class="btn btn-sm btn-secondary cancel-edit" data-comment-id="{{ $comment->id }}">Batal</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-muted">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Edit Komentar -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-comment-btn');
        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                document.querySelector(`#comment-${commentId} .comment-content`).style.display = 'none';
                document.querySelector(`#comment-${commentId} .comment-actions`).style.display = 'none';
                document.querySelector(`#edit-form-${commentId}`).style.display = 'block';
            });
        });

        const cancelButtons = document.querySelectorAll('.cancel-edit');
        cancelButtons.forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                document.querySelector(`#comment-${commentId} .comment-content`).style.display = 'block';
                document.querySelector(`#comment-${commentId} .comment-actions`).style.display = 'flex';
                document.querySelector(`#edit-form-${commentId}`).style.display = 'none';
            });
        });
    });
</script>
@endsection
