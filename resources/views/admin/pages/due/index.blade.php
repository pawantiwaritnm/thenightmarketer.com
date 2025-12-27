@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Manage Dues</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <div class="dropdown action-btn">
                            <button class="btn btn-sm btn-default btn-white dropdown-toggle" type="button" id="dropdownMenu2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-download"></i> Export
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <span class="dropdown-item">Export With</span>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-file-text"></i> Google Sheets</a>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-file-excel"></i> Excel (XLSX)</a>
                                <a href="#" class="dropdown-item">
                                    <i class="la la-file-csv"></i> CSV</a>
                            </div>
                        </div>
                        <div class="action-btn">
                            <a href="{{ route('due-create') }}" class="btn btn-sm btn-primary btn-add">
                                <i class="la la-plus"></i> Add New</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-30">

                <div class="card mb-25">
                   <!--  <div class="card-header">
                        <h6>Dues List</h6>
                    </div> -->
                    <div class="card-body p-0">
                        <div class="drag-drop-wrap">
                            <div class="drag-drop table-responsive-lg bg-white w-100 mb-30">
                                <table class="table mb-0 table-borderless table-rounded">
                                    <thead>
                                        <th>S No.</th>
                                        <th>Title</th>
                                        <th>Added on</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($dues as $key => $due)
                                            <tr class="draggable" draggable="true">
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $due->title }}</td>
                                                <td>{{ $due->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <div class="table-actions">
                                                        <a href="{{ route('due-edit', $due) }}" class="edit-btn">
                                                            <span data-feather="edit"></span>
                                                        </a>
                                                        <form method="POST" action="{{ route('due-destroy', $due) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="del-btn" href="#"
                                                                onclick="handleDelteDue(this,'{{ $due->title }}')">
                                                                <span data-feather="trash-2"></span>
                                                            </a>
                                                        </form>
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
                {{ $dues->links('vendor.pagination.custom') }}  

                <!-- ends: card -->

            </div>
        </div>
    </div>
@endsection
@section('pageJs')
    <script>
        function handleDelteDue(obj, name) {
            const res = confirm(`Delete Due '${name}'?`)
            if (!res) return false;
            $(obj).closest('form').submit()
        }
    </script>
@endsection
