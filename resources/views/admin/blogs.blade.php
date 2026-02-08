@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-header-aware">Blog <span class="text-red italic">Posts</span></h2>
        <a href="{{ route('admin.blogs.create') }}" class="btn bg-gradient-red text-white btn-sm rounded-pill border-0"><i class="fas fa-pen me-2"></i>Write Post</a>
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
                        <th>Author</th>
                        <th>Status</th>
                        <th>Published</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($blogs as $blog)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                @if($blog->image)
                                    <img src="{{ $blog->image }}" alt="Thumbnail" class="rounded-3 border border-secondary object-fit-cover" width="40" height="40">
                                @else
                                    <div class="rounded-3 border border-secondary bg-dark d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-image text-muted"></i>
                                    </div>
                                @endif
                                <div>
                                    <p class="m-0 fw-bold text-header-aware small text-truncate" style="max-width: 200px;">{{ $blog->title }}</p>
                                    <p class="m-0 text-muted extra-small">/{{ $blog->slug }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="text-muted small">{{ $blog->author }}</td>
                        <td>
                            @if($blog->is_published)
                                <span class="badge badge-custom badge-success">Published</span>
                            @else
                                <span class="badge badge-custom badge-secondary">Draft</span>
                            @endif
                        </td>
                        <td class="text-muted small">
                            {{ $blog->published_at ? $blog->published_at->format('M d, Y') : '-' }}
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="action-btn btn-edit"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete bg-transparent border-0"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No blog posts found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


