@extends('admin.layouts.app')
@section('title', 'Testimonials')
@section('page-title', 'Testimonials Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-quote-right me-2"></i>All Testimonials</h5>
        <div>
            <form name="exporttodayuserForm" method="GET" action="" class="d-inline">
                {{ csrf_field() }}
                <input type="hidden" name="export_xls" value="1" />
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fas fa-file-excel"></i> Export
                </button>
            </form>
        </div>
    </div>
    <div class="card-body">
        <!-- Search Filter -->
        <form method="get" action="{{ route('testimonials') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <input class="form-control" type="search" placeholder="Search by name..."
                           name="query" value="{{ request('query') }}">
                </div>
                <div class="col-md-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Search
                    </button>
                    <a href="{{ route('testimonials') }}" class="btn btn-secondary">
                        <i class="fas fa-redo"></i> Reset
                    </a>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Designation</th>
                        <th>LinkedIn</th>
                        <th>Message</th>
                        <th>Added On</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($testimonials as $testimonial)
                    <tr>
                        <td><strong>{{ $testimonial->name }}</strong></td>
                        <td>{{ $testimonial->company_name }}</td>
                        <td>
                            @if($testimonial->email)
                                <a href="mailto:{{ $testimonial->email }}">{{ $testimonial->email }}</a>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            @if($testimonial->phone)
                                {{ $testimonial->phone }}
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            @if($testimonial->designation)
                                <span class="badge bg-secondary">{{ $testimonial->designation }}</span>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            @if($testimonial->linkedin_link)
                                <a href="{{ $testimonial->linkedin_link }}" target="_blank" class="btn btn-sm btn-info">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>{{ \Str::limit($testimonial->message, 50) }}</td>
                        <td>{{ \Carbon\Carbon::parse($testimonial->added_on)->format('M d, Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">
                            <i class="fas fa-inbox fa-3x mb-3"></i>
                            <p>No testimonials found</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $testimonials->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>
@endsection
