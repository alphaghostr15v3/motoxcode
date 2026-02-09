@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold fs-3 text-dark m-0">Performance <span class="text-red italic text-uppercase">Analysis</span></h2>
            <p class="text-dark small mt-1">Real-time data overview of your community.</p>
        </div>
        <div class="d-flex gap-2">
             <button class="btn btn-outline-secondary btn-sm rounded-pill px-3"><i class="fas fa-download me-2"></i>Export</button>
            <button class="btn bg-gradient-red text-white btn-sm rounded-pill px-3 border-0 shadow-lg fw-bold"><i class="fas fa-sync-alt me-2"></i>Refresh Data</button>
        </div>
    </div>

    <!-- Widgets -->
    <div class="row g-4 mb-5">
        <div class="col-md-4 col-xl-2">
            <div class="stat-card">
                <p class="stat-label">Total Members</p>
                <h3 class="stat-value text-red">{{ number_format($stats['members']) }}</h3>
                <p class="text-success extra-small mb-0 fw-bold italic"><i class="fas fa-arrow-up me-1"></i>12% INCREASE</p>
                <i class="fas fa-users stat-icon-bg"></i>
            </div>
        </div>
        <div class="col-md-4 col-xl-2">
            <div class="stat-card">
                <p class="stat-label">Upcoming Events</p>
                <h3 class="stat-value text-red">{{ $stats['upcoming_events'] }}</h3>
                <p class="text-muted extra-small mb-0">Live Schedule</p>
                <i class="fas fa-calendar-alt stat-icon-bg"></i>
            </div>
        </div>
        <div class="col-md-4 col-xl-2">
            <div class="stat-card">
                <p class="stat-label">Total Blogs</p>
                <h3 class="stat-value">{{ $stats['blogs'] }}</h3>
                <p class="text-muted extra-small mb-0">Community Posts</p>
                <i class="fas fa-newspaper stat-icon-bg"></i>
            </div>
        </div>
        <div class="col-md-4 col-xl-2">
            <div class="stat-card">
                <p class="stat-label">Gallery Count</p>
                <h3 class="stat-value">{{ $stats['gallery'] }}</h3>
                <p class="text-muted extra-small mb-0">High-res assets</p>
                <i class="fas fa-images stat-icon-bg"></i>
            </div>
        </div>
        <div class="col-md-8 col-xl-4">
            <div class="stat-card">
                <p class="stat-label">New Messages</p>
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="stat-value text-red">{{ $stats['messages'] }}</h3>
                    <div class="d-flex gap-2">
                        <span class="badge badge-custom badge-red">Urgent: {{ $stats['urgent_messages'] }}</span>
                        <span class="badge badge-custom badge-secondary">Pending: {{ $stats['messages'] }}</span>
                    </div>
                </div>
                <i class="fas fa-envelope stat-icon-bg"></i>
            </div>
        </div>
    </div>

    <!-- Tables Row -->
    <div class="row g-4">
        <!-- Members Table -->
        <div class="col-xl-8">
            <div class="admin-table-card h-100">
                <div class="table-header">
                    <h5 class="fw-bold m-0 text-dark">Recent <span class="text-red">Riders</span></h5>
                    <a href="#" class="text-red text-decoration-none small fw-bold italic text-uppercase">View Full List <i class="fas fa-arrow-right ms-1"></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark table-custom table-hover">
                        <thead>
                            <tr>
                                <th>Member</th>
                                <th>Level</th>
                                <th>Joined</th>
                                <th>Status</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentMembers as $member)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="rounded-circle border border-secondary bg-light d-flex align-items-center justify-content-center overflow-hidden" style="width: 35px; height: 35px;">
                                            @if($member->image)
                                                <img src="{{ asset($member->image) }}" class="w-100 h-100 object-fit-cover">
                                            @else
                                                <i class="fas fa-user text-muted extra-small"></i>
                                            @endif
                                        </div>
                                        <div>
                                            <p class="m-0 fw-bold text-dark small">{{ $member->name }}</p>
                                            <p class="m-0 text-muted extra-small">{{ $member->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-custom {{ str_contains(strtolower($member->role), 'rider') ? 'badge-red' : 'text-dark border-secondary' }}">{{ strtoupper($member->role ?? 'MEMBER') }}</span></td>
                                <td class="text-muted small">{{ $member->created_at->format('M d, Y') }}</td>
                                <td>
                                    @if($member->status == 'active')
                                        <span class="text-success extra-small fw-bold"><i class="fas fa-circle extra-small me-1"></i> Active</span>
                                    @else
                                        <span class="text-warning extra-small fw-bold"><i class="fas fa-circle extra-small me-1"></i> {{ ucfirst($member->status ?? 'Pending') }}</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.members.edit', $member->id) }}" class="action-btn btn-edit"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No recent riders found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar List (Upcoming Events) -->
        <div class="col-xl-4">
            <div class="admin-table-card h-100 p-4">
                <h5 class="fw-bold mb-4 text-dark">Next <span class="text-red">Events</span></h5>
                <div class="vstack gap-3">
                    @forelse($upcomingEvents as $event)
                    <div class="p-3 border-start border-3 {{ $loop->first ? 'border-red shadow-sm' : ($loop->index == 1 ? 'border-orange' : 'border-cyan') }} bg-dark-soft transition-hover" style="background: rgba(0,0,0,0.02);">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <h6 class="m-0 fw-bold text-dark">{{ $event->title }}</h6>
                            <span class="badge badge-custom badge-red">{{ $event->date->format('M d') }}</span>
                        </div>
                        <p class="m-0 text-muted extra-small"><i class="fas fa-map-marker-alt me-2 text-red"></i>{{ $event->location }}</p>
                    </div>
                    @empty
                    <p class="text-muted small text-center py-3">No upcoming events.</p>
                    @endforelse
                </div>
                <button class="btn btn-outline-secondary w-100 mt-4 btn-sm">View All Events</button>
            </div>
        </div>
    </div>

    <!-- Second Row (Blogs) -->
    <div class="row mt-4 mb-5">
        <div class="col-12">
            <div class="admin-table-card">
                <div class="table-header">
                    <h5 class="fw-bold m-0 text-dark">Community <span class="text-red">Blogs</span></h5>
                    <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus me-2"></i>Create New</button>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark table-custom table-hover">
                        <thead>
                            <tr>
                                <th style="width: 40%">Topic</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentBlogs as $blog)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3 rounded overflow-hidden" style="width: 50px; height: 35px;">
                                            @if($blog->image)
                                                <img src="{{ asset($blog->image) }}" style="width: 100%; height: 100%; object-fit: cover;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center h-100"><i class="fas fa-image text-muted"></i></div>
                                            @endif
                                        </div>
                                        <p class="m-0 fw-bold text-dark small text-truncate" style="max-width: 250px;">{{ $blog->title }}</p>
                                    </div>
                                </td>
                                <td><span class="badge badge-custom badge-secondary text-uppercase" style="font-size: 0.6rem;">Community</span></td>
                                <td class="text-muted small">{{ $blog->author }}</td>
                                <td class="text-muted small">{{ $blog->created_at->format('M d, Y') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="action-btn btn-edit"><i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No recent blog posts.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.italic { font-style: italic; }
.extra-small { font-size: 0.75rem; }
.cursor-pointer { cursor: pointer; }
.ls-1 { letter-spacing: 0.5px; }
.hover-bg-danger-soft:hover { background: rgba(220, 53, 69, 0.1); }
.border-orange { border-color: var(--primary-orange) !important; }
.border-cyan { border-color: var(--primary-cyan) !important; }
</style>
@endsection


