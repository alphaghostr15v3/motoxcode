@extends('layouts.app')

@section('content')
<main id="home">
    <!-- Hero Section -->
    <section class="hero-section py-0 cinematic-overlay" style="background: url('{{ $settings['hero_image'] ?? 'https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?auto=format&fit=crop&w=1920&q=80' }}'); background-size: cover; background-position: center;">
        <div class="container text-center py-5" style="min-height: 80vh; display: flex; flex-direction: column; justify-content: center;">
            <div class="row justify-content-center">
                <div class="col-lg-10 hero-content">
                    <h2 class="text-white fw-bold text-uppercase italic mb-0 text-shadow-heavy">{{ $settings['hero_top_title'] ?? 'WELCOME TO THE' }}</h2>
                    <h1 class="text-uppercase text-white italic fw-black mb-4 text-shadow-heavy">
                        <span class="text-primary-red">{{ $settings['hero_main_red_text'] ?? 'SUPERBIKE' }}</span> {{ $settings['hero_main_white_text'] ?? 'COMMUNITY' }}
                    </h1>
                    <h4 class="text-white fw-bold text-uppercase italic mb-5 text-shadow-heavy" style="letter-spacing: 3px;">{{ $settings['hero_subtitle'] ?? 'RIDE. CONNECT. EXPLORE.' }}</h4>
                    
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#join" class="btn btn-superbike">Join the Community</a>
                        <a href="#about" class="btn btn-outline-superbike">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Icons Bar -->
    <section class="feature-icons-bar p-0">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="feature-box">
                        <i class="fas fa-calendar-alt"></i>
                        <div>
                            <h5>Group Rides & Events</h5>
                            <p>Join thrilling rides and explorers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-box">
                        <i class="fas fa-tools"></i>
                        <div>
                            <h5>Bike Tips & Reviews</h5>
                            <p>Get expert advice and latest reviews.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-box border-0">
                        <i class="fas fa-comments"></i>
                        <div>
                            <h5>Member Forums</h5>
                            <p>Connect & share with fellow riders.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dynamic Stats Bar -->
    <section class="py-5" style="background: #080808;">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-4">
                    <h2 class="text-white fw-black italic mb-0">{{ number_format($stats['members'] ?? 0) }}+</h2>
                    <p class="text-primary-red small text-uppercase fw-bold italic mb-0" style="letter-spacing: 2px;">Active Riders</p>
                </div>
                <div class="col-md-4">
                    <h2 class="text-white fw-black italic mb-0">{{ number_format($stats['events'] ?? 0) }}+</h2>
                    <p class="text-primary-red small text-uppercase fw-bold italic mb-0" style="letter-spacing: 2px;">Events Hosted</p>
                </div>
                <div class="col-md-4">
                    <h2 class="text-white fw-black italic mb-0">{{ number_format($stats['miles'] ?? 0) }}+</h2>
                    <p class="text-primary-red small text-uppercase fw-bold italic mb-0" style="letter-spacing: 2px;">Community Miles</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Upcoming Events -->
    <section id="events" class="bg-black py-5">
        <div class="container">
            <h2 class="section-title text-white mb-4">UPCOMING <span class="text-primary-red">EVENTS</span></h2>
            <div class="row g-4">
                @forelse($events as $event)
                <div class="col-md-4">
                    <div class="event-card">
                        <div class="event-date-ribbon">
                            <span class="month">{{ \Carbon\Carbon::parse($event->date)->format('M') }}</span>
                            <span class="day">{{ \Carbon\Carbon::parse($event->date)->format('d') }}</span>
                        </div>
                        <img src="{{ asset('uploads/events/' . $event->image) }}" class="event-image" alt="{{ $event->title }}" onerror="this.src='https://images.unsplash.com/photo-1558981403-c5f91cbba527?auto=format&fit=crop&w=800&q=80'">
                        <div class="event-details">
                            <h4>{{ $event->title }}</h4>
                            <p class="location">{{ $event->location }}</p>
                        </div>
                        <div class="event-action">
                            <a href="{{ route('events.show', $event->id) }}" class="btn-event-action btn-register">Register Now</a>
                            <a href="{{ route('events.show', $event->id) }}" class="btn-event-action btn-details">More Details</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted italic">NO UPCOMING EVENTS SCHEDULED. CHECK BACK SOON.</p>
                </div>
                @endforelse
            </div>
            <div class="text-center mt-5">
                <a href="#" class="btn btn-outline-secondary text-uppercase fw-bold px-4">View All Events</a>
            </div>
        </div>
    </section>

    <!-- Latest From Forum / Shop -->
    <section class="py-5" style="background: #050505;">
        <div class="container">
            <div class="row g-5">
                <!-- Forum List -->
                <div class="col-md-5">
                    <h2 class="section-title text-white mb-4">LATEST FROM THE <span class="text-primary-red">FORUM</span></h2>
                    <div class="forum-list">
                        <a href="#" class="forum-item">
                            <span><i class="fas fa-check-double text-primary-red me-2"></i> Best Performance Upgrades</span>
                            <span class="time">4:39 PM</span>
                        </a>
                        <a href="#" class="forum-item">
                            <span><i class="fas fa-check-double text-primary-red me-2"></i> New Riders Introductions</span>
                            <span class="time">2:15 PM</span>
                        </a>
                        <a href="#" class="forum-item">
                            <span><i class="fas fa-check-double text-primary-red me-2"></i> Upcoming Track Day Tips</span>
                            <span class="time">1:45 PM</span>
                        </a>
                        <a href="#" class="forum-item">
                            <span><i class="fas fa-check-double text-primary-red me-2"></i> Share Your Ride Photos</span>
                            <span class="time">11:10 AM</span>
                        </a>
                    </div>
                    <div class="mt-4">
                        <a href="#" class="btn btn-dark text-uppercase fw-bold px-4"><i class="fas fa-comments me-2"></i> Visit Forum</a>
                    </div>
                </div>
                
                <!-- Shop Cards -->
                <div class="col-md-7">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="shop-card">
                                <img src="https://images.unsplash.com/photo-1558981806-ec527fa84c39?auto=format&fit=crop&w=400&q=80" alt="Riding Gear">
                                <h5>Riding Gear</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="shop-card">
                                <img src="https://images.unsplash.com/photo-1591145603411-9a7c64a7c20c?auto=format&fit=crop&w=400&q=80" alt="Bike Accessories">
                                <h5>Bike Accessories</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="shop-card">
                                <img src="https://images.unsplash.com/photo-1558980331-1598f8241476?auto=format&fit=crop&w=400&q=80" alt="Parts & Upgrades">
                                <h5>Parts & Upgrades</h5>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <a href="#" class="btn btn-superbike w-100">Visit Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
</main>
@endsection

