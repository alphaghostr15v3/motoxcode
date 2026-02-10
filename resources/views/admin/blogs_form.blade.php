@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-dark">{{ isset($blog) ? 'Edit' : 'Create' }} <span class="text-red italic">Blog Post</span></h2>
        <a href="{{ route('admin.blogs') }}" class="btn btn-outline-secondary btn-sm rounded-pill"><i class="fas fa-arrow-left me-2"></i>Back</a>
    </div>
    
    <div class="admin-table-card p-4">
        <form action="{{ isset($blog) ? route('admin.blogs.update', $blog->id) : route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($blog))
                @method('PUT')
            @endif
            
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label text-muted small text-uppercase fw-bold">Title</label>
                    <input type="text" name="title" class="form-control admin-input @error('title') is-invalid @enderror" value="{{ old('title', $blog->title ?? '') }}" required>
                    @error('title') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>
                
                <div class="col-md-4">
                    <label class="form-label text-muted small text-uppercase fw-bold">Slug</label>
                    <input type="text" name="slug" class="form-control admin-input @error('slug') is-invalid @enderror" value="{{ old('slug', $blog->slug ?? '') }}" required>
                    @error('slug') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Author</label>
                    <input type="text" name="author" class="form-control admin-input @error('author') is-invalid @enderror" value="{{ old('author', $blog->author ?? 'Admin') }}" required>
                    @error('author') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label text-muted small text-uppercase fw-bold">Post Image</label>
                    <input type="file" name="image_file" class="form-control admin-input @error('image_file') is-invalid @enderror">
                    @if(isset($blog) && $blog->image)
                        <div class="mt-2">
                            <img src="{{ asset($blog->image) }}" width="100" class="rounded border">
                            <span class="text-muted small ms-2">Current path: {{ $blog->image }}</span>
                        </div>
                    @endif
                    @error('image_file') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label class="form-label text-muted small text-uppercase fw-bold">Content</label>
                    <textarea name="content" class="form-control admin-input @error('content') is-invalid @enderror" rows="10" required>{{ old('content', $blog->content ?? '') }}</textarea>
                    @error('content') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_published" id="is_published" {{ old('is_published', $blog->is_published ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label text-dark" for="is_published">Publish immediately</label>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-end">
                <button type="submit" class="btn bg-gradient-red text-white px-5 rounded-pill shadow-lg fw-bold"><i class="fas fa-save me-2"></i>{{ isset($blog) ? 'Update' : 'Publish' }} Post</button>
            </div>
        </form>
    </div>
</div>
@endsection


