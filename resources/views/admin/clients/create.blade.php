@extends('admin.layouts.app')

@section('title', 'Create Client')
@section('page-title', 'Create New Client')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Add New Client</h5>
    </div>
    <div class="card-body">
        <form id="clientForm">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Client Name <span class="text-danger">*</span></label>
                    <input type="text" name="client_name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Client Email <span class="text-danger">*</span></label>
                    <input type="email" name="client_email" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Client Phone <span class="text-danger">*</span></label>
                    <input type="text" name="client_phone" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Client Location</label>
                    <input type="text" name="client_locations" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">POC Name</label>
                    <input type="text" name="poc_name" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">POC Phone</label>
                    <input type="text" name="poc_phone" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">POC Email</label>
                    <input type="email" name="poc_email" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Categories</label>
                    <select name="category_id[]" class="form-control select2" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create Client
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$('#clientForm').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: '{{ route("admin.clients.store") }}',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            if(response.success) {
                showMessage('success', response.message);
                setTimeout(() => window.location.href = '{{ route("admin.clients.index") }}', 1500);
            }
        },
        error: function(xhr) {
            let errors = xhr.responseJSON.errors;
            let errorMsg = '';
            for(let field in errors) {
                errorMsg += errors[field][0] + '<br>';
            }
            showMessage('error', errorMsg);
        }
    });
});
</script>
@endpush
