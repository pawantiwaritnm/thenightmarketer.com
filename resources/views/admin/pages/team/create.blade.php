@extends('admin.layouts.app')
@section('title', isset($teamMember) ? 'Edit Team Member' : 'Add Team Member')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">{{ isset($teamMember) ? 'Update Team Member' : 'Add New Team Member' }}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Form Section (6 columns) -->
        <div class="col-lg-6">
            <div class="card card-Vertical card-default card-md">
                <div class="card-body">
                    <div class="Vertical-form">
                        <form method="POST" enctype="multipart/form-data"
                              action="{{ isset($teamMember) ? route('team.update', $teamMember) : route('team.store') }}">
                            @csrf
                            @isset($teamMember)
                                @method('PUT')
                            @endisset

                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" type="text" name="name"
                                       value="{{ old('name', $teamMember->name ?? '') }}"
                                       class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Designation -->
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input id="designation" type="text" name="designation"
                                       value="{{ old('designation', $teamMember->designation ?? '') }}"
                                       class="form-control @error('designation') is-invalid @enderror" required>
                                @error('designation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" name="description" rows="4"
                                          class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $teamMember->description ?? '') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status', $teamMember->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $teamMember->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <!-- Image Upload -->
                            <div class="form-group">
                                <label for="image">Profile Image</label>
                                <input type="file" name="image" class="form-control">
                                @if (isset($teamMember) && $teamMember->image)
                                    <img src="{{ asset('storage/' . $teamMember->image) }}" alt="Profile Image" class="mt-3" style="width: 100px;">
                                @endif
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="form-group d-flex justify-content-between">
                                <button type="submit" class="btn btn-sm btn-primary">{{ isset($teamMember) ? 'Update' : 'Save' }}</button>
                                <a href="{{ route('team.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview Section (6 columns) -->
        <div class="col-lg-6">
            @if (isset($teamMember) && $teamMember->image)
                <div class="card">
                    <div class="card-header">
                        <h5>Profile Image Preview</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/' . $teamMember->image) }}" alt="Profile Image" style="max-width: 100%; height: auto;">
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
