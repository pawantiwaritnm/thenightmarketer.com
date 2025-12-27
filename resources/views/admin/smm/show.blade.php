@extends('admin.layouts.app')

@section('title', 'View SMM')
@section('page-title', 'SMM Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>SMM Details</h5>
        <a href="{{ route('admin.smm.edit', $smm->id) }}" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>SMM Name:</strong>
                <p>{{ $smm->smm_name }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Client:</strong>
                <p>{{ $smm->client->client_name ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Platform:</strong>
                <p>
                    @if($smm->platform)
                        <span class="badge bg-primary">
                            <i class="fab fa-{{ strtolower($smm->platform) }}"></i> {{ $smm->platform }}
                        </span>
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Post Type:</strong>
                <p>
                    @if($smm->post_type)
                        <span class="badge bg-info">{{ $smm->post_type }}</span>
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Scheduled Date:</strong>
                <p>{{ $smm->scheduled_date ? \Carbon\Carbon::parse($smm->scheduled_date)->format('F d, Y h:i A') : 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Status:</strong>
                <p>
                    @if($smm->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Assigned To:</strong>
                <p>
                    @if($smm->users->count() > 0)
                        @foreach($smm->users as $user)
                            <span class="badge bg-info me-1">{{ $user->username }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Post Content:</strong>
                <div class="border rounded p-3 bg-light">
                    <p class="mb-0" style="white-space: pre-wrap;">{{ $smm->post_content ?? 'No content provided' }}</p>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Added By:</strong>
                <p>{{ $smm->addedBy->username ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Created At:</strong>
                <p>{{ \Carbon\Carbon::parse($smm->added_on)->format('F d, Y h:i A') }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Updated At:</strong>
                <p>{{ $smm->updated_on ? \Carbon\Carbon::parse($smm->updated_on)->format('F d, Y h:i A') : 'N/A' }}</p>
            </div>
        </div>

        <div class="text-end mt-3">
            <a href="{{ route('admin.smm.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
