@extends('admin.layouts.app')
@section('title', 'Services')
@section('page-title', 'Services Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>All Services</h5>
        @if(can_access('Services', 'add'))
        <a href="{{ route('services.create') }}" class="btn btn-light btn-sm">
            <i class="fas fa-plus"></i> Add New Service
        </a>
        @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Type</th>
                        <th>Achievements</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($services as $key => $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td><strong>{{ $service->title }}</strong></td>
                        <td><code>{{ $service->slug }}</code></td>
                        <td>
                            @if($service->service_type == 'city')
                                <span class="badge bg-info">City Service</span>
                                @if($service->city_name)
                                    <br><small class="text-muted">{{ $service->city_name }}</small>
                                @endif
                            @else
                                <span class="badge bg-primary">Normal</span>
                            @endif
                        </td>
                        <td>
                            @if($service->achievements)
                                {{ \Str::limit($service->achievements, 50) }}
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td>
                            @if($service->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                @if(can_access('Services', 'view'))
                                <a href="{{ route('service.custom', $service->slug) }}" class="btn btn-info" title="View" target="_blank">
                                    <i class="fas fa-eye"></i>
                                </a>
                                @endif
                                @if(can_access('Services', 'edit'))
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @endif
                                @if(can_access('Services', 'edit'))
                                <button type="button" class="btn btn-{{ $service->status == 1 ? 'success' : 'secondary' }} toggle-status-btn"
                                        data-id="{{ $service->id }}"
                                        data-status="{{ $service->status }}"
                                        title="{{ $service->status == 1 ? 'Set Inactive' : 'Set Active' }}">
                                    <i class="fas fa-toggle-{{ $service->status == 1 ? 'on' : 'off' }}"></i>
                                </button>
                                @endif
                                @if(can_access('Services', 'delete'))
                                <button type="button" class="btn btn-danger delete-btn"
                                        data-id="{{ $service->id }}"
                                        data-title="{{ $service->title }}"
                                        title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            <i class="fas fa-inbox fa-3x mb-3"></i>
                            <p>No services found</p>
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
    // Toggle service status (between 1 and 0 only)
    $('.toggle-status-btn').click(function() {
        const serviceId = $(this).data('id');
        const currentStatus = $(this).data('status');
        const newStatus = currentStatus == 1 ? 0 : 1;

        Swal.fire({
            title: 'Are you sure?',
            text: `Do you want to ${newStatus == 1 ? 'activate' : 'deactivate'} this service?`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, proceed!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/admin/services/' + serviceId + '/toggle-status',
                    type: 'POST',
                    data: { status: newStatus },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        showMessage('success', `Service ${newStatus == 1 ? 'activated' : 'deactivated'} successfully`);
                        setTimeout(() => location.reload(), 1500);
                    },
                    error: function(error) {
                        console.error(error);
                        showMessage('error', 'Failed to update service status');
                    }
                });
            }
        });
    });

    // Delete service (soft delete - sets status to -1)
    $('.delete-btn').click(function() {
        const serviceId = $(this).data('id');
        const serviceTitle = $(this).data('title');

        Swal.fire({
            title: 'Are you sure?',
            text: `Delete service "${serviceTitle}"?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Create a form and submit
                const form = $('<form>', {
                    'method': 'POST',
                    'action': '/admin/services/' + serviceId
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