@extends('admin.layouts.app')

@section('content')
<style>
    .modal-body {
        max-height: 70vh;
        overflow-y: auto;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="contact-breadcrumb">
                <div class="breadcrumb-main add-contact justify-content-sm-between">
                    <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                        <div class="d-flex align-items-center add-contact__title justify-content-center mr-sm-25">
                            <h4 class="text-capitalize fw-500 breadcrumb-title">Filtered Careers</h4>
                        </div>

                        <form method="get" action="{{ route('career-filtered') }} "
                            class="d-flex align-items-center add-contact__form my-sm-0 my-2"
                            style="width:500px;box-shadow:0 5px 5px rgb(0 0 0 / 12%)">
                            <span data-feather="search"></span>
                            <input class="form-control mr-sm-2 border-0 box-shadow-none"
                                type="search" placeholder="Search by name, phone or email"
                                name="query" value="{{ request('query') }}" aria-label="Search">
                        </form>
                    </div>
                    <div class="action-btn">
                        <form method="get" action="{{ route('career-filtered') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="export_xls" value="1" />
                            <button type="submit" class="btn btn-info pull-right">
                                <i class="fa fa-table"></i> Export as XLS
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- List Careers -->
    <div class="row">
        <div class="col-12">
            <div class="contact-list-wrap mb-25">
                <div class="contact-list bg-white radius-xl w-100">
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless table-rounded">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Contact</th> <!-- Combined phone + email -->
                                    <th>Resume</th> <!-- Display resume path -->
                                    <th>Role</th>
                                    <th>Overall Fit</th> <!-- Display overall_fit -->
                                    <th>Justification</th> <!-- Display justification -->
                                    <th>Date</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($careers as $career)
                                    <tr>
                                        <td>{{ $career->name }}</td>
                                        <td>
                                            <a href="tel:+91{{ $career->phone }}">{{ $career->phone }}</a><br>
                                            <a href="mailto:{{ $career->email }}">{{ $career->email }}</a>
                                        </td>
                                        <td>
                                            @if($career->resume_path)
                                                <a href="{{ asset('storage/' . $career->resume_path) }}" target="_blank">Download Resume</a>
                                            @else
                                                <span>No Resume Uploaded</span>
                                            @endif
                                        </td>
                                        <td>{{ $career->role }}</td>
                                        <td>{{ $career->overall_fit ?? '—' }}</td> <!-- Display overall_fit -->
                                        <td>{{ $career->justification ?? '—' }}</td> <!-- Display justification -->
                                        <td>{{ $career->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Cover Letter Modal -->
<div class="modal fade" id="coverLetterModal" tabindex="-1" role="dialog" aria-labelledby="coverLetterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cover Letter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body" style="white-space:pre-wrap;" id="coverLetterContent">
                <!-- Cover letter text will appear here -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('pageJs')
<script>
    $(document).on('click', '.view-cover', function() {
        const coverText = $(this).data('cover');
        $('#coverLetterContent').text(coverText);
        $('#coverLetterModal').modal('show');
    });
</script>
@endsection
