@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-header-aware">Members <span class="text-red italic">Management</span></h2>
        <a href="{{ route('admin.members.create') }}" class="btn btn-outline-red btn-sm rounded-pill"><i class="fas fa-plus me-2"></i>Add Member</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success bg-success text-dark border-0 shadow-lg mb-4">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    <div class="admin-table-card p-4">
        <div class="table-responsive">
            <table class="table table-custom table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $member)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle border border-secondary bg-light d-flex align-items-center justify-content-center overflow-hidden" style="width: 35px; height: 35px;">
                                    @if($member->image)
                                        <img src="{{ asset($member->image) }}" class="w-100 h-100 object-fit-cover">
                                    @else
                                        <i class="fas fa-user text-muted"></i>
                                    @endif
                                </div>
                                <div>
                                    <p class="m-0 fw-bold text-header-aware small">{{ $member->name }}</p>
                                    <p class="m-0 text-muted extra-small">{{ $member->email }}</p>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge badge-custom badge-red">{{ $member->role }}</span></td>
                        <td>
                            @if($member->status == 'active')
                                <span class="text-success extra-small fw-bold"><i class="fas fa-circle extra-small me-1"></i> Active</span>
                            @else
                                <span class="text-danger extra-small fw-bold"><i class="fas fa-circle extra-small me-1"></i> Inactive</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.members.edit', $member->id) }}" class="action-btn btn-edit"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete bg-transparent border-0"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">No members found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


