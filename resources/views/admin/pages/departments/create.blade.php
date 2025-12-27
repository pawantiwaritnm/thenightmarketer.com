@extends('admin.layouts.app')
@section('title', isset($department) ? 'Edit Department' : 'Add Department')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">{{ isset($department) ? 'Edit' : 'Add' }} Department</h4>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
    </div>
    @endif

    <form method="POST" action="{{ isset($department) ? route('departments.update', $department->id) : route('departments.store') }}">
        @csrf
        @isset($department)
            @method('POST')
        @endisset

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Department Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $department->name ?? '') }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $department->slug ?? '') }}">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1" {{ old('status', $department->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $department->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">{{ isset($department) ? 'Update' : 'Create' }}</button>
            </div>
        </div>
    </form>
</div>
@endsection
