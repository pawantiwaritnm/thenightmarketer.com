@extends('admin.layouts.app')
@section('title', 'Assets')
@section('page-title', 'Asset Management')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0"><i class="fas fa-folder-open me-2"></i>All Assets</h5>
        <a href="{{ route('admin.assets.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus"></i> Add Asset</a>
    </div>
    <div class="card-body">
        <table class="table datatable">
            <thead>
                <tr><th>ID</th><th>File Name</th><th>Client</th><th>Link</th><th>Images</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach($assets as $asset)
                <tr>
                    <td>{{ $asset->id }}</td>
                    <td>{{ $asset->file_name }}</td>
                    <td>{{ $asset->client->client_name ?? 'N/A' }}</td>
                    <td>@if($asset->link)<a href="{{ $asset->link }}" target="_blank"><i class="fas fa-link"></i></a>@endif</td>
                    <td><span class="badge bg-info">{{ $asset->images->count() }}</span></td>
                    <td><span class="badge bg-{{ $asset->status == 1 ? 'success' : 'warning' }}">{{ $asset->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.assets.show', $asset->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.assets.edit', $asset->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
