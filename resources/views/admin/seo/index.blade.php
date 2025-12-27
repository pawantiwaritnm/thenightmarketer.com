@extends('admin.layouts.app')
@section('title', 'SEO Projects')
@section('page-title', 'SEO Management')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0"><i class="fas fa-search me-2"></i>All SEO Projects</h5>
        <a href="{{ route('admin.seo.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus"></i> Add SEO</a>
    </div>
    <div class="card-body">
        <table class="table datatable">
            <thead>
                <tr><th>ID</th><th>Client</th><th>Duration</th><th>Plan Type</th><th>Start Date</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach($seos as $seo)
                <tr>
                    <td>{{ $seo->id }}</td>
                    <td>{{ $seo->client->client_name ?? 'N/A' }}</td>
                    <td>{{ $seo->duration }}</td>
                    <td>{{ $seo->type_of_plan }}</td>
                    <td>{{ \Carbon\Carbon::parse($seo->starting_date)->format('M d, Y') }}</td>
                    <td><span class="badge bg-{{ $seo->status == 1 ? 'success' : 'warning' }}">{{ $seo->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.seo.edit', $seo->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
