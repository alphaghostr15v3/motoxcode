@extends('layouts.admin')

@section('content')
<div class="container-fluid p-0">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold fs-4 m-0 text-dark">Message <span class="text-red italic">Details</span></h2>
        <a href="{{ route('admin.messages') }}" class="btn btn-outline-secondary btn-sm rounded-pill"><i class="fas fa-arrow-left me-2"></i>Back</a>
    </div>
    
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="admin-table-card p-5">
                <div class="d-flex justify-content-between align-items-start mb-4 border-bottom border-light pb-4">
                    <div>
                        <h4 class="text-dark fw-bold mb-1">{{ $message->subject }}</h4>
                        <p class="text-muted small m-0">From: <span class="text-dark">{{ $message->name }}</span> &lt;{{ $message->email }}&gt;</p>
                    </div>
                    <div class="text-end">
                        <p class="text-muted extra-small m-0">{{ $message->created_at->format('M d, Y') }}</p>
                        <p class="text-muted extra-small m-0">{{ $message->created_at->format('h:i A') }}</p>
                    </div>
                </div>
                
                <div class="message-content text-dark mb-5" style="white-space: pre-wrap; line-height: 1.6;">{{ $message->message }}</div>

                <div class="d-flex justify-content-end gap-2">
                    <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="btn bg-gradient-cyan text-white rounded-pill px-4 fw-bold"><i class="fas fa-reply me-2"></i>Reply</a>
                    <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger rounded-pill px-4 fw-bold"><i class="fas fa-trash me-2"></i>Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


