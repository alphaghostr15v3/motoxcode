@extends('layouts.app')

@section('content')
<main id="testimonials-page">
    <!-- Testimonials Hero -->
    <section class="hero-section py-0 cinematic-overlay" style="background: url('https://images.unsplash.com/photo-1599819811279-d5ad9cccf838?auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center;">
        <div class="container text-center py-5" style="min-height: 50vh; display: flex; flex-direction: column; justify-content: center;">
            <h1 class="display-3 fw-black italic text-uppercase text-white lh-1 mb-3 text-shadow-heavy">
                RIDER <span class="text-primary-red">VOICES</span>
            </h1>
            <p class="lead text-white-50 text-uppercase fw-bold italic" style="letter-spacing: 3px;">REAL STORIES. REAL PASSION. ONE COMMUNITY.</p>
        </div>
    </section>

    <!-- Testimonials Grid -->
    <section class="bg-black py-5">
        <div class="container">
            <h2 class="section-title text-white mb-5">WHAT THEY <span class="text-primary-red">SAY</span></h2>
            
            <div class="row g-4 mb-5">
                @forelse($testimonials as $testimonial)
                <div class="col-md-4">
                    <div class="testimonial-card premium-glass p-4 h-100 transition-all border border-secondary border-opacity-25">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <div class="testimonial-avatar border-2 border border-red rounded-circle overflow-hidden shadow-lg" style="width: 70px; height: 70px;">
                                <img src="{{ $testimonial->image ? asset($testimonial->image) : 'https://images.unsplash.com/photo-1558981424-86e2f12fdfbb?q=80&w=200&auto=format&fit=crop' }}" class="w-100 h-100 object-fit-cover transition-all" alt="{{ $testimonial->name }}">
                            </div>
                            <div>
                                <h5 class="text-white fw-black italic text-uppercase mb-0 tracking-tight">{{ $testimonial->name }}</h5>
                                <span class="text-primary-red extra-small fw-bold italic text-uppercase letter-spacing-1">{{ $testimonial->role ?? 'MEMBER' }}</span>
                            </div>
                        </div>
                        
                        <div class="rating-stars mb-4 d-flex gap-1">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= ($testimonial->rating ?? 5))
                                    <i class="fas fa-star text-warning fs-6"></i>
                                @else
                                    <i class="far fa-star text-secondary fs-6"></i>
                                @endif
                            @endfor
                        </div>

                        <div class="testimonial-quote position-relative">
                            <!-- <i class="fas fa-quote-left text-primary-red opacity-10 position-absolute top-0 start-0" style="font-size: 3.5rem; transform: translate(-10px, -20px);"></i> -->
                            <p class="text-white fw-medium italic fs-5 mb-0 position-relative z-index-1 ps-3 lh-base" style="opacity: 0.85;">
                                "{{ $testimonial->message ?? $testimonial->content }}"
                            </p>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <div class="glass-card border-secondary p-5">
                        <i class="fas fa-comment-dots text-white-50 display-4 mb-3"></i>
                        <h3 class="text-white-50 italic">No community testimonials yet. Share your experience with us!</h3>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5" style="background: #050505;">
        <div class="container">
            <div class="premium-glass border-red p-5 text-center cinematic-glow rounded-3">
                <h2 class="text-white fw-black italic text-uppercase mb-4 display-4">READY TO <span class="text-primary-red">RIDE WITH US?</span></h2>
                <p class="text-white fw-medium mb-5 mx-auto col-lg-8 fs-5" style="opacity: 0.7;">Experience the adrenaline, the brotherhood, and the freedom of the open road. Join MOTOXCODE today.</p>
                <div class="d-flex justify-content-center gap-4">
                    <a href="{{ route('join') }}" class="btn btn-superbike px-5 py-3 fs-5">Join Now</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-white px-5 py-3 fs-5">Contact Us</a>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
.premium-glass {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
}
.testimonial-card:hover {
    transform: translateY(-12px);
    border-color: rgba(204, 0, 0, 0.4) !important;
    background: rgba(255, 255, 255, 0.05);
    box-shadow: 0 20px 40px rgba(204, 0, 0, 0.15);
}
.testimonial-card:hover .testimonial-avatar img {
    transform: scale(1.1);
}
.tracking-tight { letter-spacing: -0.5px; }
.letter-spacing-1 { letter-spacing: 1px; }
.cinematic-glow {
    box-shadow: 0 0 80px rgba(204, 0, 0, 0.15);
}
.z-index-1 { z-index: 1; }
.btn-outline-white {
    border: 2px solid rgba(255, 255, 255, 0.3);
    color: #fff;
    font-weight: 800;
    text-transform: uppercase;
    font-style: italic;
    border-radius: 0;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.btn-outline-white:hover {
    background: #fff;
    color: #000;
    border-color: #fff;
    transform: scale(1.05);
}
</style>
@endsection
