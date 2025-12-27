@extends('admin.layouts.app')
@section('title', isset($admin) ? 'Edit Admin' : 'Create Admin')
@section('page-title', isset($admin) ? 'Edit Admin User' : 'Create New Admin User')
@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="fas fa-user-shield me-2"></i>{{ isset($admin) ? 'Edit Admin: ' . $admin->name : 'Create New Admin' }}</h5>
        <a href="{{ route('user-list') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to Admins
        </a>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Please fix the following errors:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form enctype="multipart/form-data"
            action="{{ isset($admin) ? route('user-update', $admin) : route('user-store') }}"
            method="POST" id="adminForm">
            @csrf
            @isset($admin)
                @method('PUT')
            @endisset

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" value="{{ old('name', @$admin->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           id="email" name="email" value="{{ old('email', @$admin->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                           id="phone" name="phone" value="{{ old('phone', @$admin->phone) }}"
                           required maxlength="10" pattern="[0-9]{10}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password @if(!isset($admin))<span class="text-danger">*</span>@endif</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           id="password" name="password" {{ isset($admin) ? '' : 'required' }}>
                    @if(isset($admin))
                        <small class="text-muted">Leave blank to keep current password</small>
                    @endif
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="role_id" class="form-label">Assign Role <span class="text-danger">*</span></label>
                    <select name="role_id" id="role_id" class="form-select @error('role_id') is-invalid @enderror" required>
                        <option value="">Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id', @$admin->role_id) == $role->id ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           id="title" name="title" value="{{ old('title', @$admin->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="pic" class="form-label">Profile Picture @if(!isset($admin))<span class="text-danger">*</span>@endif</label>
                    <input type="file" class="form-control @error('pic') is-invalid @enderror"
                           id="pic" name="pic" accept="image/*" {{ isset($admin) ? '' : 'required' }}>
                    @if(isset($admin) && $admin->pic)
                        <small class="text-muted">Current: <img src="{{ asset('storage/admins/' . $admin->pic) }}" height="30" class="rounded mt-1"></small>
                    @endif
                    @error('pic')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea class="form-control @error('bio') is-invalid @enderror"
                              id="bio" name="bio" rows="3">{{ old('bio', @$admin->bio) }}</textarea>
                    @error('bio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary" id="submitBtn">
                    <i class="fas fa-save"></i> <span id="btnText">{{ isset($admin) ? 'Update Admin' : 'Create Admin' }}</span>
                </button>
                <a href="{{ route('user-list') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#adminForm').on('submit', function() {
        const submitBtn = $('#submitBtn');
        const btnText = $('#btnText');

        // Disable button and change text
        submitBtn.prop('disabled', true);
        submitBtn.find('i').removeClass('fa-save').addClass('fa-spinner fa-spin');
        btnText.text('Processing...');
    });
});
</script>
@endpush
