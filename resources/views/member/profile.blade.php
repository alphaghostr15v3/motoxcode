@extends('layouts.member')

@section('content')
<div class="container-fluid p-0">
    <div class="mb-4">
        <h2 class="fw-bold fs-4 m-0 text-header-aware">Member <span class="text-red italic">Profile</span></h2>
        <p class="text-muted small">Update your personal information and profile picture.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success bg-success text-dark border-0 shadow-lg mb-4">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <div class="admin-table-card p-4">
                <form action="{{ route('member.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row g-4">
                        <div class="col-md-12 text-center mb-2">
                            <div class="position-relative d-inline-block">
                                @if($member->image)
                                    <img src="{{ asset($member->image) }}" class="rounded-circle border border-4 border-light shadow" width="120" height="120" style="object-fit: cover;">
                                @else
                                    <div class="rounded-circle border border-4 border-light shadow bg-light d-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                                        <i class="fas fa-user text-muted fs-1"></i>
                                    </div>
                                @endif
                                <label for="photo" class="position-absolute bottom-0 end-0 bg-gradient-red text-white rounded-circle p-2 cursor-pointer shadow border border-2 border-white" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                    <i class="fas fa-camera fs-6"></i>
                                    <input type="file" name="photo" id="photo" class="d-none">
                                </label>
                            </div>
                            <p class="text-muted extra-small mt-2 uppercase fw-bold italic">Upload new photo</p>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label uppercase fw-bold italic small ls-1">Full Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $member->name) }}" required>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label uppercase fw-bold italic small ls-1">Email Address</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $member->email) }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12">
                            <label class="form-label uppercase fw-bold italic small ls-1">Bio / Rider Motto</label>
                            <textarea name="bio" class="form-control @error('bio') is-invalid @enderror" rows="3">{{ old('bio', $member->bio) }}</textarea>
                            @error('bio') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-12 mt-5">
                            <h6 class="fw-bold italic uppercase ls-1 border-bottom pb-2 mb-3"><i class="fas fa-lock text-red me-2"></i> Security</h6>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label uppercase fw-bold italic small ls-1">New Password (leave blank to keep current)</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label uppercase fw-bold italic small ls-1">Confirm New Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <div class="col-12 text-end mt-4">
                            <button type="submit" class="btn bg-gradient-red text-white rounded-pill px-5 fw-bold italic border-0 shadow-lg">UPDATE PROFILE</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-lg-4">
             <div class="admin-table-card p-4">
                <h6 class="fw-bold italic uppercase ls-1 border-bottom pb-2 mb-3">Member Info</h6>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">Rider ID</span>
                        <span class="fw-bold small">#MTC-{{ str_pad($member->id, 4, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">Member Role</span>
                        <span class="badge bg-light text-dark border small px-3">{{ $member->role }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">Account Status</span>
                        <span class="text-success small fw-bold"><i class="fas fa-check-circle me-1"></i> {{ strtoupper($member->status) }}</span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span class="text-muted small">Last Updated</span>
                        <span class="text-muted small">{{ $member->updated_at->diffForHumans() }}</span>
                    </div>
                </div>
                
                <hr class="my-4">
                
                <div class="alert alert-info border-0 shadow-sm small">
                    <i class="fas fa-info-circle me-2"></i> Your profile information is visible to other members on the leaderboard and gallery.
                </div>
             </div>
        </div>
    </div>
</div>
@endsection
