@extends('admin.layouts.app')
@section('title', isset($job) ? 'Edit Job' : 'Add Job')

@section('content')
<style>
    .badge {
        display: inline-block;
        padding: 0.4em 0.7em;
        font-size: 0.85em;
        background-color: #007bff;
        color: white;
        border-radius: 3px;
        margin-right: 5px;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">{{ isset($job) ? 'Edit' : 'Add' }} Job Listing</h4>
            </div>
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>There were some errors:</strong>
        <ul class="mb-0 mt-1">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <form method="POST" action="{{ isset($job) ? route('job.listings.update', $job->id) : route('job.listings.store') }}">
        @csrf
        @isset($job)
        @method('POST')
        @endisset

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Job Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $job->title ?? '') }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $job->slug ?? '') }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Department</label>
                    <select name="department_id" class="form-control">
                        <option value="">Select Department</option>
                        @foreach($departments as $department)
                        <option value="{{ $department->id }}" {{ old('department_id', $job->department_id ?? '') == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="form-control" value="{{ old('location', $job->location ?? '') }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Type</label>
                    <select name="type_id" class="form-control">
                        <option>Select Type</option>
                        @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ old('type_id', $job->type_id ?? '') == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Skills Required</label>
                    <input type="text" id="skills_input" class="form-control" placeholder="Type skill and press comma" />
                    <input type="hidden" name="skills_req" id="skills_hidden" value="{{ old('skills_req', $job->skills_req ?? '') }}">
                    <div id="skills_tags" class="mt-2"></div>
                    @error('skills_req')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="col-md-12">
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea name="short_desc" rows="3" class="form-control">{{ old('short_desc', $job->short_desc ?? '') }}</textarea>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Long Description</label>
                    <textarea name="long_desc" id="long_desc" class="form-control">{{ old('long_desc', $job->long_desc ?? '') }}</textarea>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Minimum Experience</label>
                    <input type="text" name="minimum_exp" class="form-control" placeholder="e.g. 2+ years" value="{{ old('minimum_exp', $job->minimum_exp ?? '') }}">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $job->sort_order ?? 0) }}">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label>Email Subject</label>
                    <input type="text" name="email_subject" class="form-control" value="{{ old('email_subject', $job->email_subject ?? '') }}">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Email Body</label>
                    <textarea name="email_body" id="email_body" class="form-control" rows="6">{{ old('email_body', $job->email_body ?? '') }}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status', $job->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $job->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">{{ isset($job) ? 'Update Job' : 'Create Job' }}</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('pageJs')
<script src="{{ asset('admin/js/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('long_desc');
    CKEDITOR.replace('email_body');
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('skills_input');
        const hiddenInput = document.getElementById('skills_hidden');
        const tagsContainer = document.getElementById('skills_tags');

        // Initialize tags from hidden input if value exists
        let tagsArray = hiddenInput.value ?
            hiddenInput.value.split(',').map(tag => tag.trim()).filter(tag => tag !== '') : [];

        function renderTags() {
            tagsContainer.innerHTML = '';
            tagsArray.forEach((tag, i) => {
                const span = document.createElement('span');
                span.className = 'badge badge-primary mr-1 mb-1';
                span.innerHTML = `${tag} <span style="cursor:pointer;" onclick="removeSkill(${i})">&times;</span>`;
                tagsContainer.appendChild(span);
            });
            hiddenInput.value = tagsArray.join(',');
        }

        function removeSkill(index) {
            tagsArray.splice(index, 1);
            renderTags();
        }

        input.addEventListener('keyup', function(e) {
            if (e.key === ',' || e.key === 'Enter') {
                e.preventDefault();
                let newTag = input.value.trim().replace(',', '');
                if (newTag && !tagsArray.includes(newTag)) {
                    tagsArray.push(newTag);
                    input.value = '';
                    renderTags();
                }
            }
        });

        renderTags();
        window.removeSkill = removeSkill;

        // Ensure hidden input is synced before form submission
        document.querySelector('form').addEventListener('submit', function() {
            hiddenInput.value = tagsArray.join(',');
        });
    });
</script>
@endsection