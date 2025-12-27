@extends('admin.layouts.app')
@section('title', 'Reminders')
@section('page-title', 'Reminders Management')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0"><i class="fas fa-bell me-2"></i>All Reminders</h5>
        <a href="{{ route('admin.reminders.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus"></i> Add Reminder</a>
    </div>
    <div class="card-body">
        <table class="table datatable">
            <thead>
                <tr><th>ID</th><th>Reminder Name</th><th>Client</th><th>Date</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach($reminders as $reminder)
                <tr>
                    <td>{{ $reminder->id }}</td>
                    <td>{{ $reminder->reminder_name }}</td>
                    <td>{{ $reminder->client->client_name ?? 'N/A' }}</td>
                    <td>{{ \Carbon\Carbon::parse($reminder->reminder_date)->format('M d, Y') }}</td>
                    <td><span class="badge bg-{{ $reminder->status == 1 ? 'success' : 'warning' }}">{{ $reminder->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.reminders.edit', $reminder->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
