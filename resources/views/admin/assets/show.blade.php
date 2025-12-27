@extends('admin.layouts.app')

@section('title', 'View Asset')
@section('page-title', 'Asset Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>Asset Details</h5>
        <a href="{{ route('admin.assets.edit', $asset->id) }}" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>Asset Name:</strong>
                <p>{{ $asset->asset_name }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Asset Type:</strong>
                <p>
                    @if($asset->asset_type)
                        <span class="badge bg-info">{{ $asset->asset_type }}</span>
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Categories:</strong>
                <p>
                    @if($asset->categories->count() > 0)
                        @foreach($asset->categories as $category)
                            <span class="badge bg-primary me-1">{{ $category->category_name }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </p>
            </div>

            @if($asset->file_path)
                <div class="col-md-12 mb-3">
                    <strong>Asset File:</strong>
                    <div class="mt-2">
                        <a href="{{ asset('storage/' . $asset->file_path) }}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-download"></i> Download/View File
                        </a>
                    </div>
                </div>
            @endif

            @if($asset->images->count() > 0)
                <div class="col-md-12 mb-3">
                    <strong>Asset Images:</strong>
                    <div class="row mt-2">
                        @foreach($asset->images as $image)
                            <div class="col-md-3 mb-3">
                                <a href="{{ asset('storage/' . $image->image_path) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                         alt="Asset Image"
                                         class="img-fluid img-thumbnail">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="col-md-12 mb-3">
                <strong>Description:</strong>
                <div class="border rounded p-3 bg-light">
                    <p class="mb-0">{{ $asset->description ?? 'No description provided' }}</p>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Status:</strong>
                <p>
                    @if($asset->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Added By:</strong>
                <p>{{ $asset->addedBy->username ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Created At:</strong>
                <p>{{ \Carbon\Carbon::parse($asset->added_on)->format('F d, Y h:i A') }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Updated At:</strong>
                <p>{{ $asset->updated_on ? \Carbon\Carbon::parse($asset->updated_on)->format('F d, Y h:i A') : 'N/A' }}</p>
            </div>
        </div>

        <div class="text-end mt-3">
            <a href="{{ route('admin.assets.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
