@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="contact-breadcrumb">

                    <div class="breadcrumb-main add-contact justify-content-sm-between ">
                        <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                            <div class="d-flex align-items-center add-contact__title justify-content-center mr-sm-25">
                                <h4 class="text-capitalize fw-500 breadcrumb-title">Payments List</h4>
                                <span class="sub-title ml-sm-25 pl-sm-25"></span>
                            </div>

                            <form method="get" action="{{ route('payments') }}"
                                class="d-flex align-items-center add-contact__form my-sm-0 my-2"
                                style="width:500px;box-shadow:0 5px 5px rgb(0 0 0 / 12%)">
                                <span data-feather="search"></span>
                                <input class="form-control mr-sm-2 border-0 box-shadow-none" type="search"
                                    placeholder="Search by name" name="query" aria-label="Search"
                                    value="{{ request('query') }}">
                            </form>

                        </div>
                        <div class="action-btn">
                            {{-- <a href="#" class="btn px-15 btn-primary" data-toggle="modal" data-target="#add-contact">
                                <i class="las la-plus fs-16"></i>Add New
                            </a> --}}
                            <form name="exporttodayuserForm" method="" action="" >
                          {{ csrf_field() }}
                   
                                <input type="hidden" name="export_xls" value="1" />
                        <button type="submit" class="btn btn-info pull-right" ><i class="fa fa-table"></i> Total Export </button>

                        </form>

                            <!-- Modal -->
                          
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
                <div class="custom-checkbox check-all">
                    <label for="check-3">
                        <span class="checkbox-text userDatatable-title">Name</span>
                    </label>
                </div>
            </div>
        </th>
        <th class="c-phone">
            <span>Company Name</span>
        </th>
        <th class="c-phone">
            <span>Purpose</span>
        </th>
        <th class="c-phone">
            <span>Invoice No.</span>
        </th>
        <th class="c-phone">
            <span>Amount</span>
        </th>
        <th class="c-phone">
            <span>Payment Date</span>
        </th>
        <th class="c-phone">
            <span>Payment Mode</span>
        </th>
        <th class="c-phone">
            <span>Filename</span>
        </th>
        <th class="c-phone">
            <span>Reference No.</span>
        </th>
        <th class="c-phone">
            <span>Added On</span>
        </th>
    </tr>
</thead>

<tbody>
    @foreach ($paymentAdvices as $paymentAdvice)
        <tr>
            <td>{{ $paymentAdvice->name }}</td>
            <td>{{ $paymentAdvice->company_name }}</td>
            <td>{{ $paymentAdvice->purpose }}</td>
            <td>{{ $paymentAdvice->invoice_no }}</td>
            <td>{{ $paymentAdvice->amount }}</td>
            <td>{{ $paymentAdvice->payment_date }}</td>
            <td>{{ $paymentAdvice->payment_mode }}</td>
            <td><a href="{{ asset('storage/uploads/' . $paymentAdvice->filename) }}" target="_blank">Link</a></td>
            <td>{{ $paymentAdvice->reference_no }}</td>
            <td>{{ \Carbon\Carbon::parse($paymentAdvice->added_on)->format('d/m/y') }}</td>
        </tr>
    @endforeach
</tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{ $paymentAdvices->links('vendor.pagination.custom') }}  
            <!-- ends: col-12 -->
        </div>
    </div>
@endsection
