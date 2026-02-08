@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-header-aware">Upcoming <span class="text-red italic">Events</span></h2>
        <a href="{{ route('admin.events.create') }}" class="btn bg-gradient-red text-white btn-sm rounded-pill border-0"><i class="fas fa-plus me-2"></i>Create Event</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success bg-success text-white border-0 shadow-lg mb-4">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    <div class="admin-table-card p-4">
        <div class="table-responsive">
            <table class="table table-custom table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date & Time</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-3 border border-secondary bg-dark d-flex align-items-center justify-content-center overflow-hidden" style="width: 40px; height: 40px;">
                                    @if($event->image)
                                        <img src="{{ $event->image }}" alt="Event" class="w-100 h-100 object-fit-cover">
                                    @else
                                        <i class="fas fa-calendar-alt text-muted"></i>
                                    @endif
                                </div>
                                <span class="fw-bold text-header-aware small">{{ $event->title }}</span>
                            </div>
                        </td>
                        <td class="text-muted small">{{ $event->date->format('M d, Y h:i A') }}</td>
                        <td class="text-muted small"><i class="fas fa-map-marker-alt text-red me-1"></i> {{ $event->location ?? 'TBD' }}</td>
                        <td>
                            @if($event->status == 'upcoming')
                                <span class="badge badge-custom badge-red">Upcoming</span>
                            @elseif($event->status == 'completed')
                                <span class="badge badge-custom badge-success">Completed</span>
                            @else
                                <span class="badge badge-custom badge-danger">Cancelled</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="action-btn btn-edit"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete bg-transparent border-0"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No events found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


