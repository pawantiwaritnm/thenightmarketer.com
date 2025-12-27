@extends('admin.layouts.app')
@section('title', 'Manage Page Meta')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    $(document).ready(function() {
        // Handle filter form submission
        $('#filter-form').on('submit', function(e) {
            e.preventDefault();
            filterPageMeta();
        });

        function filterPageMeta() {
    const slug = $('#filter_slug').val();

    $.ajax({
        url: "{{ route('pagemeta.index') }}",
        type: 'GET',
        data: { slug: slug },
        success: function(response) {
            $('#pagemeta-table-body').html(response);
        },
        error: function(error) {
            console.error('Error fetching filtered data:', error);
        }
    });
}

    });

    function handleDelete(element, slug) {
        const confirmDelete = confirm(`Are you sure you want to delete page meta with slug '${slug}'?`);
        if (confirmDelete) {
            $(element).closest('form').submit();
        }
    }
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">Manage Page Meta</h4>
            </div>
        </div>
    </div>
 <!-- Display All Error Messages on Top -->
 @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops! There were some problems with your input:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
    <!-- Filter Form -->
    <div class="row mb-4">
        <div class="col-lg-12">
            <form id="filter-form" class="form-inline">
                <div class="form-group mr-2">
                    <label for="filter_slug" class="mr-2">Slug</label>
                    <input type="text" id="filter_slug" class="form-control" placeholder="Enter slug">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
            <a class="btn btn-primary" href="{{ route('pagemeta.create') }}">Add New Page Meta +</a>
        </div>
    </div>

    <div class="row">
        <!-- Page Meta List -->
        <div class="col-lg-12">
            <div class="card card-Vertical card-default card-md">
                <div class="card-body">
                    <h5 class="mb-3">Page Meta List</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>S No.</th>
                                <th>Slug</th>
                                <th>Meta Title</th>
                                <th>Meta Description</th>
                                <th>Meta Keywords</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="pagemeta-table-body">
    @include('admin.pages.pagemeta.partials.pagemeta-list', ['pageMetas' => $pageMetas])
</tbody>

                    </table>
                    @if($pageMetas->isEmpty())
                        <p class="text-center">No Page Meta records found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageJs')
<script>
    function handleDelete(element, slug) {
        const confirmDelete = confirm(`Are you sure you want to delete page meta with slug '${slug}'?`);
        if (confirmDelete) {
            $(element).closest('form').submit();
        }
    }
</script>
@endsection
