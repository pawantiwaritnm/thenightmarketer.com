@extends('admin.layouts.app')

@section('title', 'Create Reminder')
@section('page-title', 'Create New Reminder')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Add New Reminder</h5>
    </div>
    <div class="card-body">
        <form id="reminderForm">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Reminder Name <span class="text-danger">*</span></label>
                    <input type="text" name="reminder_name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Reminder Date <span class="text-danger">*</span></label>
                    <input type="datetime-local" name="reminder_date" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Client</label>
                    <select name="reminder_client" class="form-control select2">
                        <option value="">Select Client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Project</label>
                    <select name="reminder_project" class="form-control select2">
                        <option value="">Select Project</option>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Assign To Users</label>
                    <select name="user_id[]" class="form-control select2" multiple>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">Users will receive email notifications</small>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.reminders.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create Reminder
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$('#reminderForm').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: '{{ route("admin.reminders.store") }}',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            if(response.success) {
                showMessage('success', response.message);
                setTimeout(() => window.location.href = '{{ route("admin.reminders.index") }}', 1500);
            }
        },
        error: function(xhr) {
            showMessage('error', 'Failed to create reminder');
        }
    });
});
</script>
@endpush
