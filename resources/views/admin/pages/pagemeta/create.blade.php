@extends('admin.layouts.app')
@section('title', 'Add New Page Meta')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="breadcrumb-main">
                <h4 class="text-capitalize breadcrumb-title">Add New Page Meta</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Form Section (6 columns) -->
        <div class="col-lg-6">
            <div class="card card-Vertical card-default card-md">
                <div class="card-body">
                    <div class="Vertical-form">
                         <!-- Display All Error Messages on Top -->
                         @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops! There were some problems with your input:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('pagemeta.store') }}">
                            @csrf

                            <!-- Slug -->
                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input id="slug" type="text" name="slug"
                                       value="{{ old('slug') }}"
                                       class="form-control @error('slug') is-invalid @enderror" required>
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Meta Title -->
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input id="meta_title" type="text" name="meta_title"
                                       value="{{ old('meta_title') }}"
                                       class="form-control @error('meta_title') is-invalid @enderror" required>
                                @error('meta_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Meta Description -->
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea id="meta_description" name="meta_description"
                                          class="form-control @error('meta_description') is-invalid @enderror" required>{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Meta Keywords -->
                            <div class="form-group">
                                <label for="meta_keyword">Meta Keywords</label>
                                <input id="meta_keyword" type="text" name="meta_keyword"
                                       value="{{ old('meta_keyword') }}"
                                       class="form-control @error('meta_keyword') is-invalid @enderror" required>
                                @error('meta_keyword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="form-group d-flex justify-content-between">
                                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                <a href="{{ route('pagemeta.index') }}" class="btn btn-sm btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Preview Section (6 columns) -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5>Page Meta Guidelines</h5>
                </div>
                <div class="card-body">
                    <ul>
                        <li><strong>Slug:</strong> A unique identifier for the page (e.g., `about-us`, `contact`).</li>
                        <li><strong>Meta Title:</strong> The title that appears in search engine results.</li>
                        <li><strong>Meta Description:</strong> A short description of the page content.</li>
                        <li><strong>Meta Keywords:</strong> Keywords related to the page content, separated by commas.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
