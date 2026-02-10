@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-dark">{{ isset($event) ? 'Edit' : 'Create' }} <span class="text-red italic">Event</span></h2>
        <a href="{{ route('admin.events') }}" class="btn btn-outline-secondary btn-sm rounded-pill"><i class="fas fa-arrow-left me-2"></i>Back</a>
    </div>
    
    <div class="admin-table-card p-4">
        <form action="{{ isset($event) ? route('admin.events.update', $event->id) : route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($event))
                @method('PUT')
            @endif
            
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label text-muted small text-uppercase fw-bold">Event Title</label>
                    <input type="text" name="title" class="form-control admin-input @error('title') is-invalid @enderror" value="{{ old('title', $event->title ?? '') }}" required>
                    @error('title') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                    <label class="form-label text-muted small text-uppercase fw-bold">Category</label>
                    <select name="category" class="form-select admin-input @error('category') is-invalid @enderror">
                        <option value="Track Day" {{ (old('category', $event->category ?? '') == 'Track Day') ? 'selected' : '' }}>Track Day</option>
                        <option value="Tour" {{ (old('category', $event->category ?? '') == 'Tour') ? 'selected' : '' }}>Tour</option>
                        <option value="Meet" {{ (old('category', $event->category ?? '') == 'Meet') ? 'selected' : '' }}>Meet</option>
                        <option value="Training" {{ (old('category', $event->category ?? '') == 'Training') ? 'selected' : '' }}>Training</option>
                        <option value="Other" {{ (old('category', $event->category ?? '') == 'Other') ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('category') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-4">
                     <label class="form-label text-muted small text-uppercase fw-bold">Status</label>
                    <select name="status" class="form-select admin-input @error('status') is-invalid @enderror">
                        <option value="upcoming" {{ (old('status', $event->status ?? '') == 'upcoming') ? 'selected' : '' }}>Upcoming</option>
                        <option value="completed" {{ (old('status', $event->status ?? '') == 'completed') ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ (old('status', $event->status ?? '') == 'cancelled') ? 'selected' : '' }}>Cancelled</option>
                    </select>
                    @error('status') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Date & Time</label>
                    <input type="datetime-local" name="date" class="form-control admin-input @error('date') is-invalid @enderror" value="{{ old('date', isset($event) ? $event->date->format('Y-m-d\TH:i') : '') }}" required>
                    @error('date') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Location</label>
                    <input type="text" name="location" class="form-control admin-input" value="{{ old('location', $event->location ?? '') }}">
                </div>

                <div class="col-12">
                    <label class="form-label text-muted small text-uppercase fw-bold">Event Banner</label>
                    <input type="file" name="banner" class="form-control admin-input @error('banner') is-invalid @enderror">
                    @if(isset($event) && $event->image)
                        <div class="mt-2">
                            <img src="{{ asset($event->image) }}" width="150" class="rounded border">
                            <span class="text-muted small ms-2">Current path: {{ $event->image }}</span>
                        </div>
                    @endif
                    @error('banner') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label text-muted small text-uppercase fw-bold">Description</label>
                    <textarea name="description" class="form-control admin-input" rows="5">{{ old('description', $event->description ?? '') }}</textarea>
                </div>
            </div>

            <div class="mt-5 text-end">
                <button type="submit" class="btn bg-gradient-red text-white px-5 rounded-pill shadow-lg fw-bold"><i class="fas fa-save me-2"></i>{{ isset($event) ? 'Update' : 'Create' }} Event</button>
            </div>
        </form>
    </div>
</div>
@endsection


