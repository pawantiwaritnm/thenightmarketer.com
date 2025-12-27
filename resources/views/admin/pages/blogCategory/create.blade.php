@extends('admin.layouts.app')
@section('title', isset($category) ? 'Edit category' : 'Add category')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">{{ isset($category) ? 'Update' : 'Add' }} Blog
                        Category</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-Vertical card-default card-md mb-4">
                    <div class="card-body pb-md-30" style="padding: 0;">
                        <div class="Vertical-form">
                            <form method="POST"
                                action="{{ isset($category) ? route('blog-category-update', $category) : route('blog-category-store') }}">
                                @csrf
                                @isset($category)
                                    @method('PUT')
                                @endisset
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="color-dark fs-14 fw-500 align-center">Category
                                                Name</label>
                                            <input id="name" value="{{ $category->name ?? old('name') }}"
                                                @class([
                                                    'error' => $errors->has('name'),
                                                    'form-control ih-medium ip-gray radius-xs b-light px-15',
                                                ]) type="text" placeholder="Enter Name"
                                                name="name">
                                            @error('name')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status" class="color-dark fs-14 fw-500 align-center">Parent
                                                Category</label>
                                            <select name="blog_category_id" id="blog_category_id" class="form-control ">
                                                <option value="">Select Parent Category</option>
                                                @foreach ($categories as $cat)
                                                    <option
                                                        {{ old('blog_category_id', @$category->blog_category_id) == $cat->id ? 'selected' : '' }}
                                                        value="{{ $cat->id }}">
                                                        {{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('blog_category_id')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status"
                                                class="color-dark fs-14 fw-500 align-center">Status</label>
                                            <select name="status" id="status" class="form-control ">
                                                <option value="">Select Status</option>
                                                <option {{ old('status', @$category->status) == '1' ? 'selected' : '' }}
                                                    value="1">
                                                    Active</option>
                                                <option {{ old('status', @$category->status) == '0' ? 'selected' : '' }}
                                                    value="0">
                                                    Not Active</option>
                                            </select>
                                            @error('status')
                                                <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="layout-button mt-15">
                                            <!--  <button type="button" class="btn btn-default btn-squared border-normal bg-normal px-20 ">cancel</button> -->
                                            <button type="submit"
                                                class="btn btn-primary btn-default btn-squared px-20">{{ isset($category) ? 'Update' : 'Save' }}</button>
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
