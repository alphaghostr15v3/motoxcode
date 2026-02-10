@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-dark">{{ isset($rule) ? 'Edit' : 'Add' }} <span class="text-red italic">Safety Rule</span></h2>
        <a href="{{ route('admin.safety') }}" class="btn btn-outline-secondary btn-sm rounded-pill"><i class="fas fa-arrow-left me-2"></i>Back</a>
    </div>
    
    <div class="admin-table-card p-4">
        <form action="{{ isset($rule) ? route('admin.safety.update', $rule->id) : route('admin.safety.store') }}" method="POST">
            @csrf
            @if(isset($rule))
                @method('PUT')
            @endif
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Rule Title</label>
                    <input type="text" name="title" class="form-control admin-input @error('title') is-invalid @enderror" value="{{ old('title', $rule->title ?? '') }}" required>
                    @error('title') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Icon Class (FontAwesome)</label>
                    <input type="text" name="icon" class="form-control admin-input @error('icon') is-invalid @enderror" value="{{ old('icon', $rule->icon ?? 'fas fa-shield-alt') }}">
                    @error('icon') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label text-muted small text-uppercase fw-bold">Description</label>
                    <textarea name="description" class="form-control admin-input @error('description') is-invalid @enderror" rows="4" required>{{ old('description', $rule->description ?? '') }}</textarea>
                    @error('description') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                     <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" {{ old('is_active', $rule->is_active ?? true) ? 'checked' : '' }}>
                        <label class="form-check-label text-dark" for="is_active">Active</label>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-end">
                <button type="submit" class="btn bg-gradient-red text-white px-5 rounded-pill shadow-lg fw-bold"><i class="fas fa-save me-2"></i>{{ isset($rule) ? 'Update' : 'Add' }} Rule</button>
            </div>
        </form>
    </div>
</div>
@endsection


