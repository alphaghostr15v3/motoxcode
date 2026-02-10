@extends('layouts.app')

@section('content')
<main id="join-page">
    <!-- Join Hero -->
    <section class="hero-section py-0 cinematic-overlay" style="background: url('https://images.unsplash.com/photo-1599819811279-d5ad9cccf838?auto=format&fit=crop&w=1920&q=80');">
        <div class="container text-center py-5" style="min-height: 50vh; display: flex; flex-direction: column; justify-content: center;">
            <h1 class="display-3 fw-black italic text-uppercase text-white lh-1 mb-3 text-shadow-heavy">
                BECOME A <span class="text-primary-red">COMMUNITY RIDER</span>
            </h1>
            <p class="lead text-white-50 text-uppercase fw-bold italic text-shadow-heavy" style="letter-spacing: 3px;">EXPERIENCE THE ADRENALINE. JOIN THE PACK.</p>
        </div>
    </section>

    <!-- Membership Benefits -->
    <section class="bg-black py-5 border-bottom border-dark">
        <div class="container">
            <h2 class="section-title text-white mb-5 text-center mx-auto" style="max-width: fit-content;">MEMBERSHIP <span class="text-primary-red">BENEFITS</span></h2>
            
            <div class="row g-4 mt-2">
                <div class="col-md-4 text-center">
                    <div class="benefit-card p-4 h-100 border border-dark transition-all">
                        <i class="fas fa-calendar-check text-primary-red display-5 mb-4"></i>
                        <h4 class="text-white fw-bold italic text-uppercase mb-3">{{ $settings['join_benefit1_title'] ?? 'Priority Access' }}</h4>
                        <p class="text-white-50 small">{{ $settings['join_benefit1_text'] ?? 'Get early registration and guaranteed spots for all our major track days and inter-city tours.' }}</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="benefit-card p-4 h-100 border border-dark transition-all">
                        <i class="fas fa-tools text-primary-red display-5 mb-4"></i>
                        <h4 class="text-white fw-bold italic text-uppercase mb-3">{{ $settings['join_benefit2_title'] ?? 'Tech Support' }}</h4>
                        <p class="text-white-50 small">{{ $settings['join_benefit2_text'] ?? 'Expert mechanical advice, group maintenance sessions, and exclusive discounts at partner garages.' }}</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="benefit-card p-4 h-100 border border-dark transition-all">
                        <i class="fas fa-users text-primary-red display-5 mb-4"></i>
                        <h4 class="text-white fw-bold italic text-uppercase mb-3">{{ $settings['join_benefit3_title'] ?? 'Ride Network' }}</h4>
                        <p class="text-white-50 small">{{ $settings['join_benefit3_text'] ?? 'Connect with veteran riders, participate in weekend meetups, and find your next touring partner.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Form -->
    <section class="bg-black py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="registration-wrapper p-0 overflow-hidden border border-dark bg-dark-card shadow-lg d-flex flex-column flex-md-row">
                        <!-- Left Info Panel -->
                        <div class="col-md-4 bg-primary-red p-5 d-flex flex-column justify-content-center text-white">
                            <h3 class="fw-black italic text-uppercase mb-4">THE RIDE <br>STARTS HERE</h3>
                            <p class="small mb-4 opacity-75">Fill out your details to register interest. Our team will contact you within 24 hours to finalize your community credentials.</p>
                            <div class="vstack gap-3 small fw-bold italic text-uppercase">
                                <div class="d-flex align-items-center"><i class="fas fa-check-circle me-3"></i> NO SIGNUP FEE</div>
                                <div class="d-flex align-items-center"><i class="fas fa-check-circle me-3"></i> INSTANT NEWS UPDATES</div>
                                <div class="d-flex align-items-center"><i class="fas fa-check-circle me-3"></i> MEMBERS-ONLY FORUM</div>
                            </div>
                        </div>
                        <!-- Right Form Panel -->
                        <div class="col-md-8 p-5">
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('join.submit') }}" method="POST" class="auth-form">
                                @csrf
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <label class="form-label text-uppercase fw-bold italic text-white-50 small">Full Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="YOUR NAME" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-uppercase fw-bold italic text-white-50 small">Email Address</label>
                                        <input type="email" name="email" class="form-control" placeholder="RIDER@EMAIL.COM" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-uppercase fw-bold italic text-white-50 small">Your Machine</label>
                                        <input type="text" name="machine" class="form-control" placeholder="E.G. BMW S1000RR" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label text-uppercase fw-bold italic text-white-50 small">Riding Level</label>
                                        <select name="level" class="form-select">
                                            <option selected disabled>SELECT LEVEL</option>
                                            <option value="Beginner">Beginner (0-1 Years)</option>
                                            <option value="Intermediate">Intermediate (1-5 Years)</option>
                                            <option value="Advanced">Advanced (5+ Years)</option>
                                            <option value="Pro">Pro / Track Expert</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label text-uppercase fw-bold italic text-white-50 small">Tell Us About Yourself</label>
                                        <textarea name="bio" class="form-control" rows="3" placeholder="YOUR PASSION, YOUR STORY..."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-superbike w-100 py-3">Submit Registration Request</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
.bg-dark-card {
    background: #0a0a0a;
}
.benefit-card:hover {
    background: #0d0d0d;
    transform: translateY(-5px);
    border-color: var(--primary-red) !important;
}
.form-control, .form-select {
    background: #1a1a1a;
    border: 1px solid #333;
    color: white;
    border-radius: 2px;
    padding: 0.8rem 1rem;
}
.form-control:focus, .form-select:focus {
    border-color: var(--primary-red);
    box-shadow: none;
    background: #222;
    color: white;
}
.form-control::placeholder {
    color: #888;
    font-size: 0.8rem;
    font-weight: 700;
}
</style>
@endsection
