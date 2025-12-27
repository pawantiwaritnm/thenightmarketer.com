@extends('admin.layouts.app')

@section('page-title', 'Categories')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script>
    $(document).ready(function() {
        // Handle status toggle
        $('.status-toggle input').change(function() {
            var categoryId = $(this).attr('id').replace('status_', '');
            var isChecked = $(this).prop('checked');

            $.ajax({
                url: '/update-cat-status/' + categoryId,
                type: 'POST',
                data: {
                    status: isChecked ? 1 : 0
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response.message);
                },
                error: function(error) {
                    console.error(error.responseText);
                    alert('Error updating status');
                }
            });
        });
    });
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">Categories</h4>
                <div class="breadcrumb-action justify-content-center flex-wrap">
                    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">
                        <i class="la la-plus"></i> Add New
                    </a>
                    <!-- <form method="POST" action="#" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-table"></i> Export
                        </button>
                    </form> -->
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-30">
            <div class="card mb-25">
                <div class="card-body p-0">
                    <div class="table-responsive-lg bg-white">
                        <table class="table mb-0 table-borderless table-rounded">
                            <thead>
                                <tr>
                                    <th>S No.</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Parent Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $index => $cat)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ $cat->url }}</td>
                                    <td>{{ $cat->parent->name ?? 'N/A' }}</td>
                                    <td>
                                        <label class="switch status-toggle">
                                            <input type="checkbox" id="status_{{ $cat->id }}" {{ $cat->status == 1 ? 'checked' : '' }}>
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="{{ route('categories.edit', ['category' => $cat->id]) }}" class="edit-btn">
                                                <i class="la la-edit"></i>
                                            </a>

                                            <form method="POST" action="{{ route('categories.destroy', $cat) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0)" onclick="handleDeleteCat(this, '{{ $cat->name }}')" class="del-btn">
                                                    <i class="la la-trash"></i>
                                                </a>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No categories found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $categories->links('vendor.pagination.custom') }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageJs')
<script>
    function handleDeleteCat(element, name) {
        const confirmDelete = confirm(`Are you sure you want to delete category '${name}'?`);
        if (confirmDelete) {
            $(element).closest('form').submit();
        }
    }
</script>
@endsection