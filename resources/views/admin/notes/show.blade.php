@extends('admin.layouts.app')

@section('title', 'View Note')
@section('page-title', 'Note Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Note Details</h5>
        <a href="{{ route('admin.notes.edit', $note->id) }}" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Topic:</strong>
                <p>{{ $note->topic }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Date:</strong>
                <p>{{ \Carbon\Carbon::parse($note->date)->format('F d, Y') }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Type:</strong>
                <p>
                    @if($note->type == 1)
                        <span class="badge bg-danger">Important</span>
                    @elseif($note->type == 2)
                        <span class="badge bg-primary">Task</span>
                    @else
                        <span class="badge bg-secondary">Normal</span>
                    @endif
                </p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Status:</strong>
                <p>
                    @if($note->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-warning">Inactive</span>
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Content:</strong>
                <div class="border rounded p-3 mt-2 bg-light">
                    {!! $note->text !!}
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Added By:</strong>
                <p>{{ $note->addedBy->username ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Created At:</strong>
                <p>{{ \Carbon\Carbon::parse($note->added_on)->format('F d, Y h:i A') }}</p>
            </div>
        </div>

        <div class="text-end mt-3">
            <a href="{{ route('admin.notes.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
