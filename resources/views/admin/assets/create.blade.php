@extends('admin.layouts.app')

@section('title', 'Create Asset')
@section('page-title', 'Create New Asset')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Add New Asset</h5>
    </div>
    <div class="card-body">
        <form id="assetForm" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Asset Name <span class="text-danger">*</span></label>
                    <input type="text" name="asset_name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Asset Type</label>
                    <select name="asset_type" class="form-control">
                        <option value="">Select Type</option>
                        <option value="Image">Image</option>
                        <option value="Video">Video</option>
                        <option value="Document">Document</option>
                        <option value="Audio">Audio</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Categories</label>
                    <select name="category_id[]" class="form-control select2" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Asset File</label>
                    <input type="file" name="asset_file" class="form-control">
                    <small class="text-muted">Upload main asset file</small>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Additional Images</label>
                    <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                    <small class="text-muted">Upload multiple images (optional)</small>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.assets.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create Asset
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$('#assetForm').submit(function(e) {
    e.preventDefault();

    var formData = new FormData(this);

    $.ajax({
        url: '{{ route("admin.assets.store") }}',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if(response.success) {
                showMessage('success', response.message);
                setTimeout(() => window.location.href = '{{ route("admin.assets.index") }}', 1500);
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
                errorMsg = 'Failed to create asset';
            }
            showMessage('error', errorMsg);
        }
    });
});
</script>
@endpush
