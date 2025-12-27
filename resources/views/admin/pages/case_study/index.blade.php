@extends('admin.layouts.app')
@section('title', 'Case Studies')
@section('page-title', 'Case Studies Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-briefcase me-2"></i>All Case Studies</h5>
        <a href="{{ route('admin.case-study.create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus"></i> Add New Case Study
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Client Name</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($caseStudies as $key => $caseStudy)
                    <tr>
                        <td>{{ $caseStudy->id }}</td>
                        <td><strong>{{ $caseStudy->title }}</strong></td>
                        <td>{{ $caseStudy->client_name }}</td>
                        <td>
                            @if($caseStudy->duration)
                                <span class="badge bg-secondary">{{ $caseStudy->duration }}</span>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            @if(isset($caseStudy->status) && $caseStudy->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                @if($caseStudy->slug)
                                <a href="{{ route('case-study', $caseStudy->slug) }}" class="btn btn-info" title="View" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @endif
                                <a href="{{ route('admin.case-study.edit', $caseStudy->id) }}" class="btn btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="fas fa-inbox fa-3x mb-3"></i>
                            <p>No case studies found</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
