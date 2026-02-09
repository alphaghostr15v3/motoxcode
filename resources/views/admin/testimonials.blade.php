@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-header-aware">Client <span class="text-red italic">Testimonials</span></h2>
        <a href="{{ route('admin.testimonials.create') }}" class="btn bg-gradient-red text-white btn-sm rounded-pill border-0"><i class="fas fa-plus me-2"></i>Add Testimonial</a>
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
                        <th>Client</th>
                        <th>Role</th>
                        <th>Rating</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <div class="rounded-circle border border-secondary bg-light d-flex align-items-center justify-content-center overflow-hidden" style="width: 40px; height: 40px;">
                                    @if($testimonial->image)
                                        <img src="{{ asset($testimonial->image) }}" alt="Client" class="w-100 h-100 object-fit-cover">
                                    @else
                                        <i class="fas fa-user text-muted"></i>
                                    @endif
                                </div>
                                <span class="fw-bold text-header-aware small">{{ $testimonial->name }}</span>
                            </div>
                        </td>
                        <td class="text-muted small">{{ $testimonial->role ?? '-' }}</td>
                        <td>
                            <div class="text-warning small">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star text-secondary"></i>
                                    @endif
                                @endfor
                            </div>
                        </td>
                        <td class="text-muted small text-truncate" style="max-width: 250px;">{{ Str::limit($testimonial->message, 50) }}</td>
                        <td>
                            @if($testimonial->is_active)
                                <span class="badge badge-custom badge-success">Active</span>
                            @else
                                <span class="badge badge-custom badge-secondary">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="action-btn btn-edit"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete bg-transparent border-0"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">No testimonials found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


