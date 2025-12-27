@extends('admin.layouts.app')

@section('title', 'View Meeting')
@section('page-title', 'Meeting Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Meeting Details</h5>
        <a href="{{ route('admin.meetings.edit', $meeting->id) }}" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Meeting Name:</strong>
                <p>{{ $meeting->meeting_name }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Meeting Date:</strong>
                <p>{{ \Carbon\Carbon::parse($meeting->meeting_date)->format('F d, Y h:i A') }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Client:</strong>
                <p>{{ $meeting->client->client_name ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Status:</strong>
                <p>
                    @if($meeting->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Assigned To:</strong>
                <p>
                    @if($meeting->users->count() > 0)
                        @foreach($meeting->users as $user)
                            <span class="badge bg-info me-1">{{ $user->username }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Meeting Agenda:</strong>
                <div class="border rounded p-3 bg-light">
                    <p class="mb-0">{{ $meeting->meeting_agenda ?? 'No agenda provided' }}</p>
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Meeting Minutes:</strong>
                <div class="border rounded p-3 bg-light">
                    <p class="mb-0">{{ $meeting->meeting_minutes ?? 'No minutes recorded' }}</p>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Added By:</strong>
                <p>{{ $meeting->addedBy->username ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Created At:</strong>
                <p>{{ \Carbon\Carbon::parse($meeting->added_on)->format('F d, Y h:i A') }}</p>
            </div>
        </div>

        <div class="text-end mt-3">
            <a href="{{ route('admin.meetings.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
