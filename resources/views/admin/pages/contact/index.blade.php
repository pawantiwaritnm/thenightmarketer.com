@extends('admin.layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="contact-breadcrumb">

                <div class="breadcrumb-main add-contact justify-content-sm-between ">
                    <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                        <div class="d-flex align-items-center add-contact__title justify-content-center mr-sm-25">
                            <h4 class="text-capitalize fw-500 breadcrumb-title">Contacts</h4>
                            <span class="sub-title ml-sm-25 pl-sm-25"></span>
                        </div>

                        <form method="get" action="{{ route('contact-list') }}"
                            class="d-flex align-items-center add-contact__form my-sm-0 my-2"
                            style="width:500px;box-shadow:0 5px 5px rgb(0 0 0 / 12%)">
                            <span data-feather="search"></span>
                            <input class="form-control mr-sm-2 border-0 box-shadow-none" type="search"
                                placeholder="Search by name, phone or email" name="query" aria-label="Search"
                                value="{{ request('query') }}">
                        </form>

                    </div>
                    <div class="action-btn">
                        {{-- <a href="#" class="btn px-15 btn-primary" data-toggle="modal" data-target="#add-contact">
                                <i class="las la-plus fs-16"></i>Add New
                            </a> --}}
                        <form name="exporttodayuserForm" method="" action="">
                            {{ csrf_field() }}

                            <input type="hidden" name="export_xls" value="1" />
                            <button type="submit" class="btn btn-info pull-right"><i class="fa fa-table"></i> Total Export </button>

                        </form>

                        <!-- Modal -->
                        <div class="modal fade add-contact" id="add-contact" role="dialog" tabindex="-1"
                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content radius-xl">
                                    <div class="modal-header">
                                        <h6 class="modal-title fw-500" id="staticBackdropLabel">Contact Information
                                        </h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span data-feather="x"></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="add-new-contact">
                                            <form action="https://demo.jsnorm.com/">
                                                <div class="form-group mb-20">
                                                    <label>Name:</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="Your Name">
                                                </div>
                                                <div class="form-group mb-20">
                                                    <label>Email Address:</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="Email Address">
                                                </div>
                                                <div class="form-group mb-20">
                                                    <label>Phone Number:</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="Phone Number">
                                                </div>
                                                <div class="form-group mb-20">
                                                    <label>Position:</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="Position">
                                                </div>
                                                <div class="form-group mb-20">
                                                    <label>Company Name:</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="Company Name">
                                                </div>

                                                <div class="button-group d-flex pt-20">



                                                    <button class="btn btn-primary btn-default btn-squared ">add new
                                                        Contact
                                                    </button>





                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- Modal -->


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
                                    <th>
                                        <div class="d-flex align-items-center">
                                            <div class="custom-checkbox  check-all">
                                                <input class="checkbox" type="checkbox" id="check-3">
                                                <label for="check-3">
                                                    <span class="checkbox-text userDatatable-title">Name</span>
                                                </label>
                                            </div>
                                        </div>
                                    </th>
                                    <th class="c-phone">
                                        <span class="">Phone</span>
                                    </th>
                                    <th class="c-phone">
                                        <span class="">Country</span>
                                    </th>
                                    <th class="c-phone">
                                        <span class="">Date</span>
                                    </th>

                                    <th class="c-phone">
                                        <span class="">Service</span>
                                    </th>
                                    <th class="c-phone">
                                        <span class="">Message</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($contacts as $contact)
                                <tr>
                                    <td>
                                        <div class="contact-item d-flex align-items-center">
                                            <div class="contact-personal-wrap">
                                                <div class="checkbox-group-wrapper">
                                                    <div class="checkbox-group d-flex">
                                                        <div
                                                            class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
                                                            <input class="checkbox" type="checkbox"
                                                                id="check-grp-c-1">
                                                            <label for="check-grp-c-1"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="contact-personal-info d-flex">
                                                <a href="#"
                                                    class="profile-image rounded-circle d-block m-0 wh-38"
                                                    style="background-image:url('img/user.png'); background-size: cover;"></a>
                                                <div class="contact_title">
                                                    <h6>
                                                        <a href="#">{{ $contact->name }}</a>
                                                    </h6>
                                                    <a href="mailto:{{ $contact->email }}"><span
                                                            class="location">{{ $contact->email }}</span></a>
                                                </div>
                                            </div>

                                        </div>
                                    </td>
                                    <td>
                                        <span class="phone"><a
                                                href="tel:+91{{ $contact->phone }}">{{ @$contact->country_code }} {{ $contact->phone }}</a></span>
                                    </td>
                                    <td>
                                        <span>{{ @$contact->country }}</span>
                                    </td>
                                    <td>
                                        <span>{{ $contact->created_at->format('d M Y') }}</span>
                                    </td>

                                    <td>
                                        @php
                                        $services = json_decode($contact->service, true); // Decode JSON
                                        @endphp
                                        @if ($services && is_array($services))
                                        @foreach ($services as $service)
                                        <span class="">{{ $service }}, </span>
                                        @endforeach
                                        @else
                                        <span class="text-muted">No services selected</span>
                                        @endif
                                    </td>

                                    <td>
                                        <span>{{ $contact->message }}</span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{ $contacts->links('vendor.pagination.custom') }}
        <!-- ends: col-12 -->
    </div>
</div>
@endsection