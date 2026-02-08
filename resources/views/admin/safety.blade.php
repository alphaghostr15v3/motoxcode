@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-header-aware">Safety <span class="text-red italic">Rules</span></h2>
        <a href="{{ route('admin.safety.create') }}" class="btn bg-gradient-red text-white btn-sm rounded-pill border-0"><i class="fas fa-plus me-2"></i>Add Rule</a>
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
                        <th style="width: 50px;">Icon</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rules as $rule)
                    <tr>
                        <td class="text-center">
                            <div class="rounded-circle border border-secondary bg-dark d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                <i class="{{ $rule->icon }} text-red"></i>
                            </div>
                        </td>
                        <td class="fw-bold text-header-aware small">{{ $rule->title }}</td>
                        <td class="text-muted small text-truncate" style="max-width: 300px;">{{ $rule->description }}</td>
                        <td>
                            @if($rule->is_active)
                                <span class="badge badge-custom badge-success">Active</span>
                            @else
                                <span class="badge badge-custom badge-secondary">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.safety.edit', $rule->id) }}" class="action-btn btn-edit"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('admin.safety.destroy', $rule->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete bg-transparent border-0"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No safety rules found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


