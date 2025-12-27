@extends('admin.layouts.app')

@section('title', 'Create Project')
@section('page-title', 'Create New Project')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Add New Project</h5>
    </div>
    <div class="card-body">
        <form id="projectForm" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Project Name <span class="text-danger">*</span></label>
                    <input type="text" name="project_name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Client <span class="text-danger">*</span></label>
                    <select name="client_id" class="form-control select2" required>
                        <option value="">Select Client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Project Type <span class="text-danger">*</span></label>
                    <select name="project_type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="1">Maintenance</option>
                        <option value="2">New Project</option>
                    </select>
                </div>   <div class="col-md-6 mb-3">
                    <label class="form-label">Industry</label>
                    <select name="industry_id" class="form-control select2">
                        <option value="">Select Industry</option>
                        @foreach($industries as $industry)
                            <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Technology</label>
                    <select name="technology_id" class="form-control select2">
                        <option value="">Select Technology</option>
                        @foreach($technologies as $tech)
                            <option value="{{ $tech->id }}">{{ $tech->name }}</option>
                        @endforeach
                    </select>
                </div>

             

                <div class="col-md-6 mb-3">
                    <label class="form-label">Priority</label>
                    <select name="priority" class="form-control">
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                        <option value="Urgent">Urgent</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Project Size</label>
                    <select name="project_size" class="form-control">
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Big">Big</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Hourly?</label>
                    <select name="hourly" class="form-control">
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Project Hours</label>
                    <input type="number" name="project_hours" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Starting Date <span class="text-danger">*</span></label>
                    <input type="date" name="starting_date" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Ending Date</label>
                    <input type="date" name="ending_date" class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Assign Marketers</label>
                    <select name="marketer_id[]" class="form-control select2" multiple>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->username }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Project Details</label>
                    <textarea name="some_details" class="form-control" rows="4"></textarea>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Create Project
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$('#projectForm').submit(function(e) {
    e.preventDefault();

    $.ajax({
        url: '{{ route("admin.projects.store") }}',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            if(response.success) {
                showMessage('success', response.message);
                setTimeout(() => window.location.href = '{{ route("admin.projects.index") }}', 1500);
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
