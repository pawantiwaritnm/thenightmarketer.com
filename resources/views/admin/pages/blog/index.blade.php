@extends('admin.layouts.app')
@section('title', 'Blogs')
@section('page-title', 'Blog Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-blog me-2"></i>All Blogs</h5>
        @if(can_access('Blogs', 'add'))
        <a href="{{ route('blog-create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus"></i> Add New Blog
        </a>
        @endif
    </div>
    <div class="card-body">
        <!-- Filters -->
        <form method="get" action="{{ route('blog-list') }}" class="mb-4">
            <div class="row g-3">
                <div class="col-md-3">
                    <input class="form-control" type="text" id="query" name="query"
                        value="{{ request('query') }}" placeholder="Search blogs...">
                </div>
                @if (session('role') == 'Admin')
                <div class="col-md-3">
                    <select class="form-select" name="author_id">
                        <option value="">All Authors</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ request('author_id') == $author->id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @endif
                <div class="col-md-2">
                    <select class="form-select" name="status">
                        <option {{ request('status') == '' ? 'selected' : '' }} value="">All Status</option>
                        <option {{ request('status') == '1' ? 'selected' : '' }} value="1">Active</option>
                        <option {{ request('status') == '0' ? 'selected' : '' }} value="0">Inactive</option>
                    </select>
                </div>
                <div class="col-md-auto">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Search
                    </button>
                    <a href="{{ route('blog-list') }}" class="btn btn-secondary">
                        <i class="fas fa-redo"></i> Reset
                    </a>
                </div>
            </div>
        </form>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Subtitle</th>
                        <th>Date</th>
                        <th>Category</th>
                        <th>Author</th>
                        @if (session('role') == 'Admin')
                        <th>Status</th>
                        @else
                        <th>Approval</th>
                        @endif
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($blogs as $i => $blog)
                        <tr>
                            <td>{{ $blog->id }}</td>
                            <td><strong>{{ $blog->title }}</strong></td>
                            <td>{{ $blog->subtitle }}</td>
                            <td>
                                @if ($blog->date && $blog->date != '0000-00-00 00:00:00')
                                    {{ date('M d, Y', strtotime($blog->date)) }}
                                @else
                                    <span class="text-muted">No date</span>
                                @endif
                            </td>
                            <td>
                                @if($blog->category)
                                    <span class="badge bg-info">{{ $blog->category->name }}</span>
                                @else
                                    <span class="badge bg-secondary">Uncategorized</span>
                                @endif
                            </td>
                            <td>{{ @$blog->author->name }}</td>
                            @if (session('role') == 'Admin')
                            <td>
                                @if ($blog->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            @else
                            <td>
                                @if ($blog->is_approved == 1)
                                    <span class="badge bg-success">Approved</span>
                                @elseif ($blog->is_approved == 0)
                                    <span class="badge bg-warning">Pending</span>
                                @else
                                    <span class="badge bg-secondary">Unknown</span>
                                @endif
                            </td>
                            @endif
                            <td>
                                <div class="btn-group btn-group-sm">
                                    @if (can_access('Blogs', 'view') && ($blog->is_approved == '1' || session('role') == 'Admin'))
                                    <a href="{{ route('blogDetails', $blog->slug) }}" class="btn btn-info" title="View" target="_tnm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    @endif
                                    @if (can_access('Blogs', 'edit'))
                                    <a href="{{ route('blog-edit', $blog) }}" class="btn btn-primary" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endif
                                    @if (can_access('Blogs', 'edit') && session('role') == 'Admin')
                                    <button type="button" class="btn btn-{{ $blog->status == 1 ? 'warning' : 'success' }} toggle-status-btn"
                                            data-id="{{ $blog->id }}"
                                            data-status="{{ $blog->status }}"
                                            title="{{ $blog->status == 1 ? 'Deactivate' : 'Activate' }}">
                                        <i class="fas fa-{{ $blog->status == 1 ? 'toggle-off' : 'toggle-on' }}"></i>
                                    </button>
                                    @endif
                                    @if (can_access('Blogs', 'delete'))
                                    <button type="button" class="btn btn-danger delete-btn"
                                            data-id="{{ $blog->id }}"
                                            data-title="{{ $blog->title }}"
                                            title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted py-4">
                                <i class="fas fa-inbox fa-3x mb-3"></i>
                                <p>No blogs found</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            {{ $blogs->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Toggle blog status
    $('.toggle-status-btn').click(function() {
        const blogId = $(this).data('id');
        const currentStatus = $(this).data('status');
        const newStatus = currentStatus == 1 ? 0 : 1;
        const button = $(this);

        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to ${newStatus == 1 ? 'activate' : 'deactivate'} this blog?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, proceed!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'update-blog-status/' + blogId,
                    type: 'POST',
                    data: { status: newStatus },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        showMessage('success', `Blog ${newStatus == 1 ? 'activated' : 'deactivated'} successfully`);
                        setTimeout(() => location.reload(), 1500);
                    },
                    error: function(error) {
                        console.error(error);
                        showMessage('error', 'Failed to update blog status');
                    }
                });
            }
        });
    });

    // Delete blog
    $('.delete-btn').click(function() {
        const blogId = $(this).data('id');
        const blogTitle = $(this).data('title');

        Swal.fire({
            title: 'Are you sure?',
            text: `Delete blog "${blogTitle}"? This action cannot be undone!`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const form = $('<form>', {
                    'method': 'POST',
                    'action': '/admin/blog-destroy/' + blogId
                });

                form.append($('<input>', {
                    'type': 'hidden',
                    'name': '_token',
                    'value': $('meta[name="csrf-token"]').attr('content')
                }));

                form.append($('<input>', {
                    'type': 'hidden',
                    'name': '_method',
                    'value': 'DELETE'
                }));

                $('body').append(form);
                form.submit();
            }
        });
    });
});
</script>
@endpush
