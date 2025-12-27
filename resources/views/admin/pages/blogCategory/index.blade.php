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
                                <a href="{{ route('blog-category-edit', $cat) }}" class="btn btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-danger delete-btn"
                                        data-id="{{ $cat->id }}"
                                        data-name="{{ $cat->name }}"
                                        title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
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
    // Delete category
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
                    'action': '/admin/blog-category/' + catId
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
