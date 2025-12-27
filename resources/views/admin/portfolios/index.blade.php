@extends('admin.layouts.app')
@section('title', 'Portfolio')
@section('page-title', 'Portfolio Management')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0"><i class="fas fa-briefcase me-2"></i>All Portfolio Items</h5>
        <a href="{{ route('admin.portfolios.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus"></i> Add Portfolio</a>
    </div>
    <div class="card-body">
        <table class="table datatable">
            <thead>
                <tr><th>ID</th><th>Project Name</th><th>URL</th><th>Industry</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach($portfolios as $portfolio)
                <tr>
                    <td>{{ $portfolio->id }}</td>
                    <td>{{ $portfolio->client_project_name }}</td>
                    <td><a href="{{ $portfolio->url }}" target="_blank">{{ Str::limit($portfolio->url, 30) }}</a></td>
                    <td>{{ $portfolio->industryRelation->name ?? 'N/A' }}</td>
                    <td><span class="badge bg-{{ $portfolio->status == 1 ? 'success' : 'warning' }}">{{ $portfolio->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
