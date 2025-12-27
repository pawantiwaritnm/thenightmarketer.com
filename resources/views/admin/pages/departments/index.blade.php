@extends('admin.layouts.app')
@section('title', 'Job Departments')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">Job Departments</h4>
                <div class="breadcrumb-action justify-content-end">
                    <a href="{{ route('departments.create') }}" class="btn btn-sm btn-primary">Add Department</a>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body p-0">
                    <table class="table mb-0 table-hover table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($departments as $i => $department)
                                <tr>
                                    <td>{{ $i + $departments->firstItem() }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->slug }}</td>
                                    <td>
                                        <span class="badge badge-{{ $department->status ? 'success' : 'danger' }}">
                                            {{ $department->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-sm btn-primary">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center">No departments found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-3">
                        {{ $departments->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
