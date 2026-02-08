@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-white">{{ isset($image) ? 'Edit' : 'Upload' }} <span class="text-red italic">Photo</span></h2>
        <a href="{{ route('admin.gallery') }}" class="btn btn-outline-secondary btn-sm rounded-pill"><i class="fas fa-arrow-left me-2"></i>Back</a>
    </div>
    
    <div class="admin-table-card p-4">
        <form action="{{ isset($image) ? route('admin.gallery.update', $image->id) : route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($image))
                @method('PUT')
            @endif
            
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label text-muted small text-uppercase fw-bold">{{ isset($image) ? 'Change Photo' : 'Choose Photo' }}</label>
                    <input type="file" name="image" class="form-control admin-input" {{ isset($image) ? '' : 'required' }}>
                    @if(isset($image))
                        <div class="mt-2">
                            <img src="{{ asset($image->image_path) }}" width="100" class="rounded border">
                            <span class="text-muted small ms-2">Current path: {{ $image->image_path }}</span>
                        </div>
                    @endif
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Caption</label>
                    <input type="text" name="caption" class="form-control bg-dark border-secondary text-white" value="{{ old('caption', $image->caption ?? '') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Category</label>
                    <select name="category" class="form-select bg-dark border-secondary text-white">
                        <option value="General" {{ (old('category', $image->category ?? '') == 'General') ? 'selected' : '' }}>General</option>
                        <option value="Events" {{ (old('category', $image->category ?? '') == 'Events') ? 'selected' : '' }}>Events</option>
                        <option value="Rides" {{ (old('category', $image->category ?? '') == 'Rides') ? 'selected' : '' }}>Rides</option>
                        <option value="Members" {{ (old('category', $image->category ?? '') == 'Members') ? 'selected' : '' }}>Members</option>
                    </select>
                </div>

                <div class="col-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" {{ old('is_featured', $image->is_featured ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label text-white" for="is_featured">Featured Image</label>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-end">
                <button type="submit" class="btn bg-gradient-cyan text-white px-5 rounded-pill shadow-lg fw-bold"><i class="fas fa-save me-2"></i>{{ isset($image) ? 'Update' : 'Upload' }} Photo</button>
            </div>
        </form>
    </div>
</div>
@endsection


