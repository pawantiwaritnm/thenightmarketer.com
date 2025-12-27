@extends('admin.layouts.app')

@section('title', 'Edit Asset')
@section('page-title', 'Edit Asset')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Asset</h5>
    </div>
    <div class="card-body">
        <form id="assetForm" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Asset Name <span class="text-danger">*</span></label>
                    <input type="text" name="asset_name" class="form-control" value="{{ $asset->asset_name }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Asset Type</label>
                    <select name="asset_type" class="form-control">
                        <option value="">Select Type</option>
                        <option value="Image" {{ $asset->asset_type == 'Image' ? 'selected' : '' }}>Image</option>
                        <option value="Video" {{ $asset->asset_type == 'Video' ? 'selected' : '' }}>Video</option>
                        <option value="Document" {{ $asset->asset_type == 'Document' ? 'selected' : '' }}>Document</option>
                        <option value="Audio" {{ $asset->asset_type == 'Audio' ? 'selected' : '' }}>Audio</option>
                        <option value="Other" {{ $asset->asset_type == 'Other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
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
                    <label class="form-label">Asset File</label>
                    <input type="file" name="asset_file" class="form-control">
                    <small class="text-muted">Leave empty to keep current file</small>
                    @if($asset->file_path)
                        <div class="mt-2">
                            <a href="{{ asset('storage/' . $asset->file_path) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-download"></i> View Current File
                            </a>
                        </div>
                    @endif
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Additional Images</label>
                    <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                    <small class="text-muted">Upload new images (optional)</small>
                </div>

                @if($asset->images->count() > 0)
                    <div class="col-md-12 mb-3">
                        <label class="form-label">Current Images:</label>
                        <div class="row">
                            @foreach($asset->images as $image)
                                <div class="col-md-2 mb-2">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Asset Image" class="img-thumbnail">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="5">{{ $asset->description }}</textarea>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.assets.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update Asset
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
        url: '{{ route("admin.assets.update", $asset->id) }}',
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
                errorMsg = 'Failed to update asset';
            }
            showMessage('error', errorMsg);
        }
    });
});
</script>
@endpush
