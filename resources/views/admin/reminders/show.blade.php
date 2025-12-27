@extends('admin.layouts.app')

@section('title', 'View Reminder')
@section('page-title', 'Reminder Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Reminder Details</h5>
        <a href="{{ route('admin.reminders.edit', $reminder->id) }}" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Reminder Name:</strong>
                <p>{{ $reminder->reminder_name }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Reminder Date:</strong>
                <p>{{ \Carbon\Carbon::parse($reminder->reminder_date)->format('F d, Y h:i A') }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Client:</strong>
                <p>{{ $reminder->client->client_name ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Project:</strong>
                <p>{{ $reminder->project->project_name ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Status:</strong>
                <p>
                    @if($reminder->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-warning">Completed</span>
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Assigned To:</strong>
                <p>
                    @if($reminder->users->count() > 0)
                        @foreach($reminder->users as $user)
                            <span class="badge bg-info me-1">{{ $user->username }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Description:</strong>
                <p>{{ $reminder->description ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Added By:</strong>
                <p>{{ $reminder->addedBy->username ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Created At:</strong>
                <p>{{ \Carbon\Carbon::parse($reminder->added_on)->format('F d, Y h:i A') }}</p>
            </div>
        </div>

        <div class="text-end mt-3">
            <a href="{{ route('admin.reminders.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
