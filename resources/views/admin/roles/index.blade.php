@extends('admin.layouts.app')
@section('title', 'Roles')
@section('page-title', 'Role Management')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-user-tag me-2"></i>All Roles</h5>
        <a href="{{ route('admin.roles.create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus"></i> Add New Role
        </a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role Name</th>
                        <th>Description</th>
                        <th>Permissions Count</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td><strong>{{ $role->name }}</strong></td>
                        <td>{{ $role->description ?? 'N/A' }}</td>
                        <td>
                            <span class="badge bg-info">{{ $role->permissions->count() }} permissions</span>
                        </td>
                        <td>
                            @if($role->status)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                @if($role->name !== 'Super Admin')
                                <a href="{{ route('admin.roles.edit', $role->id) }}" class="btn btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @else
                                <button type="button" class="btn btn-secondary" disabled title="Cannot edit Super Admin">
                                    <i class="fas fa-lock"></i>
                                </button>
                                @endif
                                @if($role->name !== 'Admin' && $role->name !== 'Super Admin')
                                <button type="button" class="btn btn-danger delete-btn" data-id="{{ $role->id }}" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endif
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
    // Delete role
    $('.delete-btn').click(function() {
        const roleId = $(this).data('id');

        Swal.fire({
            title: 'Are you sure?',
            text: "This role will be deleted permanently!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/roles/' + roleId,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if(response.status === 'success') {
                            showMessage('success', response.message);
                            setTimeout(() => location.reload(), 1500);
                        }
                    },
                    error: function(xhr) {
                        const message = xhr.responseJSON?.message || 'Failed to delete role';
                        showMessage('error', message);
                    }
                });
            }
        });
    });
});
</script>
@endpush
