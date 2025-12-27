@extends('admin.layouts.app')

@section('title', 'Edit Note')
@section('page-title', 'Edit Note')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Note</h5>
    </div>
    <div class="card-body">
        <form id="noteForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $note->id }}">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Topic <span class="text-danger">*</span></label>
                    <input type="text" name="topic" class="form-control" value="{{ $note->topic }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Date <span class="text-danger">*</span></label>
                    <input type="date" name="date" class="form-control" value="{{ $note->date }}" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-control">
                        <option value="0" {{ $note->type == 0 ? 'selected' : '' }}>Normal</option>
                        <option value="1" {{ $note->type == 1 ? 'selected' : '' }}>Important</option>
                        <option value="2" {{ $note->type == 2 ? 'selected' : '' }}>Task</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Note Content <span class="text-danger">*</span></label>
                    <textarea name="text" id="noteContent" class="form-control" rows="8" required>{{ $note->text }}</textarea>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.notes.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update Note
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

    var noteData = CKEDITOR.instances.noteContent.getData();
    var formData = $(this).serializeArray();
    formData = formData.filter(item => item.name !== 'text');
    formData.push({name: 'text', value: noteData});

    $.ajax({
        url: '{{ route("admin.notes.update", $note->id) }}',
        type: 'PUT',
        data: $.param(formData),
        success: function(response) {
            if(response.success) {
                showMessage('success', response.message);
                setTimeout(() => window.location.href = '{{ route("admin.notes.index") }}', 1500);
            }
        },
        error: function(xhr) {
            showMessage('error', 'Failed to update note');
        }
    });
});
</script>
@endpush
