@extends('admin.layouts.app')

@section('title', 'Create Meeting')
@section('page-title', 'Create New Meeting')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Add New Meeting</h5>
    </div>
    <div class="card-body">
        <form id="meetingForm">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Meeting Name <span class="text-danger">*</span></label>
                    <input type="text" name="meeting_name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Meeting Date <span class="text-danger">*</span></label>
                    <input type="datetime-local" name="meeting_date" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Client</label>
                    <select name="meeting_client" class="form-control select2">
                        <option value="">Select Client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                        @endforeach
                    </select>
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
                    <label class="form-label">Meeting Agenda</label>
                    <textarea name="meeting_agenda" class="form-control" rows="4" placeholder="Enter meeting agenda..."></textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Meeting Minutes</label>
                    <textarea name="meeting_minutes" class="form-control" rows="4" placeholder="Enter meeting minutes..."></textarea>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.meetings.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create Meeting
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$('#meetingForm').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: '{{ route("admin.meetings.store") }}',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            if(response.success) {
                showMessage('success', response.message);
                setTimeout(() => window.location.href = '{{ route("admin.meetings.index") }}', 1500);
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
                errorMsg = 'Failed to create meeting';
            }
            showMessage('error', errorMsg);
        }
    });
});
</script>
@endpush
