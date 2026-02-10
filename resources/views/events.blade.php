@extends('layouts.app')

@section('content')
<main id="events-page">
    <!-- Events Hero -->
    <section class="hero-section py-0 cinematic-overlay" style="background: url('https://images.unsplash.com/photo-1591637333184-19aa84b3e01f?auto=format&fit=crop&w=1920&q=80');">
        <div class="container text-center py-5" style="min-height: 50vh; display: flex; flex-direction: column; justify-content: center;">
            <h1 class="display-3 fw-black italic text-uppercase text-white lh-1 mb-3 text-shadow-heavy">
                UPCOMING <span class="text-primary-red">EVENTS</span>
            </h1>
            <p class="lead text-white-50 text-uppercase fw-bold italic" style="letter-spacing: 3px;">RIDE. COMPETE. CELEBRATE.</p>
        </div>
    </section>

    <!-- All Events Grid -->
    <section class="bg-black py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h2 class="section-title text-white">UPCOMING <span class="text-primary-red">ACTIVITIES</span></h2>
                <div class="btn-group">
                    <a href="{{ route('events', ['category' => 'All']) }}" class="btn btn-outline-secondary btn-sm {{ request('category') == 'All' || !request('category') ? 'active' : '' }}">All</a>
                    <a href="{{ route('events', ['category' => 'Track Day']) }}" class="btn btn-outline-secondary btn-sm {{ request('category') == 'Track Day' ? 'active' : '' }}">Track Days</a>
                    <a href="{{ route('events', ['category' => 'Tour']) }}" class="btn btn-outline-secondary btn-sm {{ request('category') == 'Tour' ? 'active' : '' }}">Tours</a>
                    <a href="{{ route('events', ['category' => 'Meet']) }}" class="btn btn-outline-secondary btn-sm {{ request('category') == 'Meet' ? 'active' : '' }}">Meets</a>
                </div>
            </div>

            <div class="row g-4">
                @forelse($events as $event)
                <div class="col-md-4">
                    <div class="event-card">
                        <div class="event-date-ribbon">
                            <span class="month">{{ strtoupper(date('M', strtotime($event->date))) }}</span>
                            <span class="day">{{ date('d', strtotime($event->date)) }}</span>
                        </div>
                        <img src="{{ $event->image ? asset($event->image) : 'https://images.unsplash.com/photo-1558981403-c5f91cbba527?auto=format&fit=crop&w=800&q=80' }}" class="event-image" alt="{{ $event->title }}">
                        <div class="event-details">
                            <h4>{{ $event->title }}</h4>
                            <p class="location"><i class="fas fa-map-marker-alt text-primary-red me-2"></i> {{ $event->location }}</p>
                            <p class="text-muted small mb-0">{{ Str::limit($event->description, 100) }}</p>
                        </div>
                        <div class="event-action">
                            <a href="#" class="btn-event-action btn-register">Register Now</a>
                            <a href="#" class="btn-event-action btn-details">More Details</a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <h3 class="text-white-50 italic">No upcoming events at the moment. Stay tuned!</h3>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Organize Event CTA -->
    <section class="py-5" style="background: #050505;">
        <div class="container">
            <div class="glass-card border-secondary p-5 text-center">
                <h2 class="text-white fw-black italic text-uppercase mb-4">HAVE AN IDEA FOR AN <span class="text-primary-red">EVENT?</span></h2>
                <p class="text-muted mb-4 mx-auto col-lg-8">Our community thrives on rider-led initiatives. If you want to organize a group ride, a technical meet, or a charity tour, reach out to our team.</p>
                <a href="{{ url('/#contact') }}" class="btn btn-superbike px-5">Propose an Event</a>
            </div>
        </div>
    </section>
</main>
@endsection
