@extends('admin.layouts.app')

@section('title', 'Edit Portfolio')
@section('page-title', 'Edit Portfolio')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Portfolio</h5>
    </div>
    <div class="card-body">
        <form id="portfolioForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Portfolio Title <span class="text-danger">*</span></label>
                    <input type="text" name="portfolio_title" class="form-control" value="{{ $portfolio->portfolio_title }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Portfolio Link</label>
                    <input type="url" name="portfolio_link" class="form-control" value="{{ $portfolio->portfolio_link }}" placeholder="https://example.com">
                </div>
                 <div class="col-md-6 mb-3">
                    <label class="form-label">Client Project Name <span class="text-danger">*</span></label>
                    <input type="text" name="client_project_name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Categories</label>
                    <select name="category_id[]" class="form-control select2" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, $categoryIds) ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Industry</label>
                    <select name="industry_id" class="form-control select2">
                        <option value="">Select Industry</option>
                        @foreach($industries as $industry)
                            <option value="{{ $industry->id }}" {{ $portfolio->industry_id == $industry->id ? 'selected' : '' }}>
                                {{ $industry->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Technology</label>
                    <select name="technology_id" class="form-control select2">
                        <option value="">Select Technology</option>
                        @foreach($technologies as $tech)
                            <option value="{{ $tech->id }}" {{ $portfolio->technology_id == $tech->id ? 'selected' : '' }}>
                                {{ $tech->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Portfolio Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                    <small class="text-muted">Leave empty to keep current image</small>
                    @if($portfolio->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Current Image" class="img-thumbnail" style="max-width: 150px;">
                        </div>
                    @endif
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="5">{{ $portfolio->description }}</textarea>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.portfolios.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update Portfolio
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
        url: '{{ route("admin.portfolios.update", $portfolio->id) }}',
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
                errorMsg = 'Failed to update portfolio';
            }
            showMessage('error', errorMsg);
        }
    });
});
</script>
@endpush
