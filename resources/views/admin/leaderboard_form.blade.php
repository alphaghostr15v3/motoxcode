@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-white">{{ isset($rider) ? 'Edit' : 'Add' }} <span class="text-red italic">Rider</span></h2>
        <a href="{{ route('admin.leaderboard') }}" class="btn btn-outline-secondary btn-sm rounded-pill"><i class="fas fa-arrow-left me-2"></i>Back</a>
    </div>
    
    <div class="admin-table-card p-4">
        <form action="{{ isset($rider) ? route('admin.leaderboard.update', $rider->id) : route('admin.leaderboard.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($rider))
                @method('PUT')
            @endif
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Rider Name</label>
                    <input type="text" name="name" class="form-control bg-dark border-secondary text-white" value="{{ old('name', $rider->name ?? '') }}" required>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Category</label>
                    <select name="category" class="form-select bg-dark border-secondary text-white">
                        <option value="Male" {{ (old('category', $rider->category ?? '') == 'Male') ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ (old('category', $rider->category ?? '') == 'Female') ? 'selected' : '' }}>Female</option>
                        <option value="Junior" {{ (old('category', $rider->category ?? '') == 'Junior') ? 'selected' : '' }}>Junior</option>
                        <option value="Senior" {{ (old('category', $rider->category ?? '') == 'Senior') ? 'selected' : '' }}>Senior</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Points</label>
                    <input type="number" name="points" class="form-control bg-dark border-secondary text-white" value="{{ old('points', $rider->points ?? 0) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Events Participated</label>
                    <input type="number" name="events_participated" class="form-control bg-dark border-secondary text-white" value="{{ old('events_participated', $rider->events_participated ?? 0) }}">
                </div>

                <div class="col-12">
                    <label class="form-label text-muted small text-uppercase fw-bold">Rider Photo</label>
                    <input type="file" name="avatar_file" class="form-control admin-input">
                    @if(isset($rider) && $rider->avatar)
                        <div class="mt-2">
                            <img src="{{ asset($rider->avatar) }}" width="80" class="rounded border">
                            <span class="text-muted small ms-2">Current path: {{ $rider->avatar }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-5 text-end">
                <button type="submit" class="btn bg-gradient-red text-white px-5 rounded-pill shadow-lg fw-bold"><i class="fas fa-save me-2"></i>{{ isset($rider) ? 'Update' : 'Add' }} Rider</button>
            </div>
        </form>
    </div>
</div>
@endsection


