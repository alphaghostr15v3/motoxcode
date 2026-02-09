@extends('layouts.app')

@section('content')
<main id="gallery-page">
    <!-- Gallery Hero -->
    <section class="hero-section py-0 cinematic-overlay" style="background: url('https://images.unsplash.com/photo-1599819811279-d5ad9cccf838?auto=format&fit=crop&w=1920&q=80');">
        <div class="container text-center py-5" style="min-height: 50vh; display: flex; flex-direction: column; justify-content: center;">
            <h1 class="display-3 fw-black italic text-uppercase text-white lh-1 mb-3 text-shadow-heavy">
                COMMUNITY <span class="text-primary-red">GALLERY</span>
            </h1>
            <p class="lead text-white-50 text-uppercase fw-bold italic" style="letter-spacing: 3px;">CAPTURING THE MOMENTS. SHARING THE PASSION.</p>
        </div>
    </section>

    <!-- Photo Grid -->
    <section class="bg-black py-5">
        <div class="container">
            <h2 class="section-title text-white mb-5">RECENT <span class="text-primary-red">UPLOADS</span></h2>
            
            <div class="row g-3">
                @forelse($gallery as $item)
                <div class="col-md-4 col-sm-6">
                    <div class="gallery-item position-relative overflow-hidden border border-dark">
                        <img src="{{ $item->image_path ? asset($item->image_path) : 'https://images.unsplash.com/photo-1558981403-c5f91cbba527?auto=format&fit=crop&w=800&q=80' }}" alt="{{ $item->caption }}" class="img-fluid w-100 gall-img transition-all">
                        <div class="gallery-overlay d-flex flex-column justify-content-end p-3 transition-all opacity-0 position-absolute top-0 start-0 w-100 h-100">
                            <h5 class="text-white fw-bold italic text-uppercase mb-1">{{ $item->caption ?? 'Superbike Moment' }}</h5>
                            <p class="text-white-50 small mb-0">{{ $item->category ?? 'General' }}</p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <h3 class="text-white-50 italic">The gallery is currently empty. Check back soon!</h3>
                </div>
                @endforelse
            </div>
            
            @if($gallery->isNotEmpty())
            <div class="text-center mt-5">
                <button class="btn btn-outline-secondary text-uppercase fw-bold px-5">Load More Photos</button>
            </div>
            @endif
        </div>
    </section>

    <!-- Upload CTA -->
    <section class="py-5" style="background: #050505;">
        <div class="container text-center">
            <h2 class="text-white fw-black italic text-uppercase mb-4">WANT TO <span class="text-primary-red">SHARE YOUR RIDE?</span></h2>
            <p class="text-muted mb-4 mx-auto col-lg-8">We love seeing photos from your solo tours, group rides, and track days. Submit your best shots to be featured in our official community gallery.</p>
            <a href="{{ url('/#contact') }}" class="btn btn-superbike px-5">Submit Your Photos</a>
        </div>
    </section>
</main>

<style>
.gallery-item:hover .gall-img {
    transform: scale(1.1);
}
.gallery-item:hover .gallery-overlay {
    opacity: 1 !important;
    background: linear-gradient(transparent, rgba(0,0,0,0.9));
}
.gall-img {
    height: 300px;
    object-fit: cover;
}
.transition-all {
    transition: all 0.4s ease;
}
</style>
@endsection
