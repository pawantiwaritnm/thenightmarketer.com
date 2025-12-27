@extends('admin.layouts.app')

@section('title', 'Projects')
@section('page-title', 'Projects Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-project-diagram me-2"></i>All Projects</h5>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus"></i> Add New Project
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Project Name</th>
                        <th>Client</th>
                        <th>Type</th>
                        <th>Priority</th>
                        <th>Start Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->project_name }}</td>
                        <td>{{ $project->client->client_name ?? 'N/A' }}</td>
                        <td>
                            @if($project->project_type == 1)
                                <span class="badge bg-info">Maintenance</span>
                            @else
                                <span class="badge bg-primary">New Project</span>
                            @endif
                        </td>
                        <td>
                            @if($project->priority == 'High' || $project->priority == 'Urgent')
                                <span class="badge bg-danger">{{ $project->priority }}</span>
                            @elseif($project->priority == 'Medium')
                                <span class="badge bg-warning">{{ $project->priority }}</span>
                            @else
                                <span class="badge bg-secondary">{{ $project->priority }}</span>
                            @endif
                        </td>
                        <td>{{ \Carbon\Carbon::parse($project->starting_date)->format('M d, Y') }}</td>
                        <td>
                            @if($project->status == 1)
                                <span class="badge bg-success">Active</span>
                            @elseif($project->status == 0)
                                <span class="badge bg-warning">Inactive</span>
                            @else
                                <span class="badge bg-danger">Deleted</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-info" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger delete-btn" data-id="{{ $project->id }}" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Delete project
    $('.delete-btn').click(function() {
        const projectId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "This project will be marked as deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/projects/' + projectId,
                    type: 'DELETE',
                    success: function(response) {
                        if(response.status === 'success') {
                            showMessage('success', 'Project deleted successfully');
                            setTimeout(() => location.reload(), 1500);
                        }
                    },
                    error: function() {
                        showMessage('error', 'Failed to delete project');
                    }
                });
            }
        });
    });
});
</script>
@endpush
