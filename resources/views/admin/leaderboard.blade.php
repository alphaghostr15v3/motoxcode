@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-header-aware">Rider <span class="text-red italic">Leaderboard</span></h2>
        <a href="{{ route('admin.leaderboard.create') }}" class="btn bg-gradient-red text-white btn-sm rounded-pill border-0"><i class="fas fa-trophy me-2"></i>Add Rider</a>
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
                        <th>Rank</th>
                        <th>Rider</th>
                        <th>Category</th>
                        <th>Events</th>
                        <th>Points</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riders as $rider)
                    <tr>
                        <td>
                            @if($rider->rank == 1)
                                <i class="fas fa-crown text-warning fa-lg"></i>
                            @elseif($rider->rank == 2)
                                <i class="fas fa-crown text-secondary fa-lg"></i>
                            @elseif($rider->rank == 3)
                                <i class="fas fa-crown text-danger fa-lg"></i>
                            @else
                                <span class="fw-bold text-muted ms-1">#{{ $rider->rank }}</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle border border-secondary bg-light d-flex align-items-center justify-content-center overflow-hidden" style="width: 40px; height: 40px;">
                                    @if($rider->avatar)
                                        <img src="{{ asset($rider->avatar) }}" alt="Rider" class="w-100 h-100 object-fit-cover">
                                    @else
                                        <i class="fas fa-user-astronaut text-muted"></i>
                                    @endif
                                </div>
                                <span class="fw-bold text-header-aware small">{{ $rider->name }}</span>
                            </div>
                        </td>
                        <td><span class="badge badge-custom badge-red">{{ $rider->category }}</span></td>
                        <td class="text-center text-muted small fw-bold">{{ $rider->events_participated }}</td>
                        <td class="text-red fw-bold">{{ number_format($rider->points) }} pts</td>
                        <td class="text-end">
                            <a href="{{ route('admin.leaderboard.edit', $rider->id) }}" class="action-btn btn-edit"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('admin.leaderboard.destroy', $rider->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete bg-transparent border-0"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">No riders found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


