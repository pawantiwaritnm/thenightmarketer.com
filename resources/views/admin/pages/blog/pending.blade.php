@extends('admin.layouts.app')
@section('content')
<script>
    $(document).ready(function () {
        $('.status-toggle input').change(function () {
            var serviceId = $(this).attr('id').replace('status_', '');
            var isChecked = $(this).prop('checked');

            // Send AJAX request to update the status
            $.ajax({
                url: 'update-blog-status/' + serviceId,
                type: 'POST',
                data: { status: isChecked ? 1 : 0 },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    console.log(response);
                    // Optionally handle success
                },
                error: function (error) {
                    console.error(error);
                    // Optionally handle error
                }
            });
        });
    });
</script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Manage Blogs</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <div class="action-btn">
                            <a href="{{ route('blog-create') }}" class="btn btn-sm btn-primary btn-add">
                                <i class="la la-plus"></i> Add New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form method="get" class="search_form" action="{{ route('blog-list') }}">
                    <div class="row d-flex justify-content-end">
                        <div class="col-md-3 search-admin">
                            <div class="form-group">
                                <input class="form-control hasDatepicker" type="text" id="query" name="query"
                                    value="{{ request('query') }}" placeholder="Search">
                            </div>
                        </div>
                        <div class="col-md-3 active-inactive">
                            <div class="form-group d-flex status">
                                <select class="form-control" name="status">
                                    <option {{ request('status') == '' ? 'selected' : '' }} value="">Select Status</option>
                                    <option {{ request('status') == '1' ? 'selected' : '' }} value="1">Active</option>
                                    <option {{ request('status') == '0' ? 'selected' : '' }} value="0">Inactive</option>
                                </select>
                                <input type="submit" class="btn btn-sm btn-primary" value="Search">
                            </div>
                        </div>
                        <div class="col-md-1 reset">
                            <div class="form-group">
                                <a href="{{ route('blog-list') }}" class="btn btn-sm"
                                    style="border: 1px solid gray">Reset</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-30">

                <div class="card mb-25">
                    <div class="card-body p-0">
                        <div class="drag-drop-wrap">
                            <div class="drag-drop table-responsive-lg bg-white w-100 mb-30">
                                <table class="table mb-0 table-borderless table-rounded">
                                    <thead>
                                        <th style="width: 90px;">S No.</th>
                                        <th style="width: 25%;">Title</th>
                                        <th style="width: 25%;">Sub-title</th>
                                        <th>Date</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Approval</th>  <!-- New column for Approval -->
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <!-- Inside your <tbody> -->
@foreach ($blogs as $i => $blog)
<tr class="draggable" draggable="true">
    <td style="width: 70px;">{{ ++$i }}</td>
    <td style="width: 25%;">{{ $blog->title }}</td>
    <td style="width: 25%;">{{ $blog->subtitle }}</td>
    <td>
        @if ($blog->date && $blog->date != '0000-00-00 00:00:00')
            {{ date('d-m-Y', strtotime($blog->date)) }}
        @else
            No date available
        @endif
    </td>
    <td>{{ @$blog->category->name }}</td>
    <td>{{ @$blog->author->name }}</td>
    <td>
        <label class="switch status-toggle">
            <input type="checkbox" id="approval_{{ $blog->id }}" 
                {{ $blog->is_approved == 1 ? 'checked' : '' }}>
            <span class="slider round"></span>
        </label>
        @if ($blog->is_approved == 0)
            Pending
        @elseif ($blog->is_approved == 1)
            Approved
        @else
            Unknown Status
        @endif
    </td>
    <td>
        <div class="table-actions">
            <a href="{{ route('blog-edit', $blog) }}" class="edit-btn">
                <span data-feather="edit"></span>
            </a>
            <a href="{{ route('blogDetails', $blog->slug) }}" class="edit-btn" target="_tnm">
                <span data-feather="eye"></span>
            </a>
        </div>
    </td>
</tr>
@endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
                {{ $blogs->links('vendor.pagination.custom') }}

            </div>
        </div>
    </div>
@endsection
@section('pageJs')
    <script>
        function handleDeleteBlog(obj, name) {
            const res = confirm(`Delete blog '${name}'?`)
            if (!res) return false;
            $(obj).closest('form').submit()
        }
    </script>
<script>
    $(document).ready(function () {
        $('.status-toggle input').change(function () {
            var blogId = $(this).attr('id').replace('approval_', '');
            var isChecked = $(this).prop('checked');
            
            // Send AJAX request to update the approval status
            $.ajax({
    url: '/admin/update-blog-approval/' + blogId, // Use a relative URL
    type: 'POST',
    data: { 
        is_approved: isChecked ? 1 : 0 
    },
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function (response) {
        console.log(response.message);
    },
    error: function (error) {
        console.error(error);
    }
});

        });
    });
</script>

@endsection
