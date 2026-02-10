@extends('layouts.app')

@section('content')
<main id="contact-page">
    <!-- Contact Hero -->
    <section class="hero-section py-0 cinematic-overlay" style="background: url('https://images.unsplash.com/photo-1558981224-2c49615ec584?auto=format&fit=crop&w=1920&q=80');">
        <div class="container text-center py-5" style="min-height: 50vh; display: flex; flex-direction: column; justify-content: center;">
            <h1 class="display-3 fw-black italic text-uppercase text-white lh-1 mb-3 text-shadow-heavy">
                GET IN <span class="text-primary-red">TOUCH</span>
            </h1>
            <p class="lead text-white-50 text-uppercase fw-bold italic text-shadow-heavy" style="letter-spacing: 3px;">CONNECT WITH THE COMMUNITY. RIDE TOGETHER.</p>
        </div>
    </section>

    <!-- Contact Info & Form -->
    <section class="bg-black py-5">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Info -->
                <div class="col-lg-4">
                    <h2 class="section-title text-white mb-5">CONTACT <span class="text-primary-red">INFO</span></h2>
                    
                    <div class="contact-info-card mb-4 p-4 border border-dark bg-dark-soft">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box bg-primary-red me-3">
                                <i class="fas fa-map-marker-alt text-white"></i>
                            </div>
                            <h4 class="text-white fw-bold italic text-uppercase mb-0">Our Base</h4>
                        </div>
                        <p class="text-white-50 mb-0">{{ $settings['contact_address'] ?? 'Riders Hub, 123 MotoX Drive, Speedway City, SC 45678' }}</p>
                    </div>

                    <div class="contact-info-card mb-4 p-4 border border-dark bg-dark-soft">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box bg-primary-red me-3">
                                <i class="fas fa-envelope text-white"></i>
                            </div>
                            <h4 class="text-white fw-bold italic text-uppercase mb-0">Email Us</h4>
                        </div>
                        <p class="text-white-50 mb-0">{{ $settings['contact_email_primary'] ?? 'support@motoxcode.com' }}<br>{{ $settings['contact_email_secondary'] ?? 'info@motoxcode.com' }}</p>
                    </div>

                    <div class="contact-info-card p-4 border border-dark bg-dark-soft">
                        <div class="d-flex align-items-center mb-3">
                            <div class="icon-box bg-primary-red me-3">
                                <i class="fas fa-phone-alt text-white"></i>
                            </div>
                            <h4 class="text-white fw-bold italic text-uppercase mb-0">Call Us</h4>
                        </div>
                        <p class="text-white-50 mb-0">{{ $settings['contact_phone_primary'] ?? '+1 (555) RIDERS-01' }}<br>{{ $settings['contact_phone_secondary'] ?? '+1 (555) 987-6543' }}</p>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-8">
                    <h2 class="section-title text-white mb-5">SEND A <span class="text-primary-red">MESSAGE</span></h2>
                    <div class="p-5 border border-dark bg-dark-card shadow-lg">
                        <form action="#" method="POST" class="contact-form">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label text-uppercase fw-bold italic text-white-50 small">Rider Name</label>
                                    <input type="text" class="form-control" placeholder="YOUR FULL NAME" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label text-uppercase fw-bold italic text-white-50 small">Email Address</label>
                                    <input type="email" class="form-control" placeholder="YOUR@EMAIL.COM" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label text-uppercase fw-bold italic text-white-50 small">Inquiry Type</label>
                                    <select class="form-select">
                                        <option selected disabled>SELECT OPTION</option>
                                        <option>Community Membership</option>
                                        <option>Event Registration</option>
                                        <option>Official Tours</option>
                                        <option>Other Inquiries</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label text-uppercase fw-bold italic text-white-50 small">Your Message</label>
                                    <textarea class="form-control" rows="5" placeholder="TELL US WHAT'S ON YOUR MIND..." required></textarea>
                                </div>
                                <div class="col-12 text-end">
                                    <button type="submit" class="btn btn-superbike px-5">Submit Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1558981!2d-103.14!3d37.14!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzfCsDA4JzI0LjAiTiAxMDPCsDA4JzI0LjAiVw!5e0!3m2!1sen!2sus!4v1234567890" width="100%" height="450" style="border:0; filter: grayscale(1) invert(1) contrast(1.2);" allowfullscreen="" loading="lazy"></iframe>
    </section>
</main>

<style>
.bg-dark-soft {
    background: #080808;
}
.bg-dark-card {
    background: #111111;
}
.icon-box {
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 2px;
}
.form-label {
    letter-spacing: 1px;
}
.form-control, .form-select {
    background: #1a1a1a;
    border: 1px solid #333;
    color: white;
    border-radius: 2px;
    padding: 0.8rem 1rem;
    font-weight: 500;
}
.form-control:focus, .form-select:focus {
    background: #222;
    border-color: var(--primary-red);
    color: white;
    box-shadow: none;
}
.form-control::placeholder {
    color: #888;
    font-size: 0.8rem;
    font-style: italic;
    font-weight: 700;
}
</style>
@endsection
