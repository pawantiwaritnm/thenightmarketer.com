@extends('admin.layouts.app')
@section('title', 'Job Types')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">Job Types</h4>
                <div class="breadcrumb-action justify-content-end">
                    <a href="{{ route('types.create') }}" class="btn btn-sm btn-primary">Add Type</a>
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
                            @forelse($types as $i => $type)
                                <tr>
                                    <td>{{ $i + $types->firstItem() }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ $type->slug }}</td>
                                    <td>
                                        <span class="badge badge-{{ $type->status ? 'success' : 'danger' }}">
                                            {{ $type->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('types.edit', $type->id) }}" class="btn btn-sm btn-primary">
                                            Edit
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center">No types found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="p-3">
                        {{ $types->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
