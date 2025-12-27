@extends('admin.layouts.app')

@section('title', 'Edit SEO')
@section('page-title', 'Edit SEO Entry')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit SEO</h5>
    </div>
    <div class="card-body">
        <form id="seoForm">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">SEO Name <span class="text-danger">*</span></label>
                    <input type="text" name="seo_name" class="form-control" value="{{ $seo->seo_name }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Client</label>
                    <select name="seo_client" class="form-control select2">
                        <option value="">Select Client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ $seo->seo_client == $client->id ? 'selected' : '' }}>
                                {{ $client->client_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Keywords</label>
                    <input type="text" name="keywords" class="form-control" value="{{ $seo->keywords }}" placeholder="Enter keywords separated by commas">
                    <small class="text-muted">Example: digital marketing, seo, social media</small>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{ $seo->meta_title }}" maxlength="60">
                    <small class="text-muted">Recommended: 50-60 characters</small>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea name="meta_description" class="form-control" rows="3" maxlength="160">{{ $seo->meta_description }}</textarea>
                    <small class="text-muted">Recommended: 150-160 characters</small>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Assign To Users</label>
                    <select name="user_id[]" class="form-control select2" multiple>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ in_array($user->id, $userIds) ? 'selected' : '' }}>
                                {{ $user->username }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.seo.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update SEO
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$('#seoForm').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: '{{ route("admin.seo.update", $seo->id) }}',
        type: 'PUT',
        data: $(this).serialize(),
        success: function(response) {
            if(response.success) {
                showMessage('success', response.message);
                setTimeout(() => window.location.href = '{{ route("admin.seo.index") }}', 1500);
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
                errorMsg = 'Failed to update SEO entry';
            }
            showMessage('error', errorMsg);
        }
    });
});
</script>
@endpush
