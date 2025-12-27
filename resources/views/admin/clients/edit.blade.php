@extends('admin.layouts.app')

@section('title', 'Edit Client')
@section('page-title', 'Edit Client')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Client</h5>
    </div>
    <div class="card-body">
        <form id="clientForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $client->id }}">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Client Name <span class="text-danger">*</span></label>
                    <input type="text" name="client_name" class="form-control" value="{{ $client->client_name }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Client Email <span class="text-danger">*</span></label>
                    <input type="email" name="client_email" class="form-control" value="{{ $client->client_email }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Client Phone <span class="text-danger">*</span></label>
                    <input type="text" name="client_phone" class="form-control" value="{{ $client->client_phone }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Client Location</label>
                    <input type="text" name="client_locations" class="form-control" value="{{ $client->client_locations }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">POC Name</label>
                    <input type="text" name="poc_name" class="form-control" value="{{ $client->poc_name }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">POC Phone</label>
                    <input type="text" name="poc_phone" class="form-control" value="{{ $client->poc_phone }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">POC Email</label>
                    <input type="email" name="poc_email" class="form-control" value="{{ $client->poc_email }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Categories</label>
                    <select name="category_id[]" class="form-control select2" multiple>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ in_array($category->id, $categoryIds) ? 'selected' : '' }}>
                                {{ $category->category }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update Client
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
        url: '{{ route("admin.clients.update", $client->id) }}',
        type: 'PUT',
        data: $(this).serialize(),
        success: function(response) {
            if(response.success) {
                showMessage('success', response.message);
                setTimeout(() => window.location.href = '{{ route("admin.clients.index") }}', 1500);
            }
        },
        error: function(xhr) {
            showMessage('error', 'Failed to update client');
        }
    });
});
</script>
@endpush
