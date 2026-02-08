@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h2 class="fw-bold fs-3 text-white m-0">Performance <span class="text-red italic text-uppercase">Analysis</span></h2>
            <p class="text-muted small mt-1">Real-time data overview of your community.</p>
        </div>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary btn-sm rounded-pill px-3"><i class="fas fa-download me-2"></i>Export</button>
            <button class="btn bg-gradient-red text-white btn-sm rounded-pill px-3 border-0 shadow-lg"><i class="fas fa-sync-alt me-2"></i>Refresh Data</button>
        </div>
    </div>

    <!-- Widgets -->
    <div class="row g-4 mb-5">
        <div class="col-md-4 col-xl-2">
            <div class="stat-card">
                <p class="stat-label">Total Members</p>
                <h3 class="stat-value text-red">1,284</h3>
                <p class="text-success extra-small mb-0 fw-bold italic"><i class="fas fa-arrow-up me-1"></i>12% INCREASE</p>
                <i class="fas fa-users stat-icon-bg"></i>
            </div>
        </div>
        <div class="col-md-4 col-xl-2">
            <div class="stat-card">
                <p class="stat-label">Upcoming Events</p>
                <h3 class="stat-value text-red">14</h3>
                <p class="text-muted extra-small mb-0">Avg 3 per week</p>
                <i class="fas fa-calendar-alt stat-icon-bg"></i>
            </div>
        </div>
        <div class="col-md-4 col-xl-2">
            <div class="stat-card">
                <p class="stat-label">Total Blogs</p>
                <h3 class="stat-value">45</h3>
                <p class="text-muted extra-small mb-0">3 pending review</p>
                <i class="fas fa-newspaper stat-icon-bg"></i>
            </div>
        </div>
        <div class="col-md-4 col-xl-2">
            <div class="stat-card">
                <p class="stat-label">Gallery Count</p>
                <h3 class="stat-value">852</h3>
                <p class="text-muted extra-small mb-0">High-res assets</p>
                <i class="fas fa-images stat-icon-bg"></i>
            </div>
        </div>
        <div class="col-md-8 col-xl-4">
            <div class="stat-card">
                <p class="stat-label">New Messages</p>
                <div class="d-flex align-items-center justify-content-between">
                    <h3 class="stat-value text-red">28</h3>
                    <div class="d-flex gap-2">
                        <span class="badge badge-custom badge-red">Urgent: 2</span>
                        <span class="badge badge-custom text-white border-secondary">General: 12</span>
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
                    <h5 class="fw-bold m-0 text-white">Recent <span class="text-red">Riders</span></h5>
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
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="https://i.pravatar.cc/150?u=12" class="rounded-circle border border-secondary" width="35" height="35">
                                        <div>
                                            <p class="m-0 fw-bold text-white small">Alex Reed</p>
                                            <p class="m-0 text-muted extra-small">alex@nitro.com</p>
                                        </div>
                                    </div>
                                </td>
                                 <td><span class="badge badge-custom badge-red">PRO RIDER</span></td>
                                <td>Feb 08, 2026</td>
                                <td><span class="text-success extra-small fw-bold"><i class="fas fa-circle extra-small me-1"></i> Active</span></td>
                                <td class="text-end">
                                    <button class="action-btn btn-view"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn btn-edit"><i class="fas fa-pen"></i></button>
                                    <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="https://i.pravatar.cc/150?u=15" class="rounded-circle border border-secondary" width="35" height="35">
                                        <div>
                                            <p class="m-0 fw-bold text-white small">Sarah Jones</p>
                                            <p class="m-0 text-muted extra-small">sarah@trail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-custom text-white border-secondary">Amateur</span></td>
                                <td>Feb 07, 2026</td>
                                <td><span class="text-success extra-small fw-bold"><i class="fas fa-circle extra-small me-1"></i> Active</span></td>
                                <td class="text-end">
                                    <button class="action-btn btn-view"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn btn-edit"><i class="fas fa-pen"></i></button>
                                    <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="https://i.pravatar.cc/150?u=18" class="rounded-circle border border-secondary" width="35" height="35">
                                        <div>
                                            <p class="m-0 fw-bold text-white small">Leon Volkov</p>
                                            <p class="m-0 text-muted extra-small">leon@grip.com</p>
                                        </div>
                                    </div>
                                </td>
                                 <td><span class="badge badge-custom badge-red">ELITE RIDER</span></td>
                                <td>Feb 05, 2026</td>
                                <td><span class="text-warning extra-small fw-bold"><i class="fas fa-circle extra-small me-1"></i> Pending</span></td>
                                <td class="text-end">
                                    <button class="action-btn btn-view"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn btn-edit"><i class="fas fa-pen"></i></button>
                                    <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <img src="https://i.pravatar.cc/150?u=20" class="rounded-circle border border-secondary" width="35" height="35">
                                        <div>
                                            <p class="m-0 fw-bold text-white small">Emily Blunt</p>
                                            <p class="m-0 text-muted extra-small">emily@flow.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge badge-custom text-white border-secondary">Expert</span></td>
                                <td>Feb 04, 2026</td>
                                <td><span class="text-success extra-small fw-bold"><i class="fas fa-circle extra-small me-1"></i> Active</span></td>
                                <td class="text-end">
                                    <button class="action-btn btn-view"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn btn-edit"><i class="fas fa-pen"></i></button>
                                    <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar List (Upcoming Events) -->
        <div class="col-xl-4">
            <div class="admin-table-card h-100 p-4">
                <h5 class="fw-bold mb-4 text-white">Next <span class="text-red">Events</span></h5>
                <div class="vstack gap-3">
                    <div class="p-3 border-start border-3 border-orange bg-dark-soft transition-hover" style="background: rgba(255,106,0,0.05);">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <h6 class="m-0 fw-bold text-white">Midnight Trail Blast</h6>
                            <span class="badge badge-custom badge-red">Feb 25</span>
                        </div>
                        <p class="m-0 text-muted small"><i class="fas fa-map-marker-alt me-2 text-red"></i>Blackwood Forest</p>
                    </div>
                    <div class="p-3 border-start border-3 border-cyan bg-dark-soft transition-hover" style="background: rgba(0,217,255,0.05);">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <h6 class="m-0 fw-bold text-white">Downhill Championship</h6>
                            <span class="badge badge-custom badge-red">Mar 12</span>
                        </div>
                        <p class="m-0 text-muted small"><i class="fas fa-map-marker-alt me-2 text-red"></i>Apex Mountain Reserve</p>
                    </div>
                    <div class="p-3 border-start border-3 border-secondary bg-dark-soft transition-hover" style="background: rgba(255,255,255,0.02);">
                        <div class="d-flex justify-content-between align-items-start mb-1">
                            <h6 class="m-0 fw-bold text-white">Rookie Training Camp</h6>
                            <span class="badge badge-custom text-white border-secondary">Apr 05</span>
                        </div>
                        <p class="m-0 text-muted small"><i class="fas fa-map-marker-alt me-2 text-muted"></i>Base Camp Alpha</p>
                    </div>
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
                    <h5 class="fw-bold m-0 text-white">Community <span class="text-red">Blogs</span></h5>
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
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3 rounded overflow-hidden" style="width: 50px; height: 35px;">
                                            <img src="https://loremflickr.com/320/240/mountainbike" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                        <p class="m-0 fw-bold text-white small">Optimal Tire Pressure for Muddy Trails</p>
                                    </div>
                                </td>
                                 <td><span class="badge badge-custom badge-red">Technical</span></td>
                                <td class="text-muted small">Alex Nitro</td>
                                <td class="text-muted small">Jan 15, 2026</td>
                                <td class="text-end">
                                    <button class="action-btn btn-view"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn btn-edit"><i class="fas fa-pen"></i></button>
                                    <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                             <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3 rounded overflow-hidden" style="width: 50px; height: 35px;">
                                            <img src="https://loremflickr.com/320/240/forest" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                        <p class="m-0 fw-bold text-white small">Top 10 Trails for Beginners in 2026</p>
                                    </div>
                                </td>
                                 <td><span class="badge badge-custom badge-red">Guides</span></td>
                                <td class="text-muted small">Sarah Jones</td>
                                <td class="text-muted small">Jan 12, 2026</td>
                                <td class="text-end">
                                    <button class="action-btn btn-view"><i class="fas fa-eye"></i></button>
                                    <button class="action-btn btn-edit"><i class="fas fa-pen"></i></button>
                                    <button class="action-btn btn-delete"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
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


