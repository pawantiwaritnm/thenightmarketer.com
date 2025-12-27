@extends('admin.layouts.app')
@section('title', 'Meetings')
@section('page-title', 'Meetings Management')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h5 class="mb-0"><i class="fas fa-calendar-alt me-2"></i>All Meetings</h5>
        <a href="{{ route('admin.meetings.create') }}" class="btn btn-light btn-sm"><i class="fas fa-plus"></i> Add Meeting</a>
    </div>
    <div class="card-body">
        <table class="table datatable">
            <thead>
                <tr><th>ID</th><th>Project</th><th>Agenda</th><th>Date</th><th>Link</th><th>Actions</th></tr>
            </thead>
            <tbody>
                @foreach($meetings as $meeting)
                <tr>
                    <td>{{ $meeting->id }}</td>
                    <td>{{ $meeting->project->project_name ?? 'N/A' }}</td>
                    <td>{{ Str::limit($meeting->agenda, 50) }}</td>
                    <td>{{ \Carbon\Carbon::parse($meeting->date)->format('M d, Y') }}</td>
                    <td>@if($meeting->link)<a href="{{ $meeting->link }}" target="_blank"><i class="fas fa-link"></i></a>@endif</td>
                    <td>
                        <a href="{{ route('admin.meetings.edit', $meeting->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
