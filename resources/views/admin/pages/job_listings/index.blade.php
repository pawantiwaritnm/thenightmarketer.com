@extends('admin.layouts.app')

@section('content')
<script>
    $(document).ready(function() {
        $('.status-toggle input').change(function() {
            var jobId = $(this).attr('id').replace('status_', '');
            var isChecked = $(this).prop('checked');

            $.ajax({
                url: '/job-listings/update-status/' + jobId,
                type: 'POST',
                data: {
                    status: isChecked ? '1' : '0'
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });
    });
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">Manage Job Listings</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                    <div class="action-btn">
                        <a href="{{ route('job.listings.create') }}" class="btn btn-sm btn-primary btn-add">
                            <i class="la la-plus"></i> Add New Job</a>
                    </div>
                </div>
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

    {{-- Job Search (Optional) --}}
    <div class="row">
        <div class="col-md-12">
            <form method="get" class="search_form" action="{{ route('job.listings.index') }}">
                <div class="row d-flex justify-content-end">
                    <div class="col-md-4">
                        <input class="form-control" type="text" name="query" value="{{ request('query') }}" placeholder="Search by title or department">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="status">
                            <option value="">All Status</option>
                            <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-sm btn-primary" value="Search">
                    </div>
                    <div class="col-md-1">
                        <a href="{{ route('job.listings.index') }}" class="btn btn-sm btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Job Listings Table --}}
    <div class="row mt-3">
        <div class="col-12 mb-30">
            <div class="card mb-25">
                <div class="card-body p-0">
                    <div class="table-responsive-lg bg-white w-100 mb-30">
                        <table class="table mb-0 table-borderless table-rounded">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Department</th>
                                    <th>Location</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Sort Order</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $i => $job)
                                <tr>
                                    <td>{{ $i + $jobs->firstItem() }}</td>
                                    <td>{{ @$job->title }}</td>
                                    <td>{{ @$job->department->name }}</td>
                                    <td>{{ @$job->location }}</td>
                                    <td>{{ @$job->type->name }}</td>
                                    <td>
                                        <label class="switch status-toggle">
                                            <input type="checkbox" id="status_{{ $job->id }}" {{ $job->status == '1' ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>{{ @$job->sort_order }}</td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="{{ route('job.listings.edit', $job->id) }}" class="edit-btn">
                                                <span data-feather="edit"></span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $jobs->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection