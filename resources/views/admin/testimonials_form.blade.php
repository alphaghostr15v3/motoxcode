@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-dark">{{ isset($testimonial) ? 'Edit' : 'Add' }} <span class="text-red italic">Testimonial</span></h2>
        <a href="{{ route('admin.testimonials') }}" class="btn btn-outline-secondary btn-sm rounded-pill"><i class="fas fa-arrow-left me-2"></i>Back</a>
    </div>
    
    <div class="admin-table-card p-4">
        <form action="{{ isset($testimonial) ? route('admin.testimonials.update', $testimonial->id) : route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($testimonial))
                @method('PUT')
            @endif
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Client Name</label>
                    <input type="text" name="name" class="form-control admin-input @error('name') is-invalid @enderror" value="{{ old('name', $testimonial->name ?? '') }}" required>
                    @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Role / Title</label>
                    <input type="text" name="role" class="form-control admin-input @error('role') is-invalid @enderror" value="{{ old('role', $testimonial->role ?? '') }}" placeholder="e.g. Member, CEO">
                    @error('role') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Rating (1-5)</label>
                    <select name="rating" class="form-select admin-input @error('rating') is-invalid @enderror">
                        <option value="5" {{ (old('rating', $testimonial->rating ?? 5) == 5) ? 'selected' : '' }}>5 Stars</option>
                        <option value="4" {{ (old('rating', $testimonial->rating ?? 5) == 4) ? 'selected' : '' }}>4 Stars</option>
                        <option value="3" {{ (old('rating', $testimonial->rating ?? 5) == 3) ? 'selected' : '' }}>3 Stars</option>
                        <option value="2" {{ (old('rating', $testimonial->rating ?? 5) == 2) ? 'selected' : '' }}>2 Stars</option>
                        <option value="1" {{ (old('rating', $testimonial->rating ?? 5) == 1) ? 'selected' : '' }}>1 Star</option>
                    </select>
                    @error('rating') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Client Photo</label>
                    <input type="file" name="image_file" class="form-control admin-input @error('image_file') is-invalid @enderror">
                    @if(isset($testimonial) && $testimonial->image)
                        <div class="mt-2">
                            <img src="{{ asset($testimonial->image) }}" width="60" class="rounded-circle border">
                            <span class="text-muted small ms-2">Current path: {{ $testimonial->image }}</span>
                        </div>
                    @endif
                    @error('image_file') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label text-muted small text-uppercase fw-bold">Message</label>
                    <textarea name="message" class="form-control admin-input @error('message') is-invalid @enderror" rows="4" required>{{ old('message', $testimonial->message ?? '') }}</textarea>
                    @error('message') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                     <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label text-dark" for="is_active">Active</label>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-end">
                <button type="submit" class="btn bg-gradient-red text-white px-5 rounded-pill shadow-lg fw-bold"><i class="fas fa-save me-2"></i>{{ isset($testimonial) ? 'Update' : 'Add' }} Testimonial</button>
            </div>
        </form>
    </div>
</div>
@endsection


