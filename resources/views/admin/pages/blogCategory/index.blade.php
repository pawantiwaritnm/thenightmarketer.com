@extends('admin.layouts.app')
@section('title', 'Blog Categories')
@section('page-title', 'Blog Categories Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-folder me-2"></i>All Blog Categories</h5>
        <a href="{{ route('blog-category-create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus"></i> Add New Category
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>No. of Blogs</th>
                        <th>Parent Category</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td><strong>{{ $cat->name }}</strong></td>
                        <td>
                            <span class="badge bg-primary">{{ $cat->blogs_count }}</span>
                        </td>
                        <td>
                            @if($cat->parent)
                                <span class="badge bg-info">{{ $cat->parent->name }}</span>
                            @else
                                <span class="text-muted">Root Category</span>
                            @endif
                        </td>
                        <td>
                            @if($cat->status === 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                @if(can_access('Blog Categories', 'edit'))
                                <a href="{{ route('blog-category-edit', $cat) }}" class="btn btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endif
                                @if(can_access('Blog Categories', 'edit'))
                                <button type="button" class="btn btn-{{ $cat->status == 1 ? 'success' : 'secondary' }} toggle-status-btn"
                                        data-id="{{ $cat->id }}"
                                        data-status="{{ $cat->status }}"
                                        title="{{ $cat->status == 1 ? 'Set Inactive' : 'Set Active' }}">
                                    <i class="fas fa-toggle-{{ $cat->status == 1 ? 'on' : 'off' }}"></i>
                                </button>
                                @endif
                                @if(can_access('Blog Categories', 'delete'))
                                <button type="button" class="btn btn-danger delete-btn"
                                        data-id="{{ $cat->id }}"
                                        data-name="{{ $cat->name }}"
                                        title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="fas fa-inbox fa-3x mb-3"></i>
                            <p>No blog categories found</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Toggle category status (between 1 and 0 only)
    $('.toggle-status-btn').click(function() {
        const catId = $(this).data('id');
        const currentStatus = $(this).data('status');
        const newStatus = currentStatus == 1 ? 0 : 1;

        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to ${newStatus == 1 ? 'activate' : 'deactivate'} this category?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, proceed!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/blog-category/' + catId + '/toggle-status',
                    type: 'POST',
                    data: { status: newStatus },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        showMessage('success', `Category ${newStatus == 1 ? 'activated' : 'deactivated'} successfully`);
                        setTimeout(() => location.reload(), 1500);
                    },
                    error: function(error) {
                        console.error(error);
                        showMessage('error', 'Failed to update category status');
                    }
                });
            }
        });
    });

    // Delete category (soft delete - sets status to -1)
    $('.delete-btn').click(function() {
        const catId = $(this).data('id');
        const catName = $(this).data('name');

        Swal.fire({
            title: 'Are you sure?',
            text: `Delete category "${catName}"?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Create and submit form
                const form = $('<form>', {
                    'method': 'POST',
                    'action': '/admin/blog-category-destroy/' + catId
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
