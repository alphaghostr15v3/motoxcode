@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-header-aware">Photo <span class="text-red italic">Gallery</span></h2>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-theme-outline btn-sm rounded-pill"><i class="fas fa-upload me-2"></i>Upload Photos</a>
    </div>
    
    @if(session('success'))
        <div class="alert alert-success bg-success text-white border-0 shadow-lg mb-4">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    <div class="row g-4">
        @forelse($images as $image)
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="stat-card p-0 overflow-hidden h-100 position-relative group">
                <img src="{{ $image->image_path }}" class="w-100 h-100 object-fit-cover" style="min-height: 250px; max-height: 250px;">
                <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-gradient-dark-transparent">
                    <p class="text-white small fw-bold m-0 text-truncate">{{ $image->caption ?? 'No Caption' }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <span class="badge badge-custom badge-secondary extra-small">{{ $image->category ?? 'General' }}</span>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.gallery.edit', $image->id) }}" class="btn btn-sm btn-dark rounded-circle w-30px h-30px d-flex align-items-center justify-content-center hover-cyan"><i class="fas fa-pen extra-small"></i></a>
                            <form action="{{ route('admin.gallery.destroy', $image->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-dark rounded-circle w-30px h-30px d-flex align-items-center justify-content-center hover-danger border-0"><i class="fas fa-trash extra-small"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                @if($image->is_featured)
                    <div class="position-absolute top-0 end-0 m-2">
                        <span class="badge badge-warning text-dark"><i class="fas fa-star"></i> Featured</span>
                    </div>
                @endif
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="admin-table-card p-5 text-center">
                <i class="fas fa-images fa-3x text-muted mb-3"></i>
                <p class="text-muted m-0">No images found in the gallery.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>

<style>
.bg-gradient-dark-transparent {
    background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
}
.w-30px { width: 30px; }
.h-30px { height: 30px; }
.hover-cyan:hover { color: #00d9ff; background: rgba(0, 217, 255, 0.1); }
.hover-danger:hover { color: #dc3545; background: rgba(220, 53, 69, 0.1); }
</style>
@endsection


