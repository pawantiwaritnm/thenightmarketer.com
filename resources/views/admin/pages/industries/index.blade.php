@extends('admin.layouts.app')
@section('title', isset($industry) ? 'Edit Industry' : 'Add Industry')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">{{ isset($industry) ? 'Update' : 'Manage' }} Industries</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Left Column: Add/Edit Form (4 columns) -->
        <div class="col-lg-4">
            <div class="card card-Vertical card-default card-md mb-4">
                <div class="card-body">
                    <h5 class="mb-3">{{ isset($industry) ? 'Edit Industry' : 'Add New Industry' }}</h5>
                    <div class="Vertical-form">
                        <form method="POST" action="{{ isset($industry) ? route('industries.update', $industry) : route('industries.store') }}">
                            @csrf
                            @isset($industry)
                                @method('PUT')
                            @endisset

                            <!-- Industry Name -->
                            <div class="form-group">
                                <label for="industry_name">Industry Name</label>
                                <input id="industry_name" type="text" name="industry_name" 
                                       value="{{ old('industry_name', $industry->industry_name ?? '') }}" 
                                       class="form-control @error('industry_name') is-invalid @enderror" required>
                                @error('industry_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status', $industry->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $industry->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary btn-block">{{ isset($industry) ? 'Update' : 'Save' }}</button>
                            @if(isset($industry))
                                <a href="{{ route('industries.index') }}" class="btn btn-secondary btn-block mt-2">Cancel</a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Industry List (8 columns) -->
        <div class="col-lg-8">
            <div class="card card-Vertical card-default card-md">
                <div class="card-body">
                    <h5 class="mb-3">Industry List</h5>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Industry Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($industries as $industryItem)
                                <tr>
                                    <td>{{ $industryItem->id }}</td>
                                    <td>{{ $industryItem->industry_name }}</td>
                                    <td>{{ $industryItem->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <!-- Edit Button -->
                                        <a href="{{ route('industries.index', ['edit' => $industryItem->id]) }}" class="btn btn-sm btn-warning">Edit</a>

                                        <!-- Delete Form -->
                                        <form action="{{ route('industries.destroy', $industryItem->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
