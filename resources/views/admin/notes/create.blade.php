@extends('admin.layouts.app')

@section('title', 'Create Note')
@section('page-title', 'Create New Note')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Add New Note</h5>
    </div>
    <div class="card-body">
        <form id="noteForm">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Topic <span class="text-danger">*</span></label>
                    <input type="text" name="topic" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Date <span class="text-danger">*</span></label>
                    <input type="date" name="date" class="form-control" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-control">
                        <option value="0">Normal</option>
                        <option value="1">Important</option>
                        <option value="2">Task</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Note Content <span class="text-danger">*</span></label>
                    <textarea name="text" id="noteContent" class="form-control" rows="8" required></textarea>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.notes.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create Note
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
CKEDITOR.replace('noteContent');

$('#noteForm').submit(function(e) {
    e.preventDefault();

    // Get CKEditor data
    var noteData = CKEDITOR.instances.noteContent.getData();
    var formData = $(this).serializeArray();

    // Update text field with CKEditor content
    formData = formData.filter(item => item.name !== 'text');
    formData.push({name: 'text', value: noteData});

    $.ajax({
        url: '{{ route("admin.notes.store") }}',
        type: 'POST',
        data: $.param(formData),
        success: function(response) {
            if(response.success) {
                showMessage('success', response.message);
                setTimeout(() => window.location.href = '{{ route("admin.notes.index") }}', 1500);
            }
        },
        error: function(xhr) {
            showMessage('error', 'Failed to create note');
        }
    });
});
</script>
@endpush
