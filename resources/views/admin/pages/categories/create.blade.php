@extends('admin.layouts.app')

@section('page-title', isset($category) ? 'Edit Category' : 'Add Category')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">{{ isset($category) ? 'Update' : 'Add' }} Category</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-body pb-md-30">
                    <div class="Vertical-form">
                        <form method="POST" enctype="multipart/form-data"
                              action="{{ isset($category) ? route('categories.update', $category) : route('categories.store') }}">
                            @csrf
                            @isset($category)
                                @method('PUT')
                            @endisset

                            <div class="row">
                                <!-- Category Name -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Category Name</label>
                                        <input id="name" type="text" name="name" 
                                               value="{{ old('name', $category->name ?? '') }}" 
                                               class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- URL Slug -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="url">URL</label>
                                        <input id="url" type="text" name="url" 
                                               value="{{ old('url', $category->url ?? '') }}" 
                                               class="form-control @error('url') is-invalid @enderror">
                                        @error('url')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Parent Category -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="parent_id">Parent Category</label>
                                        <select name="parent_id" class="form-control">
                                            <option value="">Select Parent Category</option>
                                            @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" 
                                                    {{ old('parent_id', $category->parent_id ?? '') == $cat->id ? 'selected' : '' }}>
                                                    {{ $cat->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status', $category->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('status', $category->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Category Image</label>
                                        <input type="file" name="image" class="form-control">
                                        @if (isset($category) && $category->image)
                                            <img src="{{ $category->image_url }}" alt="Category Image" style="width: 100px; margin-top: 10px;">
                                        @endif
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">{{ isset($category) ? 'Update' : 'Save' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
