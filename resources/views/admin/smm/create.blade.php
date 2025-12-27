@extends('admin.layouts.app')

@section('title', 'Create SMM')
@section('page-title', 'Create New Social Media Post')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Add New SMM</h5>
    </div>
    <div class="card-body">
        <form id="smmForm">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">SMM Name <span class="text-danger">*</span></label>
                    <input type="text" name="smm_name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Client</label>
                    <select name="smm_client" class="form-control select2">
                        <option value="">Select Client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Platform</label>
                    <select name="platform" class="form-control">
                        <option value="">Select Platform</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Twitter">Twitter</option>
                        <option value="LinkedIn">LinkedIn</option>
                        <option value="YouTube">YouTube</option>
                        <option value="Pinterest">Pinterest</option>
                        <option value="TikTok">TikTok</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Post Type</label>
                    <select name="post_type" class="form-control">
                        <option value="">Select Type</option>
                        <option value="Image">Image</option>
                        <option value="Video">Video</option>
                        <option value="Text">Text</option>
                        <option value="Link">Link</option>
                        <option value="Story">Story</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Scheduled Date</label>
                    <input type="datetime-local" name="scheduled_date" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Assign To Users</label>
                    <select name="user_id[]" class="form-control select2" multiple>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Post Content</label>
                    <textarea name="post_content" class="form-control" rows="5" placeholder="Enter your social media post content..."></textarea>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.smm.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create SMM
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
        url: '{{ route("admin.smm.store") }}',
        type: 'POST',
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
                errorMsg = 'Failed to create SMM entry';
            }
            showMessage('error', errorMsg);
        }
    });
});
</script>
@endpush
