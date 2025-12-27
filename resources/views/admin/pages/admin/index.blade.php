@extends('admin.layouts.app')
@section('content')
<script>
    $(document).ready(function () {
        $('.status-toggle input').change(function () {
            var serviceId = $(this).attr('id').replace('status_', '');
            var isChecked = $(this).prop('checked');

            // Send AJAX request to update the status
            $.ajax({
                url: 'update-user-status/' + serviceId,
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
            <div class="col-12">
                <div class="contact-breadcrumb">

                    <div class="breadcrumb-main add-contact justify-content-sm-between ">
                        <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                            <div class="d-flex align-items-center add-contact__title justify-content-center mr-sm-25">
                                <h4 class="text-capitalize fw-500 breadcrumb-title">Admin</h4>
                                <span class="sub-title ml-sm-25 pl-sm-25"></span>
                            </div>

                            <form method="get" action="{{ route('user-list') }}"
                                class="d-flex align-items-center add-contact__form my-sm-0 my-2"
                                style="width:500px;box-shadow:0 5px 5px rgb(0 0 0 / 12%)">
                                <span data-feather="search"></span>
                                <input class="form-control mr-sm-2 border-0 box-shadow-none" type="search"
                                    placeholder="Search by name, email or phone" aria-label="Search" name="query"
                                    value="{{ request('query') }}">
                            </form>

                        </div>
                        <div class="action-btn">
                            <a href="{{ route('user-create') }}" class="btn px-15 btn-primary">
                                <i class="las la-plus fs-16"></i>Add New
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="contact-list-wrap mb-25">
                    <div class="contact-list bg-white radius-xl w-100">
                        <div class="table-responsive">

                            <table class="table mb-0 table-borderless table-rounded">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Pic</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Assigned Role</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($admins as $admin)
                                        <tr>
                                            <td>{{ $admin->id }}</td>
                                            <td><strong>{{ $admin->name }}</strong></td>
                                            <td>
                                                <img height="40" width="40"
                                                    src="{{ asset('storage/admins/' . $admin->pic) }}" alt="{{ $admin->name }}"
                                                    class="rounded-circle">
                                            </td>
                                            <td>{{ $admin->email }}</td>
                                            <td>+91-{{ $admin->phone }}</td>
                                            <td>
                                                @if($admin->adminRole)
                                                    <span class="badge bg-info">{{ $admin->adminRole->name }}</span>
                                                @else
                                                    <span class="badge bg-secondary">No Role Assigned</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($admin->status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{ route('user-edit', $admin) }}" class="btn btn-primary btn-sm" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            
                                        </tr>
                                    @empty
                                        <strong>No admins</strong>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ends: col-12 -->
        </div>
    </div>
@endsection
@section('pageJs')
    <script>
        function handleDelteAdmin(obj, name) {
            const res = confirm(`Delete admin '${name}'?`)
            if (!res) return false;
            $(obj).closest('form').submit()
        }
    </script>
@endsection
