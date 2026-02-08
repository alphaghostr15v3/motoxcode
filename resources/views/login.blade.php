@extends('layouts.app')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-dark" style="background: linear-gradient(135deg, #0f111a 0%, #1a1cf022 100%);">
    
    <div class="col-md-4">
        <div class="glass-card p-5 border-top border-4 border-primary-cyan" style="background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(20px);">
            <div class="text-center mb-5">
                <i class="fas fa-bicycle text-primary-cyan fs-1 mb-3"></i>
                <h2 class="fw-black italic m-0">JOIN THE <span class="text-primary-cyan">RIDE</span></h2>
                <p class="text-muted small mt-2">Member Community Access</p>
            </div>

            <!-- Social Login -->
            <div class="d-grid gap-2 mb-4">
                <a href="#" class="btn btn-outline-light border-secondary text-white-50 py-2 d-flex align-items-center justify-content-center gap-2">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" width="18"> Continue with Google
                </a>
                <a href="#" class="btn btn-outline-light border-secondary text-white-50 py-2 d-flex align-items-center justify-content-center gap-2">
                    <i class="fab fa-strava text-orange" style="color: #fc4c02;"></i> Sync with Strava
                </a>
            </div>

            <div class="d-flex align-items-center my-4 opacity-25">
                <hr class="flex-grow-1">
                <span class="px-3 small">OR</span>
                <hr class="flex-grow-1">
            </div>

            <form action="{{ url('/') }}">
                <div class="mb-3">
                    <label class="form-label text-white-50 small fw-bold">Email Address</label>
                    <input type="email" class="form-control bg-dark border-secondary text-white py-2" placeholder="rider@flow.com" required>
                </div>

                <div class="mb-4">
                    <label class="form-label text-white-50 small fw-bold">Password</label>
                    <input type="password" class="form-control bg-dark border-secondary text-white py-2" placeholder="••••••••" required>
                    <div class="text-end mt-1">
                        <a href="#" class="extra-small text-primary-cyan text-decoration-none">Forgot Gear?</a>
                    </div>
                </div>

                <button type="submit" class="btn btn-neon-cyan w-100 py-3 mb-4 fs-6 fw-bold">
                    LOGIN TO DASHBOARD
                </button>

                <div class="text-center">
                    <p class="text-muted small">New to the club? <a href="{{ url('/#join') }}" class="text-white fw-bold">Create Account</a></p>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.bg-dark { background-color: #0f111a !important; }
.extra-small { font-size: 0.7rem; }
</style>
@endsection
