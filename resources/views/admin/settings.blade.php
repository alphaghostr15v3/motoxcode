@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-header-aware">System <span class="text-red italic">Settings</span></h2>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success bg-success text-white border-0 shadow-lg mb-4">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    <div class="admin-table-card p-4">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            
            <h5 class="text-red mb-4 border-bottom border-secondary pb-2">General Settings</h5>
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Site Title</label>
                    <input type="text" name="site_title" class="form-control admin-input" value="{{ $settings['site_title'] ?? 'MotoXcode' }}">
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Contact Email</label>
                    <input type="email" name="contact_email" class="form-control admin-input" value="{{ $settings['contact_email'] ?? 'admin@motoxcode.com' }}">
                </div>

                <div class="col-12">
                    <label class="form-label text-muted small text-uppercase fw-bold">Site Description</label>
                    <textarea name="site_description" class="form-control admin-input" rows="3">{{ $settings['site_description'] ?? '' }}</textarea>
                </div>
            </div>

            <h5 class="text-red mt-5 mb-4 border-bottom border-secondary pb-2">Social Media Links</h5>
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Facebook URL</label>
                    <div class="input-group">
                        <span class="input-group-text admin-input-group-text"><i class="fab fa-facebook-f"></i></span>
                        <input type="url" name="facebook_url" class="form-control admin-input" value="{{ $settings['facebook_url'] ?? '' }}">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Twitter/X URL</label>
                    <div class="input-group">
                        <span class="input-group-text admin-input-group-text"><i class="fab fa-twitter"></i></span>
                        <input type="url" name="twitter_url" class="form-control admin-input" value="{{ $settings['twitter_url'] ?? '' }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Instagram URL</label>
                    <div class="input-group">
                        <span class="input-group-text admin-input-group-text"><i class="fab fa-instagram"></i></span>
                        <input type="url" name="instagram_url" class="form-control admin-input" value="{{ $settings['instagram_url'] ?? '' }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">YouTube URL</label>
                    <div class="input-group">
                        <span class="input-group-text admin-input-group-text"><i class="fab fa-youtube"></i></span>
                        <input type="url" name="youtube_url" class="form-control admin-input" value="{{ $settings['youtube_url'] ?? '' }}">
                    </div>
                </div>
            </div>

            <div class="mt-5 text-end">
                <button type="submit" class="btn bg-gradient-red text-white px-5 rounded-pill shadow-lg fw-bold"><i class="fas fa-save me-2"></i>Save Configuration</button>
            </div>
        </form>
    </div>
</div>
@endsection


