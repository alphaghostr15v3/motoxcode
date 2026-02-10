@extends('layouts.member')

@section('content')
<div class="container-fluid p-0">
    <div class="mb-4">
        <h2 class="fw-bold fs-4 m-0 text-header-aware">Member <span class="text-red italic">Dashboard</span></h2>
        <p class="text-muted small">Welcome back, {{ $member->name }}! Here's your riding overview.</p>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="admin-table-card p-4 d-flex align-items-center gap-4 h-100">
                <div class="rounded-circle bg-light border border-secondary d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-id-card text-red fs-4"></i>
                </div>
                <div>
                    <p class="text-muted small mb-1 uppercase fw-bold ls-1 italic">Member Status</p>
                    <h3 class="fw-black m-0 italic">{{ strtoupper($member->status) }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="admin-table-card p-4 d-flex align-items-center gap-4 h-100">
                <div class="rounded-circle bg-light border border-secondary d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-calendar-check text-red fs-4"></i>
                </div>
                <div>
                    <p class="text-muted small mb-1 uppercase fw-bold ls-1 italic">Upcoming Events</p>
                    <h3 class="fw-black m-0 italic">{{ $upcomingEvents->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="admin-table-card p-4 d-flex align-items-center gap-4 h-100">
                <div class="rounded-circle bg-light border border-secondary d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                    <i class="fas fa-clock text-red fs-4"></i>
                </div>
                <div>
                    <p class="text-muted small mb-1 uppercase fw-bold ls-1 italic">Member Since</p>
                    <h3 class="fw-black m-0 italic" style="font-size: 1.2rem;">{{ $member->created_at->format('M Y') }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="admin-table-card p-4">
        <h5 class="fw-bold mb-4 italic uppercase ls-1"><i class="fas fa-calendar-alt text-red me-2"></i> Upcoming Events</h5>
        <div class="table-responsive">
            <table class="table table-custom table-hover">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th class="text-end">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($upcomingEvents as $event)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-2 border border-secondary overflow-hidden" style="width: 40px; height: 40px;">
                                    <img src="{{ asset($event->image ?? 'images/event-placeholder.jpg') }}" width="40" height="40" style="object-fit: cover;">
                                </div>
                                <span class="fw-bold text-header-aware small">{{ $event->title }}</span>
                            </div>
                        </td>
                        <td class="text-muted small">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</td>
                        <td class="text-muted small">{{ $event->location }}</td>
                        <td class="text-end">
                            <span class="badge bg-gradient-red rounded-pill px-3">{{ strtoupper($event->status) }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">No upcoming events found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
