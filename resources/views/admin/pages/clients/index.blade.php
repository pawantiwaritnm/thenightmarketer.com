@extends('admin.layouts.app')
@section('title', 'Manage Clients')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    $(document).ready(function () {
    $('.toggle-input input').change(function () {
        let clientId = $(this).data('client-id');
        let toggleType = $(this).data('toggle-type');
        let isChecked = $(this).prop('checked');

        let url = '';
        let data = {};

        // Determine which URL and data to use based on toggle type
        if (toggleType === 'status') {
            url = `{{ route('clients.updateStatus', ':id') }}`.replace(':id', clientId);
            data = { status: isChecked ? 1 : 0 };
        } else if (toggleType === 'is_home') {
            url = `{{ route('clients.updateIsHome', ':id') }}`.replace(':id', clientId);
            data = { is_home: isChecked ? 1 : 0 };
        }

        // Send the AJAX request
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function (response) {
                console.log(response.message);
            },
            error: function (error) {
                console.error(error.responseText);
                alert('Error updating ' + toggleType + ' status');
            }
        });
    });
        // Handle filter form submission 
        $('#filter-form').on('submit', function(e) {
            e.preventDefault();
            filterClients();
        });

        function filterClients() {
            const industry = $('#filter_industry').val();
            const status = $('#filter_status').val();
            
            $.ajax({
                url: "{{ route('clients.index') }}",
                type: 'GET',
                data: { industry: industry, status: status },
                success: function(response) {
                    $('#client-table-body').html(response);
                },
                error: function(error) {
                    console.error('Error fetching filtered data:', error);
                }
            });
        }
    });
   

    function handleDelete(element, name) {
        const confirmDelete = confirm(`Are you sure you want to delete client '${name}'?`);
        if (confirmDelete) {
            $(element).closest('form').submit();
        }
    }
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">Manage Clients</h4>
            </div>
        </div>
    </div>

    <!-- Filter Form -->
    <div class="row mb-4">
        <div class="col-lg-12">
            <form id="filter-form" class="form-inline">
                <div class="form-group mr-2">
                    <label for="filter_industry" class="mr-2">Industry</label>
                    <select id="filter_industry" class="form-control">
                        <option value="">All Industries</option>
                        @foreach($industries as $industry)
                            <option value="{{ $industry->id }}">{{ $industry->industry_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mr-2">
                    <label for="filter_status" class="mr-2">Status</label>
                    <select id="filter_status" class="form-control">
                        <option value="">All Status</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <a class="btn btn-primary" href="{{ route('clients.create') }}">Add New Client+</a>
        </div>
    </div>

    <div class="row">
        <!-- Client List (8 columns) -->
        <div class="col-lg-12">
            <div class="card card-Vertical card-default card-md">
                <div class="card-body">
                    <h5 class="mb-3">Client List</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Client Name</th>
                                <th>Website</th>
                                <th>Home Page</th>
                                <th>Industry</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="client-table-body">
                            @include('admin.pages.partials.client-list', ['clients' => $clients])
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageJs')
<script>
    function handleDelete(element, name) {
        const confirmDelete = confirm(`Are you sure you want to delete client '${name}'?`);
        if (confirmDelete) {
            $(element).closest('form').submit();
        }
    }
</script>
@endsection
