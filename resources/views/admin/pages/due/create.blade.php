@extends('admin.layouts.app')
@section('content')
    <style>
        #adminForm {
            display: none;
        }

        .add_more_btn {
            float: right !important;
        }

        .div-line {
            background: #efefef;
            height: 1px;
            width: 98%;
            margin: auto;
            margin-bottom: 20px;
            margin-top: 20px;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Due Date</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-Vertical card-default card-md mb-4">
                    <div class="card-body pb-md-30" style="padding: 0">
                        <div class="Vertical-form" id="admin-panel">
                        <form method="post" action="{{ isset($due) ? route('due-update', $due) : route('due-store') }}">
                         @csrf
                          @method(isset($due) ? 'put' : 'post')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title" class="color-dark fs-14 fw-500 align-center">Title</label>
                                            <input required type="text" id="title" placeholder="Enter Title"
                                                name="title" value="{{ old('title', @$due->title) }}"
                                                @class([
                                                    'error' => $errors->has('title'),
                                                    'form-control ih-medium ip-gray radius-xs b-light px-15',
                                                ]) />
                                            @error('title')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="due_month"
                                                class="color-dark fs-14 fw-500 align-center">Month</label>
                                            <input required type="text" id="due_month" name="month"
                                                placeholder="Enter Month" value="{{ old('month', @$due->month) }}"
                                                @class([
                                                    'error' => $errors->has('month'),
                                                    'form-control ih-medium ip-gray radius-xs b-light px-15',
                                                ]) />
                                            @error('month')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="due_year" class="color-dark fs-14 fw-500 align-center">Year</label>
                                            <input required type='number' name="year" id="due_year"
                                                placeholder="Enter Year" value="{{ old('year', @$due->year) }}"
                                                @class([
                                                    'error' => $errors->has('year'),
                                                    'form-control ih-medium ip-gray radius-xs b-light px-15',
                                                ]) />
                                            @error('year')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="div-line"></div>
                                <div class="due_dates">
                                    @if (@$due->dueDates)
                                        @foreach (@$due->dueDates as $dueDate)
                                            <div class="row due_date_filed">
                                                <input required type="hidden" name="due_id[]" value="{{ $dueDate->id }}">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="color-dark fs-14 fw-500 align-center">Date</label>
                                                        <input required type="date" name="due_date[]"
                                                            value="{{ $dueDate->date }}"
                                                            class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                            placeholder="Enter Date" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            class="color-dark fs-14 fw-500 align-center">Description</label>
                                                        <input required type="text" name="due_desc[]"
                                                            value="{{ $dueDate->desc }}"
                                                            class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                            placeholder="Enter Description" />
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="color-dark fs-14 fw-500 align-center">Dropdown</label>

                                                        <select name="due_type[]" name="due_type" required
                                                            class="form-control ih-medium ip-gray radius-xs b-light px-15">
                                                            <option value=""
                                                                >Select Dropdown
                                                            </option>
                                                            <option value="pay_now"
                                                                {{ $dueDate->type == 'pay_now' ? 'selected' : '' }}>Pay Now
                                                            </option>
                                                            <option value="file_now"
                                                                {{ $dueDate->type == 'file_now' ? 'selected' : '' }}>File
                                                                Now
                                                            </option>
                                                            <option value="download_now"
                                                                {{ $dueDate->type == 'download_now' ? 'selected' : '' }}>File
                                                                Download Now
                                                            </option>
                                                            <option value="check_here"
                                                                {{ $dueDate->type == 'check_here' ? 'selected' : '' }}>Check Here
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="color-dark fs-14 fw-500 align-center">Link</label>
                                                        <input  type="url" name="due_link[]"
                                                            value="{{ $dueDate->link }}"
                                                            class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                            placeholder="Enter Link" />
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="row due_date_filed">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="color-dark fs-14 fw-500 align-center">Date</label>
                                                    <input required type="date" name="due_date[]"
                                                        class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                        placeholder="Enter Date" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="color-dark fs-14 fw-500 align-center">Description</label>
                                                    <input required type="text" name="due_desc[]"
                                                        class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                        placeholder="Enter Description" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="color-dark fs-14 fw-500 align-center">Dropdown</label>

                                                    <select name="due_type[]" name="due_type" required
                                                        class="form-control ih-medium ip-gray radius-xs b-light px-15">
                                                        <option value="">Select dropdown</option>

                                                        <option value="pay_now">Pay Now</option>
                                                        <option value="file_now">File Now</option>
                                                        <option value="download_now"> Download Now</option>
                                                        <option value="check_here"> Check Here</option>
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="color-dark fs-14 fw-500 align-center">Link</label>
                                                    <input  type="url" name="due_link[]"
                                                        class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                        placeholder="Enter Link" />
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="layout-button mt-15 add_more_btn">
                                            <button type="button" id="addMore"
                                                class="btn btn-primary btn-default btn-squared px-20">
                                                Add More
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="div-line"></div>
                                <br />
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="admin_id" class="color-dark fs-14 fw-500 align-center">Post By
                                                Admin</label>

                                            <select id="admin_id" name="admin_id" required
                                                class="form-control ih-medium ip-gray radius-xs b-light px-15">
                                                <option value="" disabled selected>
                                                    Select an option
                                                </option>
                                                @foreach ($admins as $admin)
                                                    <option
                                                        {{ old('admin_id', @$due->admin_id) == $admin->id ? 'selected' : '' }}
                                                        value="{{ $admin->id }}">{{ $admin->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('admin_id')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="link" class="color-dark fs-14 fw-500 align-center">Link to
                                                Calendar</label>
                                            <input required type="url" id="link"
                                                placeholder="Enter Link to Calendar" name="link"
                                                value="{{ old('link', @$due->link) }}" @class([
                                                    'form-control ih-medium ip-gray radius-xs b-light px-15',
                                                    'error' => $errors->has('link'),
                                                ]) />
                                            @error('link')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="update" class="color-dark fs-14 fw-500 align-center">Important
                                                Update</label>
                                            <input  type="text" name="update" @class([
                                                'form-control ih-medium ip-gray radius-xs b-light px-15',
                                                'error' => $errors->has('update'),
                                            ])
                                                value="{{ old('update', @$due->update) }}" id="update"
                                                placeholder="Enter Important Update" />
                                            @error('update')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="desc"
                                                class="color-dark fs-14 fw-500 align-center">Description</label>
                                            <input required type="text" name="desc" @class([
                                                'error' => $errors->has('desc'),
                                                'form-control ih-medium ip-gray radius-xs b-light px-15',
                                            ])
                                                value="{{ old('desc', @$due->desc) }}" id="desc"
                                                placeholder="Enter Description" />

                                            @error('desc')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="note"
                                                class="color-dark fs-14 fw-500 align-center">Note</label>
                                            <input required type="text" name="note" @class([
                                                'error' => $errors->has('note'),
                                                'form-control ih-medium ip-gray radius-xs b-light px-15',
                                            ])
                                                value="{{ old('note', @$due->note) }}" id="note"
                                                placeholder="Enter Description" />

                                            @error('note')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="layout-button mt-15">
                                            <button type="submit" class="btn btn-primary btn-default btn-squared px-20">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- ends: .card -->
            </div>
        </div>
    </div>
@endsection
@section('pageJs')
    <script>
        $(document).ready(function() {
            var due_date_filed_count = $(".due_date_filed").length;

            $("#addMore").click(function() {
                due_date_filed_count++;
                var html = ` <div class="row due_date_filed" id="${"row" + due_date_filed_count}">
                                        <input required type="hidden" name="due_id[]" value="">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="color-dark fs-14 fw-500 align-center">Date</label>
                                                    <input required type="date" name="due_date[]"
                                                        class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                        placeholder="Enter Date" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="color-dark fs-14 fw-500 align-center">Description</label>
                                                    <input required type="text" name="due_desc[]"
                                                        class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                        placeholder="Enter Description" />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="color-dark fs-14 fw-500 align-center">Dropdown</label>

                                                    <select name="due_type[]" name="due_type" required
                                                        class="form-control ih-medium ip-gray radius-xs b-light px-15">
                                                        <option value=""> Select dropdown</option>

                                                        <option value="pay_now">Pay Now</option>
                                                        <option value="file_now">File Now</option>
                                                        <option value="download_now"> Download Now</option>
                                                        <option value="check_here"> Check Here</option>


                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="color-dark fs-14 fw-500 align-center">Link</label>
                                                    <input  type="url" name="due_link[]"
                                                        class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                                        placeholder="Enter Link" />
                                                </div>
                                            </div>
                                            <button type="button"  id="${due_date_filed_count}" class="btn btn-danger due_btn_remove btn-remove">Remove</button>
                                        </div>
                                        `;
                $(".due_dates").append(html);
            });
        });
        $(document).on("click", ".due_btn_remove", function () {
            var button_id = $(this).attr("id");
            $("#row" + button_id + "").remove();
            due_date_filed_count--;

        });
    </script>
@endsection
