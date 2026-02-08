@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-header-aware">Contact <span class="text-red italic">Messages</span></h2>
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
                        <th>Status</th>
                        <th>Sender</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $message)
                    <tr>
                        <td>
                            @if($message->is_read)
                                <i class="far fa-envelope-open text-muted" title="Read"></i>
                            @else
                                <i class="fas fa-envelope text-red" title="Unread"></i>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex flex-column">
                                <span class="fw-bold text-header-aware small">{{ $message->name }}</span>
                                <span class="text-muted extra-small">{{ $message->email }}</span>
                            </div>
                        </td>
                        <td class="text-header-aware small">{{ Str::limit($message->subject, 30) }}</td>
                        <td class="text-muted small">{{ $message->created_at->format('M d, Y h:i A') }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.messages.show', $message->id) }}" class="action-btn btn-view"><i class="fas fa-eye"></i></a>
                            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn btn-delete bg-transparent border-0"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">No messages found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


