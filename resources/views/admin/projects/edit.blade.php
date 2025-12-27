@extends('admin.layouts.app')

@section('title', 'Edit Project')
@section('page-title', 'Edit Project')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Project</h5>
    </div>
    <div class="card-body">
        <form id="projectForm">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $project->id }}">

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Project Name <span class="text-danger">*</span></label>
                    <input type="text" name="project_name" class="form-control" value="{{ $project->project_name }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Client <span class="text-danger">*</span></label>
                    <select name="client_id" class="form-control select2" required>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}" {{ $project->client_id == $client->id ? 'selected' : '' }}>
                                {{ $client->client_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Project Type <span class="text-danger">*</span></label>
                    <select name="project_type" class="form-control" required>
                        <option value="1" {{ $project->project_type == 1 ? 'selected' : '' }}>Maintenance</option>
                        <option value="2" {{ $project->project_type == 2 ? 'selected' : '' }}>New Project</option>
                    </select>
                </div>
                   <div class="col-md-6 mb-3">
                    <label class="form-label">Industry</label>
                    <select name="industry_id" class="form-control select2">
                        <option value="">Select Industry</option>
                        @foreach($industries as $industry)
                            <option {{ $project->industry_id == $industry->id ? 'selected' : '' }} value="{{ $industry->id }}">{{ $industry->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Technology</label>
                    <select name="technology_id" class="form-control select2">
                        <option value="">Select Technology</option>
                        @foreach($technologies as $tech)
                            <option {{ $project->technology_id == $tech->id ? 'selected' : '' }}  value="{{ $tech->id }}">{{ $tech->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Priority</label>
                    <select name="priority" class="form-control">
                        <option value="Low" {{ $project->priority == 'Low' ? 'selected' : '' }}>Low</option>
                        <option value="Medium" {{ $project->priority == 'Medium' ? 'selected' : '' }}>Medium</option>
                        <option value="High" {{ $project->priority == 'High' ? 'selected' : '' }}>High</option>
                        <option value="Urgent" {{ $project->priority == 'Urgent' ? 'selected' : '' }}>Urgent</option>
                    </select>
                </div>
                 <div class="col-md-6 mb-3">
                    <label class="form-label">Project Size</label>
                    <select name="project_size" class="form-control">
                        <option {{ $project->project_size == 'Small' ? 'selected' : '' }} value="Small">Small</option>
                        <option {{ $project->project_size == 'Medium' ? 'selected' : '' }} value="Medium">Medium</option>
                        <option {{ $project->project_size == 'Big' ? 'selected' : '' }} value="Big">Big</option>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Hourly?</label>
                    <select name="hourly" class="form-control">
                        <option {{ $project->hourly == 'No' ? 'selected' : '' }} value="No">No</option>
                        <option {{ $project->hourly == 'Yes' ? 'selected' : '' }} value="Yes">Yes</option>
                    </select>
                </div>
                   <div class="col-md-6 mb-3">
                    <label class="form-label">Project Hours</label>
                    <input type="number" name="project_hours" value="{{ $project->project_hours }}" class="form-control">
                </div>



                <div class="col-md-6 mb-3">
                    <label class="form-label">Starting Date <span class="text-danger">*</span></label>
                    <input type="date" name="starting_date" class="form-control" value="{{ $project->starting_date }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Ending Date</label>
                    <input type="date" name="ending_date" class="form-control" value="{{ $project->ending_date }}">
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Assign Marketers</label>
                    <select name="marketer_id[]" class="form-control select2" multiple>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ in_array($user->id, $marketerIds) ? 'selected' : '' }}>
                                {{ $user->username }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Project Details</label>
                    <textarea name="some_details" class="form-control" rows="4">{{ $project->some_details }}</textarea>
                </div>
            </div>

            <div class="text-end">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update Project
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
        url: '{{ route("admin.projects.update", $project->id) }}',
        type: 'PUT',
        data: $(this).serialize(),
        success: function(response) {
            if(response.success) {
                showMessage('success', response.message);
                setTimeout(() => window.location.href = '{{ route("admin.projects.index") }}', 1500);
            }
        },
        error: function(xhr) {
            showMessage('error', 'Failed to update project');
        }
    });
});
</script>
@endpush
