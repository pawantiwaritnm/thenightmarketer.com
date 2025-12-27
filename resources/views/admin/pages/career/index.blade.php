@extends('admin.layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .modal-body { max-height: 70vh; overflow-y: auto; }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="contact-breadcrumb">
                <div class="breadcrumb-main add-contact justify-content-sm-between">
                    <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                        <div class="d-flex align-items-center add-contact__title justify-content-center mr-sm-25">
                            <h4 class="text-capitalize fw-500 breadcrumb-title">Careers</h4>
                        </div>

                        <form class="d-flex align-items-center add-contact__form my-sm-0 my-2"
                              style="width:500px;box-shadow:0 5px 5px rgb(0 0 0 / 12%)"
                              onsubmit="return false;">
                            <span data-feather="search"></span>
                            <input class="form-control mr-sm-2 border-0 box-shadow-none"
                                   type="search" placeholder="Search by name, phone or email"
                                   name="query" aria-label="Search">
                        </form>
                    </div>

                    <div class="action-btn d-flex align-items-center gap-2">
                        {{-- Role Filter (AJAX) --}}
                        <select id="roleFilter" class="form-select" style="max-width:260px;">
                            <option value="">Filter by Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>

                        {{-- Export (respects filters; we sync hidden inputs via JS if needed) --}}
                        <form id="exportForm" method="get" action="{{ route('career-list') }}" class="ms-2">
                            {{ csrf_field() }}
                            <input type="hidden" name="export_xls" value="1" />
                            <input type="hidden" name="role" id="exportRole" value="">
                            <input type="hidden" name="status" id="exportStatus" value="">
                            <button type="submit" class="btn btn-info pull-right">
                                <i class="fa fa-table"></i> Export as XLS
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- List --}}
    <div class="row">
        <div class="col-12">
            <div class="contact-list-wrap mb-25">
                <div class="contact-list bg-white radius-xl w-100">
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless table-rounded">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Resume</th>
                                    <th>Role</th>
                                    <th>State</th>
                                    <th>Experience</th>
                                    <th>Status</th>       {{-- NEW --}}
                                    <th>Cover Letter</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody><!-- Data via AJAX --></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Cover Letter Modal --}}
<div class="modal fade" id="coverLetterModal" tabindex="-1" role="dialog" aria-labelledby="coverLetterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cover Letter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body" style="white-space:pre-wrap;" id="coverLetterContent"></div>
        </div>
    </div>
</div>
@endsection

@section('pageJs')
<script>
$(function () {
    const $role = $('#roleFilter');

    const table = $('.table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('career-list') }}",
            data: function (d) {
                d.role  = $role.val();                              // role filter
                d.query = $('input[name="query"]').val() || '';     // external search
            }
        },
        columns: [
            { data: 'name' },
            { data: 'contact' },
            { data: 'resume', orderable:false, searchable:false },
            { data: 'role' },
            { data: 'state' },
            { data: 'experience' },
            { data: 'status', orderable:false, searchable:false }, // NEW
            { data: 'cover', orderable:false, searchable:false },
            { data: 'created_at' },
            { data: 'action', orderable:false, searchable:false },
        ],
        order: [[8,'desc']], // Date column index after adding Status
        language: { searchPlaceholder: "Search careers...", search: "" }
    });

    // Sync export hidden fields
    function syncExportInputs() {
        $('#exportRole').val($role.val() || '');
        // add status later if you add a status filter select
    }
    syncExportInputs();

    // Role change -> reload table
    $role.on('change', function() {
        syncExportInputs();
        table.ajax.reload();
    });

    // Debounced top search to server
    let t;
    $('input[name="query"]').on('input', function(){
        clearTimeout(t);
        t = setTimeout(function(){ table.ajax.reload(); }, 350);
    });

    // CSRF for AJAX
$.ajaxSetup({
  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
});

$(document).on('change', '.career-status', function () {
  const id     = $(this).data('id');
  const status = $(this).val();
  const url    = $(this).data('url'); // already the correct POST URL

  $.post(url, { status })
    .done(function (res) {
      const $wrap = $(this).closest('div.d-flex.flex-column');
      if ($wrap.length && res.badge) {
        $wrap.find('.badge').parent().html(res.badge);
      }
    }.bind(this))
    .fail(function (xhr) {
      console.error(xhr.responseText);
      alert('Failed to update status');
    });
});

    // Cover letter modal
    $(document).on('click', '.view-cover', function() {
        const coverText = $(this).data('cover');
        $('#coverLetterContent').text(coverText);
        $('#coverLetterModal').modal('show');
    });
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
