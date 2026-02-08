@extends('layouts.app')

@section('content')
<main id="about-page">
    <!-- About Hero -->
    <section class="hero-section py-0 cinematic-overlay" style="background: url('https://images.unsplash.com/photo-1558980394-4c7c9299fe96?auto=format&fit=crop&w=1920&q=80');">
        <div class="container text-center py-5" style="min-height: 50vh; display: flex; flex-direction: column; justify-content: center;">
            <h1 class="display-3 fw-black italic text-uppercase text-white lh-1 mb-3 text-shadow-heavy">
                ABOUT OUR <span class="text-primary-red">COMMUNITY</span>
            </h1>
            <p class="lead text-white-50 text-uppercase fw-bold italic" style="letter-spacing: 3px;">THE SOUL OF SPEED. THE BOND OF RIDERS.</p>
        </div>
    </section>

    <!-- Our Mission -->
    <section class="bg-black py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-md-6">
                    <h2 class="section-title text-white mb-4">OUR <span class="text-primary-red">MISSION</span></h2>
                    <p class="lead text-primary-red italic fw-bold">{{ $settings['about_mission_highlight'] ?? 'Connecting riders, championing safety, and celebrating the thrill of the ride.' }}</p>
                    <p class="text-white-50">{{ $settings['about_mission_text'] ?? 'Founded with a passion for high-performance motorcycles, the Superbike Community is more than just a club. We are a global brotherhood of enthusiasts dedicated to promoting responsible riding and technical excellence.' }}</p>
                    <div class="row mt-4">
                        <div class="col-6">
                            <h3 class="text-white fw-black italic mb-0">500+</h3>
                            <p class="text-muted small text-uppercase fw-bold">Active Members</p>
                        </div>
                        <div class="col-6">
                            <h3 class="text-white fw-black italic mb-0">20+</h3>
                            <p class="text-muted small text-uppercase fw-bold">Annual Events</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-2 border border-dark rounded-0 shadow-lg">
                        <img src="https://images.unsplash.com/photo-1599819861270-d29871630043?auto=format&fit=crop&w=800&q=80" class="img-fluid w-100" alt="Rider at Sunset">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="py-5" style="background: #050505;">
        <div class="container">
            <h2 class="section-title text-center text-white mb-5">CORE <span class="text-primary-red">VALUES</span></h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="p-4 bg-dark border border-secondary text-center h-100 transition-all hover-red">
                        <i class="fas fa-shield-alt text-primary-red fs-1 mb-3"></i>
                        <h4 class="text-white fw-bold italic text-uppercase">Safety First</h4>
                        <p class="text-muted small mb-0">We believe that speed is nothing without control. Safety training and responsible riding are our top priorities.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-dark border border-secondary text-center h-100 transition-all hover-red">
                        <i class="fas fa-users text-primary-red fs-1 mb-3"></i>
                        <h4 class="text-white fw-bold italic text-uppercase">Community</h4>
                        <p class="text-muted small mb-0">Riders from all backgrounds are welcome. We foster a supportive and inclusive environment for focused enthusiasts.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-dark border border-secondary text-center h-100 transition-all hover-red">
                        <i class="fas fa-cogs text-primary-red fs-1 mb-3"></i>
                        <h4 class="text-white fw-bold italic text-uppercase">Excellence</h4>
                        <p class="text-muted small mb-0">From technical masterclasses to track day organization, we strive for the highest standards in everything we do.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Join The Trail -->
    <section class="bg-black py-5 border-top border-dark">
        <div class="container text-center">
            <h2 class="section-title text-white mb-4">READY TO <span class="text-primary-red">JOIN THE TRAIL?</span></h2>
            <p class="text-muted mb-5 col-lg-8 mx-auto">Experience the thrill of riding with the world's most passionate superbike community. Sign up today and gain access to exclusive events, technical forums, and a global network of riders.</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ url('/#join') }}" class="btn btn-superbike px-5">Join the Community</a>
                <a href="{{ url('/#events') }}" class="btn btn-outline-superbike px-5">View Upcoming Events</a>
            </div>
        </div>
    </section>

</main>
@endsection

<style>
.hover-red:hover {
    border-color: var(--primary-red) !important;
    transform: translateY(-5px);
    transition: all 0.3s ease;
}
</style>
