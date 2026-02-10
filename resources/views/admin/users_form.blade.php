@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-dark">{{ isset($user) ? 'Edit' : 'Add' }} <span class="text-red italic">User</span></h2>
        <a href="{{ route('admin.users') }}" class="btn btn-outline-secondary btn-sm rounded-pill"><i class="fas fa-arrow-left me-2"></i>Back</a>
    </div>
    
    <div class="admin-table-card p-4">
        <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Full Name</label>
                    <input type="text" name="name" class="form-control admin-input @error('name') is-invalid @enderror" value="{{ old('name', $user->name ?? '') }}" required>
                    @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Email Address</label>
                    <input type="email" name="email" class="form-control admin-input @error('email') is-invalid @enderror" value="{{ old('email', $user->email ?? '') }}" required>
                    @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Password {{ isset($user) ? '(Leave blank to keep current)' : '' }}</label>
                    <input type="password" name="password" class="form-control admin-input @error('password') is-invalid @enderror" {{ isset($user) ? '' : 'required' }}>
                    @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mt-5 text-end">
                <button type="submit" class="btn bg-gradient-red text-white px-5 rounded-pill shadow-lg fw-bold"><i class="fas fa-save me-2"></i>{{ isset($user) ? 'Update' : 'Create' }} User</button>
            </div>
        </form>
    </div>
</div>
@endsection


