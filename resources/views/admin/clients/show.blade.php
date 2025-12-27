@extends('admin.layouts.app')

@section('title', 'View Client')
@section('page-title', 'Client Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Client Details</h5>
        <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Client Name:</strong>
                <p>{{ $client->client_name }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Client Email:</strong>
                <p>{{ $client->client_email }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Client Phone:</strong>
                <p>{{ $client->client_phone }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Location:</strong>
                <p>{{ $client->client_locations ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>POC Name:</strong>
                <p>{{ $client->poc_name ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>POC Phone:</strong>
                <p>{{ $client->poc_phone ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>POC Email:</strong>
                <p>{{ $client->poc_email ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Status:</strong>
                <p>
                    @if($client->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-warning">Inactive</span>
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Categories:</strong>
                <p>
                    @if($client->categories->count() > 0)
                        @foreach($client->categories as $category)
                            <span class="badge bg-info me-1">{{ $category->name }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Added By:</strong>
                <p>{{ $client->addedBy->username ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Created At:</strong>
                <p>{{ \Carbon\Carbon::parse($client->added_on)->format('F d, Y h:i A') }}</p>
            </div>
        </div>

        <!-- Associated Projects -->
        @if($client->projects->count() > 0)
        <hr>
        <h6 class="mb-3">Associated Projects ({{ $client->projects->count() }})</h6>
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Project Name</th>
                        <th>Type</th>
                        <th>Priority</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($client->projects as $project)
                    <tr>
                        <td>
                            <a href="{{ route('admin.projects.show', $project->id) }}">{{ $project->project_name }}</a>
                        </td>
                        <td>{{ $project->project_type == 1 ? 'Maintenance' : 'New Project' }}</td>
                        <td><span class="badge bg-secondary">{{ $project->priority }}</span></td>
                        <td>
                            @if($project->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-warning">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <div class="text-end mt-3">
            <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
