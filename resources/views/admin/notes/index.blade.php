@extends('admin.layouts.app')
@section('title', 'Notes')
@section('page-title', 'Notes Management')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0"><i class="fas fa-sticky-note me-2"></i>All Notes</h5>
        <a href="{{ route('admin.notes.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus"></i> Add Note</a>
    </div>
    <div class="card-body">
        <table class="table datatable">
            <thead>
                <tr><th>ID</th><th>Topic</th><th>Date</th><th>Type</th><th>Status</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach($notes as $note)
                <tr>
                    <td>{{ $note->id }}</td>
                    <td>{{ $note->topic }}</td>
                    <td>{{ $note->date }}</td>
                    <td><span class="badge bg-{{ $note->type == 1 ? 'primary' : 'secondary' }}">{{ $note->type == 1 ? 'Important' : 'Normal' }}</span></td>
                    <td><span class="badge bg-{{ $note->status == 1 ? 'success' : 'warning' }}">{{ $note->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                    <td>
                        <a href="{{ route('admin.notes.edit', $note->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $note->id }}"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
