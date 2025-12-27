@extends('admin.layouts.app')
@section('title', 'Edit Role')
@section('page-title', 'Edit Role')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-user-tag me-2"></i>Edit Role: {{ $role->name }}</h5>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to Roles
        </a>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Please fix the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('admin.roles.update', $role->id) }}" method="POST" id="roleForm">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Role Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name"
                           value="{{ old('name', $role->name) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="1" {{ old('status', $role->status) == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $role->status) == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="col-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $role->description) }}</textarea>
                </div>
            </div>

            <hr>

            <h5 class="mb-3">Assign Permissions <span class="text-danger">*</span></h5>

            <div class="mb-3">
                <button type="button" class="btn btn-sm btn-outline-primary" id="selectAll">Select All</button>
                <button type="button" class="btn btn-sm btn-outline-secondary" id="deselectAll">Deselect All</button>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th width="25%">Module</th>
                            <th width="15%" class="text-center">View</th>
                            <th width="15%" class="text-center">Add</th>
                            <th width="15%" class="text-center">Edit</th>
                            <th width="15%" class="text-center">Delete</th>
                            <th width="15%" class="text-center">Export</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permissions as $module => $modulePermissions)
                            @php
                                $permission = $modulePermissions->first();
                                $hasView = isset($rolePermissions[$permission->id]['view']) && $rolePermissions[$permission->id]['view'];
                                $hasAdd = isset($rolePermissions[$permission->id]['add']) && $rolePermissions[$permission->id]['add'];
                                $hasEdit = isset($rolePermissions[$permission->id]['edit']) && $rolePermissions[$permission->id]['edit'];
                                $hasDelete = isset($rolePermissions[$permission->id]['delete']) && $rolePermissions[$permission->id]['delete'];
                                $hasExport = isset($rolePermissions[$permission->id]['export']) && $rolePermissions[$permission->id]['export'];
                            @endphp
                            <tr>
                                <td>
                                    <strong>{{ $module }}</strong>
                                </td>
                                <td class="text-center">
                                    @if($permission->can_view)
                                        <input type="checkbox" class="form-check-input action-checkbox"
                                               name="permissions[{{ $permission->id }}][view]" value="1"
                                               data-module="{{ $permission->id }}"
                                               {{ $hasView ? 'checked' : '' }}>
                                    @else
                                        <i class="fas fa-minus text-muted"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($permission->can_add)
                                        <input type="checkbox" class="form-check-input action-checkbox"
                                               name="permissions[{{ $permission->id }}][add]" value="1"
                                               data-module="{{ $permission->id }}"
                                               {{ $hasAdd ? 'checked' : '' }}>
                                    @else
                                        <i class="fas fa-minus text-muted"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($permission->can_edit)
                                        <input type="checkbox" class="form-check-input action-checkbox"
                                               name="permissions[{{ $permission->id }}][edit]" value="1"
                                               data-module="{{ $permission->id }}"
                                               {{ $hasEdit ? 'checked' : '' }}>
                                    @else
                                        <i class="fas fa-minus text-muted"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($permission->can_delete)
                                        <input type="checkbox" class="form-check-input action-checkbox"
                                               name="permissions[{{ $permission->id }}][delete]" value="1"
                                               data-module="{{ $permission->id }}"
                                               {{ $hasDelete ? 'checked' : '' }}>
                                    @else
                                        <i class="fas fa-minus text-muted"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($permission->can_export)
                                        <input type="checkbox" class="form-check-input action-checkbox"
                                               name="permissions[{{ $permission->id }}][export]" value="1"
                                               data-module="{{ $permission->id }}"
                                               {{ $hasExport ? 'checked' : '' }}>
                                    @else
                                        <i class="fas fa-minus text-muted"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Role
                </button>
                <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Select all checkboxes
    $('#selectAll').click(function() {
        $('.action-checkbox').prop('checked', true);
    });

    // Deselect all checkboxes
    $('#deselectAll').click(function() {
        $('.action-checkbox').prop('checked', false);
    });

    // Form validation
    $('#roleForm').submit(function(e) {
        const checkedCount = $('.action-checkbox:checked').length;
        if (checkedCount === 0) {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'No Permissions Selected',
                text: 'Please select at least one action for any module.'
            });
            return false;
        }
    });
});
</script>
@endpush
