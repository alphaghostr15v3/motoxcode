@extends('layouts.app')

@section('content')
<main id="blog-details">
    <!-- Post Header -->
    <section class="blog-header position-relative overflow-hidden" style="min-height: 60vh;">
        <div class="position-absolute top-0 start-0 w-100 h-100 cinematic-overlay" style="background: url('{{ $blog->image ? asset($blog->image) : 'https://images.unsplash.com/photo-1558191053-8edcb01e1da3?auto=format&fit=crop&w=1920&q=80' }}'); background-size: cover; background-position: center;"></div>
        <div class="container position-relative z-Index-1 h-100 d-flex flex-column justify-content-end pb-5" style="min-height: 60vh;">
            <div class="row">
                <div class="col-lg-8">
                    <span class="badge bg-primary-red text-white text-uppercase fw-bold italic px-3 py-2 mb-3">COMMUNITY STORY</span>
                    <h1 class="display-3 text-white fw-black italic text-uppercase text-shadow-heavy mb-4">{{ $blog->title }}</h1>
                    <div class="d-flex align-items-center gap-4 text-white-50 fw-bold italic small">
                        <span><i class="fas fa-user text-primary-red me-2"></i>BY {{ strtoupper($blog->author) }}</span>
                        <span><i class="fas fa-calendar-alt text-primary-red me-2"></i>{{ $blog->published_at ? \Carbon\Carbon::parse($blog->published_at)->format('F d, Y') : $blog->created_at->format('F d, Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Post Content -->
    <section class="bg-black py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8">
                    <div class="blog-content text-white-50 lh-lg fs-5">
                        {!! $blog->content !!}
                    </div>
                    
                    <div class="mt-5 pt-4 border-top border-secondary">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="share-box">
                                <span class="text-white small fw-bold italic text-uppercase me-3">Share This Story:</span>
                                <a href="#" class="text-white-50 hover-red me-3"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="text-white-50 hover-red me-3"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-white-50 hover-red"><i class="fab fa-instagram"></i></a>
                            </div>
                            <a href="{{ route('blogs') }}" class="btn btn-outline-secondary btn-sm text-uppercase fw-bold italic px-3"><i class="fas fa-arrow-left me-2"></i>Back to Blog</a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sticky-top" style="top: 100px;">
                        <h4 class="text-white fw-bold italic text-uppercase mb-4">RECENT <span class="text-primary-red">STORIES</span></h4>
                        <div class="recent-posts">
                            @foreach($recentBlogs as $recent)
                            <a href="{{ route('blogs.show', $recent->slug) }}" class="d-flex gap-3 text-decoration-none mb-4 group">
                                <div class="flex-shrink-0">
                                    <img src="{{ $recent->image ? asset($recent->image) : 'https://images.unsplash.com/photo-1558981403-c5f91cbba527?auto=format&fit=crop&w=400&q=80' }}" class="rounded border border-secondary" style="width: 80px; height: 80px; object-fit: cover;">
                                </div>
                                <div>
                                    <h6 class="text-white fw-bold italic text-uppercase mb-1 transition-all group-hover-red">{{ Str::limit($recent->title, 40) }}</h6>
                                    <span class="text-muted extra-small">{{ $recent->published_at ? \Carbon\Carbon::parse($recent->published_at)->format('M d, Y') : $recent->created_at->format('M d, Y') }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>

                        <div class="glass-card border-secondary p-4 mt-5">
                            <h5 class="text-white fw-bold italic text-uppercase mb-3">JOIN THE <span class="text-primary-red">CONVERSATION</span></h5>
                            <p class="text-muted small">Ride with us and share your adventures with thousands of fellow enthusiasts.</p>
                            <a href="{{ route('join') }}" class="btn btn-superbike btn-sm w-100">JOIN NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
.blog-content p { margin-bottom: 1.5rem; }
.blog-content img { max-width: 100%; border-radius: 8px; margin: 2rem 0; border: 1px solid #333; }
.hover-red:hover { color: var(--primary-red) !important; }
.group:hover .group-hover-red { color: var(--primary-red) !important; }
.z-Index-1 { z-index: 1; }
</style>
@endsection
