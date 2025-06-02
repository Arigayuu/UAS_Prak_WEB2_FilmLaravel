@extends('layouts.app')

@section('content')
<style>
    .watchlist-container {
        padding: 2rem 0;
        min-height: calc(100vh - 200px);
    }
    
    .page-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }
    
    .page-title {
        font-size: 2.75rem;
        font-weight: 700;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 1rem;
    }
    
    .page-subtitle {
        color: #64748b;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }
    
    .page-header::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 2px;
    }
    
    .watchlist-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        border: 1px solid #f1f5f9;
        transition: all 0.4s ease;
        overflow: hidden;
        position: relative;
        height: 100%;
    }
    
    .watchlist-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        transform: scaleX(0);
        transition: transform 0.4s ease;
    }
    
    .watchlist-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }
    
    .watchlist-card:hover::before {
        transform: scaleX(1);
    }
    
    .card-image-container {
        position: relative;
        overflow: hidden;
        height: 300px;
    }
    
    .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    
    .watchlist-card:hover .card-img-top {
        transform: scale(1.05);
    }
    
    .status-overlay {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 2;
    }
    
    .card-body {
        padding: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }
    
    .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 0.75rem;
        line-height: 1.3;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .card-text {
        color: #64748b;
        line-height: 1.6;
        flex-grow: 1;
        margin-bottom: 1rem;
    }
    
    .status-badge {
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
        position: relative;
        overflow: hidden;
    }
    
    .status-badge.bg-success {
        background: linear-gradient(135deg, #10b981, #059669) !important;
        color: white;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    }
    
    .status-badge.bg-primary {
        background: linear-gradient(135deg, #4f46e5, #7c3aed) !important;
        color: white;
        box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
    }
    
    .status-badge.bg-warning {
        background: linear-gradient(135deg, #f59e0b, #d97706) !important;
        color: white;
        box-shadow: 0 4px 15px rgba(245, 158, 11, 0.3);
    }
    
    .status-form {
        margin-bottom: 1.5rem;
    }
    
    .form-select {
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 0.75rem 1rem;
        font-weight: 500;
        transition: all 0.3s ease;
        background-color: #f9fafb;
    }
    
    .form-select:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        background-color: white;
    }
    
    .btn-actions {
        display: flex;
        gap: 0.75rem;
        align-items: center;
        flex-wrap: wrap;
    }
    
    .btn-gradient {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border: none;
        color: white;
        padding: 0.5rem 1.25rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
    }
    
    .btn-gradient:hover {
        background: linear-gradient(135deg, #4338ca, #6d28d9);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
        color: white;
    }
    
    .btn-outline-gradient {
        background: transparent;
        border: 2px solid;
        border-image: linear-gradient(135deg, #4f46e5, #7c3aed) 1;
        color: #4f46e5;
        padding: 0.5rem 1.25rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        position: relative;
        overflow: hidden;
    }
    
    .btn-outline-gradient::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        transition: all 0.3s ease;
        z-index: -1;
    }
    
    .btn-outline-gradient:hover::before {
        left: 0;
    }
    
    .btn-outline-gradient:hover {
        color: white;
        border-color: transparent;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
    }
    
    .btn-danger-gradient {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        border: none;
        color: white;
        padding: 0.5rem 1.25rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }
    
    .btn-danger-gradient:hover {
        background: linear-gradient(135deg, #dc2626, #b91c1c);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(239, 68, 68, 0.4);
        color: white;
    }
    
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: white;
        border-radius: 25px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        border: 1px solid #f1f5f9;
        position: relative;
        overflow: hidden;
    }
    
    .empty-state::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
    }
    
    .empty-icon {
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 2rem;
        border: 3px solid #e2e8f0;
    }
    
    .empty-icon i {
        font-size: 3rem;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    .empty-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1rem;
    }
    
    .empty-description {
        color: #64748b;
        font-size: 1.1rem;
        margin-bottom: 2rem;
        line-height: 1.6;
    }
    
    .empty-action {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
        padding: 1rem 2rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
    }
    
    .empty-action:hover {
        background: linear-gradient(135deg, #4338ca, #6d28d9);
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(79, 70, 229, 0.4);
        color: white;
    }
    
    .pagination-container {
        display: flex;
        justify-content: center;
        margin-top: 3rem;
        padding-top: 2rem;
        border-top: 1px solid #e5e7eb;
    }
    
    .pagination .page-link {
        border: 2px solid #e5e7eb;
        color: #4f46e5;
        padding: 0.75rem 1rem;
        margin: 0 0.25rem;
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .pagination .page-link:hover {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
    }
    
    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-color: transparent;
        color: white;
    }
    
    .filter-section {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        border: 1px solid #f1f5f9;
    }
    
    .filter-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .filter-title i {
        color: #4f46e5;
    }
    
    .status-filters {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }
    
    .status-filter {
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        border: 2px solid #e5e7eb;
        background: white;
        color: #64748b;
        text-decoration: none;
        font-weight: 600;
        transition: all 0.3s ease;
        font-size: 0.875rem;
    }
    
    .status-filter.active,
    .status-filter:hover {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
    }
    
    @media (max-width: 768px) {
        .page-title {
            font-size: 2.25rem;
        }
        
        .watchlist-card {
            margin-bottom: 2rem;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .btn-actions {
            flex-direction: column;
            align-items: stretch;
        }
        
        .btn-actions > * {
            width: 100%;
            justify-content: center;
        }
        
        .empty-state {
            padding: 3rem 1.5rem;
        }
        
        .empty-icon {
            width: 100px;
            height: 100px;
        }
        
        .empty-icon i {
            font-size: 2.5rem;
        }
        
        .status-filters {
            justify-content: center;
        }
    }
</style>

<div class="watchlist-container">
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1 class="page-title">
                <i class="fas fa-bookmark me-2"></i>My Watchlist
            </h1>
            <p class="page-subtitle">
                Kelola dan pantau film-film yang ingin Anda tonton atau sudah Anda selesaikan
            </p>
        </div>

        <!-- Filter Section -->
        @if($watchlists->count() > 0)
        <div class="filter-section">
            <div class="filter-title">
                <i class="fas fa-filter"></i>
                Filter by Status
            </div>
            <div class="status-filters">
                <a href="{{ route('watchlist.index') }}" 
                   class="status-filter {{ !request('status') ? 'active' : '' }}">
                    <i class="fas fa-list me-1"></i>All
                </a>
                <a href="{{ route('watchlist.index', ['status' => 'plan_to_watch']) }}" 
                   class="status-filter {{ request('status') === 'plan_to_watch' ? 'active' : '' }}">
                    <i class="fas fa-clock me-1"></i>Plan to Watch
                </a>
                <a href="{{ route('watchlist.index', ['status' => 'watching']) }}" 
                   class="status-filter {{ request('status') === 'watching' ? 'active' : '' }}">
                    <i class="fas fa-play me-1"></i>Watching
                </a>
                <a href="{{ route('watchlist.index', ['status' => 'completed']) }}" 
                   class="status-filter {{ request('status') === 'completed' ? 'active' : '' }}">
                    <i class="fas fa-check me-1"></i>Completed
                </a>
            </div>
        </div>
        @endif

        <!-- Watchlist Grid -->
        <div class="row">
            @forelse($watchlists as $watchlist)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="watchlist-card">
                        <div class="card-image-container">
                            <img src="{{ asset('storage/' . $watchlist->film->poster) }}" 
                                 class="card-img-top" 
                                 alt="{{ $watchlist->film->title }}"
                                 loading="lazy">
                            
                            <!-- Status Overlay -->
                            <div class="status-overlay">
                                <span class="status-badge bg-{{ $watchlist->status === 'completed' ? 'success' : 
                                                               ($watchlist->status === 'watching' ? 'primary' : 'warning') }}">
                                    @if($watchlist->status === 'plan_to_watch')
                                        <i class="fas fa-clock me-1"></i>Plan to Watch
                                    @elseif($watchlist->status === 'watching')
                                        <i class="fas fa-play me-1"></i>Watching
                                    @else
                                        <i class="fas fa-check me-1"></i>Completed
                                    @endif
                                </span>
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <h5 class="card-title">{{ $watchlist->film->title }}</h5>
                            <p class="card-text">
                                {{ Str::limit($watchlist->film->description, 120) }}
                            </p>

                            <!-- Status Update Form -->
                            <form action="{{ route('watchlist.update', $watchlist) }}" 
                                  method="POST" 
                                  class="status-form">
                                @csrf
                                @method('PATCH')
                                <select name="status" 
                                        class="form-select" 
                                        onchange="this.form.submit()">
                                    <option value="plan_to_watch" 
                                            {{ $watchlist->status === 'plan_to_watch' ? 'selected' : '' }}>
                                        <i class="fas fa-clock"></i> Plan to Watch
                                    </option>
                                    <option value="watching" 
                                            {{ $watchlist->status === 'watching' ? 'selected' : '' }}>
                                        <i class="fas fa-play"></i> Watching
                                    </option>
                                    <option value="completed" 
                                            {{ $watchlist->status === 'completed' ? 'selected' : '' }}>
                                        <i class="fas fa-check"></i> Completed
                                    </option>
                                </select>
                            </form>

                            <!-- Action Buttons -->
                            <div class="btn-actions">
                                <a href="{{ route('films.show', $watchlist->film) }}" 
                                   class="btn-outline-gradient">
                                    <i class="fas fa-eye"></i>
                                    View Detail
                                </a>

                                <form action="{{ route('watchlist.destroy', $watchlist) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Are you sure you want to remove this film from your watchlist?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger-gradient">
                                        <i class="fas fa-trash"></i>
                                        Remove
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-bookmark"></i>
                        </div>
                        <h3 class="empty-title">Your Watchlist is Empty</h3>
                        <p class="empty-description">
                            Start building your personal film collection by adding movies you want to watch or have already seen.
                        </p>
                        <a href="{{ route('films.index') }}" class="empty-action">
                            <i class="fas fa-search me-2"></i>
                            Browse Films
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($watchlists->hasPages())
        <div class="pagination-container">
            {{ $watchlists->links() }}
        </div>
        @endif
    </div>
</div>
@endsection