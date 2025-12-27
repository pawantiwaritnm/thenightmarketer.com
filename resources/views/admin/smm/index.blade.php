@extends('admin.layouts.app')
@section('title', 'SMM Projects')
@section('page-title', 'Social Media Management')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0"><i class="fas fa-share-alt me-2"></i>All SMM Projects</h5>
        <a href="{{ route('admin.smm.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus"></i> Add SMM</a>
    </div>
    <div class="card-body">
        <table class="table datatable">
            <thead>
                <tr><th>ID</th><th>Client</th><th>Social Media</th><th>Duration</th><th>Start Date</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach($smms as $smm)
                <tr>
                    <td>{{ $smm->id }}</td>
                    <td>{{ $smm->client->client_name ?? 'N/A' }}</td>
                    <td>{{ $smm->social_media }}</td>
                    <td>{{ $smm->duration }}</td>
                    <td>{{ \Carbon\Carbon::parse($smm->starting_date)->format('M d, Y') }}</td>
                    <td><span class="badge bg-{{ $smm->status == 1 ? 'success' : 'warning' }}">{{ $smm->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.smm.edit', $smm->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
