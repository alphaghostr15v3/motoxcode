@extends('layouts.app')

@section('content')
<main id="blogs-page">
    <!-- Blog Hero -->
    <section class="hero-section py-0 cinematic-overlay" style="background: url('https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;">
        <div class="container text-center py-5" style="min-height: 50vh; display: flex; flex-direction: column; justify-content: center;">
            <h1 class="display-3 fw-black italic text-uppercase text-white lh-1 mb-3 text-shadow-heavy">
                COMMUNITY <span class="text-primary-red">STORIES</span>
            </h1>
            <p class="lead text-white-50 text-uppercase fw-bold italic" style="letter-spacing: 3px;">THE RIDER'S PERSPECTIVE. THE PASSION SHARED.</p>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="bg-black py-5">
        <div class="container">
            <h2 class="section-title text-white mb-5">LATEST <span class="text-primary-red">POSTS</span></h2>
            
            <div class="row g-4">
                @forelse($blogs as $blog)
                <div class="col-md-4">
                    <div class="blog-card glass-card border-secondary h-100 transition-all">
                        <div class="blog-image-wrapper position-relative overflow-hidden">
                            <img src="{{ $blog->image ? asset($blog->image) : 'https://images.unsplash.com/photo-1558981285-6f0c94958bb6?q=80&w=800&auto=format&fit=crop' }}" class="img-fluid w-100" alt="{{ $blog->title }}" style="height: 250px; object-fit: cover;">
                            <div class="blog-date position-absolute top-0 end-0 bg-primary-red text-white p-2 fw-bold italic small">
                                {{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('M d') : $blog->created_at->format('M d') }}
                            </div>
                        </div>
                        <div class="p-4">
                            <h4 class="text-white fw-bold italic text-uppercase mb-3">{{ Str::limit($blog->title, 50) }}</h4>
                            <p class="text-muted small mb-4">{{ Str::limit(strip_tags($blog->content), 120) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-primary-red small fw-bold italic">BY {{ strtoupper($blog->author) }}</span>
                                <a href="{{ route('blogs.show', $blog->slug) }}" class="text-white text-decoration-none fw-bold italic small read-more">READ MORE <i class="fas fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <h3 class="text-white-50 italic">No community stories published yet. Stay tuned!</h3>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                {{ $blogs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
</main>

<style>
.blog-card:hover {
    transform: translateY(-10px);
    border-color: var(--primary-red) !important;
    box-shadow: 0 10px 30px rgba(204, 0, 0, 0.2);
}
.blog-card:hover .blog-image-wrapper img {
    transform: scale(1.1);
}
.blog-image-wrapper img {
    transition: transform 0.6s ease;
}
.read-more:hover {
    color: var(--primary-red) !important;
}
.pagination .page-link {
    background: transparent;
    border-color: #333;
    color: #fff;
}
.pagination .page-item.active .page-link {
    background: var(--primary-red);
    border-color: var(--primary-red);
}
.pagination .page-link:hover {
    background: rgba(204, 0, 0, 0.1);
    color: var(--primary-red);
}
</style>
@endsection
