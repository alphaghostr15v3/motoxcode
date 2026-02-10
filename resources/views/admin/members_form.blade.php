@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-dark">{{ isset($member) ? 'Edit' : 'Create' }} <span class="text-red italic">Member</span></h2>
        <a href="{{ route('admin.members') }}" class="btn btn-outline-secondary btn-sm rounded-pill"><i class="fas fa-arrow-left me-2"></i>Back</a>
    </div>
    
    <div class="admin-table-card p-4">
        <form action="{{ isset($member) ? route('admin.members.update', $member->id) : route('admin.members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($member))
                @method('PUT')
            @endif
            
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Full Name</label>
                    <input type="text" name="name" class="form-control admin-input" value="{{ old('name', $member->name ?? '') }}" required>
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Profile Photo</label>
                    <input type="file" name="photo" class="form-control admin-input">
                    @if(isset($member) && $member->image)
                        <div class="mt-2">
                            <img src="{{ asset($member->image) }}" width="60" class="rounded-circle border">
                            <span class="text-muted small ms-2">Current path: {{ $member->image }}</span>
                        </div>
                    @endif
                </div>
                
                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Email Address</label>
                    <input type="email" name="email" class="form-control admin-input" value="{{ old('email', $member->email ?? '') }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Role</label>
                    <select name="role" class="form-select admin-input">
                        <option value="Member" {{ (old('role', $member->role ?? '') == 'Member') ? 'selected' : '' }}>Member</option>
                        <option value="President" {{ (old('role', $member->role ?? '') == 'President') ? 'selected' : '' }}>President</option>
                        <option value="Vice President" {{ (old('role', $member->role ?? '') == 'Vice President') ? 'selected' : '' }}>Vice President</option>
                        <option value="Secretary" {{ (old('role', $member->role ?? '') == 'Secretary') ? 'selected' : '' }}>Secretary</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Status</label>
                    <select name="status" class="form-select admin-input">
                        <option value="active" {{ (old('status', $member->status ?? '') == 'active') ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ (old('status', $member->status ?? '') == 'inactive') ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Password {{ isset($member) ? '(Leave blank to keep current)' : '' }}</label>
                    <input type="password" name="password" class="form-control admin-input" {{ isset($member) ? '' : 'required' }}>
                </div>

                <div class="col-12">
                    <label class="form-label text-muted small text-uppercase fw-bold">Bio</label>
                    <textarea name="bio" class="form-control admin-input" rows="3">{{ old('bio', $member->bio ?? '') }}</textarea>
                </div>
            </div>

            <div class="mt-5 text-end">
                <button type="submit" class="btn bg-gradient-cyan text-white px-5 rounded-pill shadow-lg fw-bold"><i class="fas fa-save me-2"></i>{{ isset($member) ? 'Update' : 'Create' }} Member</button>
            </div>
        </form>
    </div>
</div>
@endsection


