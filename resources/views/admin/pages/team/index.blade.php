@extends('admin.layouts.app')
@section('title', 'Manage Team Members')

@section('content')
<script>
$(document).ready(function() {
    // Status toggle handler
    $('.status-toggle').change(function() {
    const $toggle = $(this);
    const teamId = $toggle.data('team-id');
    const isChecked = $toggle.prop('checked');
    
    $.ajax({
        url: "{{ url('admin/team') }}/" + teamId + "/toggle-status",
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if(response.success) {
                $toggle.next('label').text(response.status ? 'Active' : 'Inactive');
                toastr.success(response.message);
            } else {
                $toggle.prop('checked', !isChecked);
                toastr.error(response.message);
            }
        },
        error: function(xhr) {
            $toggle.prop('checked', !isChecked);
            toastr.error('Error updating status');
            console.error(xhr.responseText);
        }
    });
});
    // Filter form handler
    $('#filter-form').on('submit', function(e) {
        e.preventDefault();
        filterTeamMembers();
    });

    function filterTeamMembers() {
        const designation = $('#filter_designation').val();
        const status = $('#filter_status').val();

        $.ajax({
            url: "{{ route('team.index') }}",
            type: 'GET',
            data: { 
                designation: designation, 
                status: status 
            },
            success: function(response) {
                // Replace the entire table body with new content
                $('#team-table-body').html($(response).find('#team-table-body').html());
            },
            error: function(xhr) {
                toastr.error('Error filtering data');
                console.error(xhr.responseText);
            }
        });
    }
});
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">Manage Team Members</h4>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center">
                <div class="filter-section">
                    <form id="filter-form" class="d-flex gap-3">
                        <div class="form-group">
                            <select id="filter_designation" class="form-control">
                                <option value="">All Designations</option>
                                @foreach ($designations as $designation)
                                    <option value="{{ $designation }}">{{ $designation }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                        <select id="filter_status" class="form-control">
    <option value="">All Status</option>
    <option value="1">Active</option>
    <option value="0">Inactive</option>
</select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </form>
                </div>
                <div>
                    <a href="{{ route('team.create') }}" class="btn btn-primary">Add New Member+</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">S No.</th>
                                    <th width="15%">Name</th>
                                    <th width="15%">Designation</th>
                                    <th width="25%">Description</th>
                                    <th width="10%">Image</th>
                                    <th width="10%">Status</th>
                                    <th width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="team-table-body">
                            @forelse ($teams as $key => $team)
    <tr>
        <td>{{ $key + 1 }}</td>
        <td>{{ $team->name }}</td>
        <td>{{ $team->designation }}</td>
        <td>{{ Str::limit($team->description, 50) }}</td>
        <td>
            @if($team->image)
                <img src="{{ asset('storage/' . $team->image) }}" 
                     alt="{{ $team->name }}" 
                     class="img-thumbnail"
                     style="max-width: 50px;">
            @else
                No Image
            @endif
        </td>
        <td>
    <div class="custom-control custom-switch">
        <input type="checkbox" 
               class="custom-control-input status-toggle"
               id="status_{{ $team->id }}"
               data-team-id="{{ $team->id }}"
               {{ $team->status ? 'checked' : '' }}>
        <label class="custom-control-label" 
               for="status_{{ $team->id }}">
            {{ $team->status ? 'Active' : 'Inactive' }}
        </label>
    </div>
</td>
        <td>
            <div class="d-flex gap-2">
                <a href="{{ route('team.edit', $team->id) }}" 
                   class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="7" class="text-center">No Team Members Found</td>
    </tr>
@endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSRF Token Meta -->
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('styles')
<style>
    .filter-section {
        display: flex;
        gap: 1rem;
    }
    .table-responsive {
        overflow-x: auto;
    }
    .custom-control-input:checked ~ .custom-control-label::before {
        background-color: #28a745;
        border-color: #28a745;
    }
    .custom-switch .custom-control-label {
        padding-left: 2.25rem;
        cursor: pointer;
    }
    .custom-switch .custom-control-input:checked ~ .custom-control-label::after {
        transform: translateX(1.75rem);
    }
</style>
@endsection

