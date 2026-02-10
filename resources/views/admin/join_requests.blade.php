@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="table-header mb-4">
        <div>
            <h2 class="fw-bold fs-3 text-dark m-0">Join <span class="text-red italic text-uppercase">Requests</span></h2>
            <p class="text-dark small mt-1">Manage new member applications.</p>
        </div>
    </div>

    <div class="admin-table-card">
        <div class="table-responsive">
            <table class="table table-dark table-custom table-hover align-middle">
                <thead>
                    <tr>
                        <th>Applicant</th>
                        <th>Email</th>
                        <th>Machine</th>
                        <th>Level</th>
                        <th style="width: 30%;">Bio</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($requests as $request)
                    <tr>
                        <td class="fw-bold text-dark">{{ $request->name }}</td>
                        <td class="text-muted small">{{ $request->email }}</td>
                        <td class="text-white small">{{ $request->machine }}</td>
                        <td><span class="badge badge-custom badge-secondary">{{ $request->level }}</span></td>
                        <td class="text-muted extra-small"><div class="text-truncate" style="max-width: 200px;" title="{{ $request->bio }}">{{ $request->bio }}</div></td>
                        <td><span class="badge badge-custom badge-secondary">{{ ucfirst($request->status) }}</span></td>
                        <td class="text-muted small">{{ $request->created_at->format('M d, Y') }}</td>
                        <td class="text-end">
                            <form action="{{ route('admin.join-requests.destroy', $request->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this request?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete border-0 bg-transparent text-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-5">No join requests found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
