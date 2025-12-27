@extends('admin.layouts.app')

@section('title', 'Create Portfolio')
@section('page-title', 'Create New Portfolio')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Add New Portfolio</h5>
    </div>
    <div class="card-body">
        <form id="portfolioForm" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Portfolio Title <span class="text-danger">*</span></label>
                    <input type="text" name="portfolio_title" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">URL</label>
                    <input type="url" name="url" class="form-control" placeholder="https://example.com">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Client Project Name <span class="text-danger">*</span></label>
                    <input type="text" name="client_project_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Android App Link</label>
                    <input type="url" name="android_app_url" class="form-control" placeholder="https://example.com">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Mobile App Link</label>
                    <input type="url" name="mobile_app_url" class="form-control" placeholder="https://example.com">
                </div>
                 <div class="col-md-6 mb-3">
                    <label class="form-label">Figma Link</label>
                    <input type="url" name="figma_link" class="form-control" placeholder="https://example.com">
                </div>
               x
                <div class="col-md-6 mb-3">
                    <label class="form-label">Categories</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Industry</label>
                    <select name="industry" class="form-control select2">
                        <option value="">Select Industry</option>
                        @foreach($industries as $industry)
                            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Technology</label>
                    <select name="technology_id" class="form-control select2">
                        <option value="">Select Technology</option>
                        @foreach($technologies as $tech)
                            <option value="{{ $tech->id }}">{{ $tech->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">File</label>
                    <input type="file" name="upload_file" class="form-control" >
                    {{-- <small class="text-muted">Accepted formats: JPG, PNG, GIF</small> --}}
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create Portfolio
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$('#portfolioForm').submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: '{{ route("admin.portfolios.store") }}',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if(response.success) {
                showMessage('success', response.message);
                setTimeout(() => window.location.href = '{{ route("admin.portfolios.index") }}', 1500);
            }
        },
        error: function(xhr) {
            let errors = xhr.responseJSON?.errors;
            let errorMsg = '';
            if(errors) {
                for(let field in errors) {
                    errorMsg += errors[field][0] + '<br>';
                }
            } else {
                errorMsg = 'Failed to create portfolio';
            }
            showMessage('error', errorMsg);
        }
    });
});
</script>
@endpush
