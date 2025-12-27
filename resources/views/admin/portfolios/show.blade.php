@extends('admin.layouts.app')

@section('title', 'View Portfolio')
@section('page-title', 'Portfolio Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Portfolio Details</h5>
        <a href="{{ route('admin.portfolios.edit', $portfolio->id) }}" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            @if($portfolio->image)
                <div class="col-md-12 mb-3 text-center">
                    <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->portfolio_title }}"
                         class="img-fluid rounded shadow" style="max-width: 600px;">
                </div>
            @endif

            <div class="col-md-6 mb-3">
                <strong>Portfolio Title:</strong>
                <p>{{ $portfolio->portfolio_title }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Portfolio Link:</strong>
                <p>
                    @if($portfolio->portfolio_link)
                        <a href="{{ $portfolio->portfolio_link }}" target="_blank" class="text-primary">
                            {{ $portfolio->portfolio_link }} <i class="fas fa-external-link-alt fa-sm"></i>
                        </a>
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Industry:</strong>
                <p>{{ $portfolio->industry->name ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Technology:</strong>
                <p>{{ $portfolio->technology->name ?? 'N/A' }}</p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Categories:</strong>
                <p>
                    @if($portfolio->categories->count() > 0)
                        @foreach($portfolio->categories as $category)
                            <span class="badge bg-info me-1">{{ $category->category_name }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Description:</strong>
                <p>{{ $portfolio->description ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Status:</strong>
                <p>
                    @if($portfolio->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Added By:</strong>
                <p>{{ $portfolio->addedBy->username ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Created At:</strong>
                <p>{{ \Carbon\Carbon::parse($portfolio->added_on)->format('F d, Y h:i A') }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Updated At:</strong>
                <p>{{ $portfolio->updated_on ? \Carbon\Carbon::parse($portfolio->updated_on)->format('F d, Y h:i A') : 'N/A' }}</p>
            </div>
        </div>

        <div class="text-end mt-3">
            <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
