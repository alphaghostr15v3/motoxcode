@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-white">{{ isset($event) ? 'Edit' : 'Create' }} <span class="text-red italic">Event</span></h2>
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
                    <input type="text" name="title" class="form-control bg-dark border-secondary text-white" value="{{ old('title', $event->title ?? '') }}" required>
                </div>

                <div class="col-md-4">
                     <label class="form-label text-muted small text-uppercase fw-bold">Status</label>
                    <select name="status" class="form-select bg-dark border-secondary text-white">
                        <option value="upcoming" {{ (old('status', $event->status ?? '') == 'upcoming') ? 'selected' : '' }}>Upcoming</option>
                        <option value="completed" {{ (old('status', $event->status ?? '') == 'completed') ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ (old('status', $event->status ?? '') == 'cancelled') ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Date & Time</label>
                    <input type="datetime-local" name="date" class="form-control bg-dark border-secondary text-white" value="{{ old('date', isset($event) ? $event->date->format('Y-m-d\TH:i') : '') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Location</label>
                    <input type="text" name="location" class="form-control bg-dark border-secondary text-white" value="{{ old('location', $event->location ?? '') }}">
                </div>

                <div class="col-12">
                    <label class="form-label text-muted small text-uppercase fw-bold">Event Banner</label>
                    <input type="file" name="banner" class="form-control admin-input">
                    @if(isset($event) && $event->image)
                        <div class="mt-2">
                            <img src="{{ asset($event->image) }}" width="150" class="rounded border">
                            <span class="text-muted small ms-2">Current path: {{ $event->image }}</span>
                        </div>
                    @endif
                </div>

                <div class="col-12">
                    <label class="form-label text-muted small text-uppercase fw-bold">Description</label>
                    <textarea name="description" class="form-control bg-dark border-secondary text-white" rows="5">{{ old('description', $event->description ?? '') }}</textarea>
                </div>
            </div>

            <div class="mt-5 text-end">
                <button type="submit" class="btn bg-gradient-red text-white px-5 rounded-pill shadow-lg fw-bold"><i class="fas fa-save me-2"></i>{{ isset($event) ? 'Update' : 'Create' }} Event</button>
            </div>
        </form>
    </div>
</div>
@endsection


