<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $settings['site_title'] ?? 'MOTOXCODE - Ride Group' }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/downhill.css') }}">
    
    <style>
        /* Additional inline tweaks if needed */
    </style>
</head>
<body>
    <!-- Dynamic Top Navigation -->
    <header class="navbar navbar-expand-lg navbar-dark bg-black py-3 sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('img/logo-icon.png') }}" alt="Logo" class="me-2" style="height: 40px; filter: brightness(1) invert(0);">
                <div class="lh-1">
                    <span class="fw-black italic text-uppercase d-block" style="letter-spacing: 0px; font-size: 1.5rem;">
                        <span class="text-white">{{ $settings['brand_white_text'] ?? 'MOTO' }}</span><span class="text-primary-red">{{ $settings['brand_red_text'] ?? 'X' }}</span>
                    </span>
                    <span class="text-primary-red fw-bold italic text-uppercase" style="letter-spacing: 2px; font-size: 0.9rem;">CODE</span>
                </div>
            </a>
            
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto text-uppercase small fw-bold italic">
                    <li class="nav-item px-3"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item px-3"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
                    <li class="nav-item px-3"><a class="nav-link" href="{{ route('events') }}">Events</a></li>
                    <li class="nav-item px-3"><a class="nav-link" href="{{ route('gallery') }}">Galleries</a></li>
                    <li class="nav-item px-3"><a class="nav-link" href="{{ route('blogs') }}">Blog</a></li>
                    <li class="nav-item px-3"><a class="nav-link" href="{{ route('testimonials') }}">Testimonials</a></li>
                    <li class="nav-item px-3"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                </ul>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{ url('/login') }}" class="btn btn-nav-login">Login</a>
                    <a href="{{ route('join') }}" class="btn btn-nav-join">Join Community</a>
                </div>
            </div>
        </div>
    </header>

    <div class="main-body">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="py-5 text-center">
        <div class="container">
            <div class="social-icons mb-4">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
            <div class="d-flex justify-content-center gap-4 text-white-50 small text-uppercase fw-bold mb-4">
                <a href="#" class="text-decoration-none text-white-50 hover-white">Privacy Policy</a>
                <a href="#" class="text-decoration-none text-white-50 hover-white">Terms of Service</a>
            </div>
            <p class="text-white-50 small mb-0">
                &copy; {{ date('Y') }} <span class="text-white">{{ $settings['copyright_text'] ?? 'MOTOXCODE' }}</span>. ALL RIGHTS RESERVED.
            </p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
