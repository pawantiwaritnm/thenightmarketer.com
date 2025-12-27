@extends('admin.layouts.app')
@section('title', isset($client) ? 'Edit Client' : 'Add Client')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">{{ isset($client) ? 'Update Client' : 'Add New Client' }}</h4>
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
                              action="{{ isset($client) ? route('clients.update', $client) : route('clients.store') }}">
                            @csrf
                            @isset($client)
                                @method('PUT')
                            @endisset

                            <!-- Client Name -->
                            <div class="form-group">
                                <label for="client_name">Client Name</label>
                                <input id="client_name" type="text" name="client_name"
                                       value="{{ old('client_name', $client->client_name ?? '') }}"
                                       class="form-control @error('client_name') is-invalid @enderror" required>
                                @error('client_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Website URL -->
                            <div class="form-group">
                                <label for="website_url">Website URL</label>
                                <input id="website_url" type="text" name="website_url"
                                       value="{{ old('website_url', $client->website_url ?? '') }}"
                                       class="form-control @error('website_url') is-invalid @enderror">
                                @error('website_url')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Industry -->
                            <div class="form-group">
                                <label for="industry_id">Industry</label>
                                <select name="industry_id" class="form-control">
                                    <option value="">Select Industry</option>
                                    @foreach ($industries as $industry)
                                        <option value="{{ $industry->id }}"
                                            {{ old('industry_id', $client->industry_id ?? '') == $industry->id ? 'selected' : '' }}>
                                            {{ $industry->industry_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status', $client->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('status', $client->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <!-- Logo Upload -->
                            <div class="form-group">
                                <label for="logo">Client Logo</label>
                                <input type="file" name="logo" class="form-control">
                                @if (isset($client) && $client->logo)
                                    <img src="{{ asset('storage/' . $client->logo) }}" alt="Client Logo" class="mt-3" style="width: 100px;">
                                @endif
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="form-group d-flex justify-content-between">
                                <button type="submit" class="btn btn-sm btn-primary">{{ isset($client) ? 'Update' : 'Save' }}</button>
                                <a href="{{ route('clients.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview Section (6 columns) -->
        <div class="col-lg-6">
            @if (isset($client) && $client->logo)
                <div class="card">
                    <div class="card-header">
                        <h5>Client Logo Preview</h5>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/' . $client->logo) }}" alt="Client Logo" style="max-width: 100%; height: auto;">
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
