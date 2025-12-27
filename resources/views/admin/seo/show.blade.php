@extends('admin.layouts.app')

@section('title', 'View SEO')
@section('page-title', 'SEO Details')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-info-circle me-2"></i>SEO Details</h5>
        <a href="{{ route('admin.seo.edit', $seo->id) }}" class="btn btn-primary btn-sm">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-3">
                <strong>SEO Name:</strong>
                <p>{{ $seo->seo_name }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Client:</strong>
                <p>{{ $seo->client->client_name ?? 'N/A' }}</p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Keywords:</strong>
                <p>
                    @if($seo->keywords)
                        @php
                            $keywords = explode(',', $seo->keywords);
                        @endphp
                        @foreach($keywords as $keyword)
                            <span class="badge bg-primary me-1">{{ trim($keyword) }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Meta Title:</strong>
                <div class="border rounded p-3 bg-light">
                    <p class="mb-0">{{ $seo->meta_title ?? 'N/A' }}</p>
                    @if($seo->meta_title)
                        <small class="text-muted">Length: {{ strlen($seo->meta_title) }} characters</small>
                    @endif
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Meta Description:</strong>
                <div class="border rounded p-3 bg-light">
                    <p class="mb-0">{{ $seo->meta_description ?? 'N/A' }}</p>
                    @if($seo->meta_description)
                        <small class="text-muted">Length: {{ strlen($seo->meta_description) }} characters</small>
                    @endif
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <strong>Assigned To:</strong>
                <p>
                    @if($seo->users->count() > 0)
                        @foreach($seo->users as $user)
                            <span class="badge bg-info me-1">{{ $user->username }}</span>
                        @endforeach
                    @else
                        N/A
                    @endif
                </p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Status:</strong>
                <p>
                    @if($seo->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-secondary">Inactive</span>
                    @endif
                </p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Added By:</strong>
                <p>{{ $seo->addedBy->username ?? 'N/A' }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Created At:</strong>
                <p>{{ \Carbon\Carbon::parse($seo->added_on)->format('F d, Y h:i A') }}</p>
            </div>

            <div class="col-md-6 mb-3">
                <strong>Updated At:</strong>
                <p>{{ $seo->updated_on ? \Carbon\Carbon::parse($seo->updated_on)->format('F d, Y h:i A') : 'N/A' }}</p>
            </div>
        </div>

        <div class="text-end mt-3">
            <a href="{{ route('admin.seo.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
