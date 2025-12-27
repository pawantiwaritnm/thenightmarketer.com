@extends('admin.layouts.app')

@section('title', 'View Project')
@section('page-title', 'Project Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Project Details</h5>
        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Project Name:</strong>
                <p>{{ $project->project_name }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Client:</strong>
                <p>{{ $project->client->client_name ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Project Type:</strong>
                <p>{{ $project->project_type == 1 ? 'Maintenance' : 'New Project' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Priority:</strong>
                <p>
                    @if($project->priority == 'High' || $project->priority == 'Urgent')
                        <span class="badge bg-danger">{{ $project->priority }}</span>
                    @elseif($project->priority == 'Medium')
                        <span class="badge bg-warning">{{ $project->priority }}</span>
                    @else
                        <span class="badge bg-secondary">{{ $project->priority }}</span>
                    @endif
                </p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Industry:</strong>
                <p>{{ $project->industry->name ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Technology:</strong>
                <p>{{ $project->technology->name ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Starting Date:</strong>
                <p>{{ \Carbon\Carbon::parse($project->starting_date)->format('F d, Y') }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Ending Date:</strong>
                <p>{{ $project->ending_date ? \Carbon\Carbon::parse($project->ending_date)->format('F d, Y') : 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Project Size:</strong>
                <p>{{ $project->project_size }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Status:</strong>
                <p>
                    @if($project->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-warning">Inactive</span>
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Assigned Marketers:</strong>
                <p>
                    @if($project->marketers->count() > 0)
                        @foreach($project->marketers as $marketer)
                            <span class="badge bg-info me-1">{{ $marketer->username }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Project Details:</strong>
                <p>{!! nl2br(e($project->some_details)) !!}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Added By:</strong>
                <p>{{ $project->addedBy->username ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Created At:</strong>
                <p>{{ \Carbon\Carbon::parse($project->added_on)->format('F d, Y h:i A') }}</p>
            </div>
        </div>

        <div class="text-end mt-3">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
