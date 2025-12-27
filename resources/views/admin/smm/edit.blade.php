@extends('admin.layouts.app')

@section('title', 'Edit SMM')
@section('page-title', 'Edit Social Media Post')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit SMM</h5>
    </div>
    <div class="card-body">
        <form id="smmForm">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">SMM Name <span class="text-danger">*</span></label>
                    <input type="text" name="smm_name" class="form-control" value="{{ $smm->smm_name }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Client</label>
                    <select name="smm_client" class="form-control select2">
                        <option value="">Select Client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ $smm->smm_client == $client->id ? 'selected' : '' }}>
                                {{ $client->client_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Platform</label>
                    <select name="platform" class="form-control">
                        <option value="">Select Platform</option>
                        <option value="Facebook" {{ $smm->platform == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                        <option value="Instagram" {{ $smm->platform == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                        <option value="Twitter" {{ $smm->platform == 'Twitter' ? 'selected' : '' }}>Twitter</option>
                        <option value="LinkedIn" {{ $smm->platform == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                        <option value="YouTube" {{ $smm->platform == 'YouTube' ? 'selected' : '' }}>YouTube</option>
                        <option value="Pinterest" {{ $smm->platform == 'Pinterest' ? 'selected' : '' }}>Pinterest</option>
                        <option value="TikTok" {{ $smm->platform == 'TikTok' ? 'selected' : '' }}>TikTok</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Post Type</label>
                    <select name="post_type" class="form-control">
                        <option value="">Select Type</option>
                        <option value="Image" {{ $smm->post_type == 'Image' ? 'selected' : '' }}>Image</option>
                        <option value="Video" {{ $smm->post_type == 'Video' ? 'selected' : '' }}>Video</option>
                        <option value="Text" {{ $smm->post_type == 'Text' ? 'selected' : '' }}>Text</option>
                        <option value="Link" {{ $smm->post_type == 'Link' ? 'selected' : '' }}>Link</option>
                        <option value="Story" {{ $smm->post_type == 'Story' ? 'selected' : '' }}>Story</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Scheduled Date</label>
                    <input type="datetime-local" name="scheduled_date" class="form-control"
                           value="{{ $smm->scheduled_date ? \Carbon\Carbon::parse($smm->scheduled_date)->format('Y-m-d\TH:i') : '' }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Assign To Users</label>
                    <select name="user_id[]" class="form-control select2" multiple>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ in_array($user->id, $userIds) ? 'selected' : '' }}>
                                {{ $user->username }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Post Content</label>
                    <textarea name="post_content" class="form-control" rows="5">{{ $smm->post_content }}</textarea>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.smm.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update SMM
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$('#smmForm').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: '{{ route("admin.smm.update", $smm->id) }}',
        type: 'PUT',
        data: $(this).serialize(),
        success: function(response) {
            if(response.success) {
                showMessage('success', response.message);
                setTimeout(() => window.location.href = '{{ route("admin.smm.index") }}', 1500);
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
                errorMsg = 'Failed to update SMM entry';
            }
            showMessage('error', errorMsg);
        }
    });
});
</script>
@endpush
