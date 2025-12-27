@extends('admin.layouts.app')
@section('title', 'Clients')
@section('page-title', 'Client Management')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0"><i class="fas fa-users me-2"></i>All Clients</h5>
        <a href="{{ route('admin.clients.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus"></i> Add Client</a>
    </div>
    <div class="card-body">
        <table class="table datatable">
            <thead>
                <tr><th>ID</th><th>Client Name</th><th>Email</th><th>Phone</th><th>POC Name</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->client_name }}</td>
                    <td>{{ $client->client_email }}</td>
                    <td>{{ $client->client_phone }}</td>
                    <td>{{ $client->poc_name }}</td>
                    <td><span class="badge bg-{{ $client->status == 1 ? 'success' : 'warning' }}">{{ $client->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.clients.show', $client->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        <a href="{{ route('admin.clients.edit', $client->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
